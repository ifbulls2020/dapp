<?php
namespace app\admin\command;

use app\common\model\UserTeam;
use think\Exception;
use think\Config;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\common\model\PledgeOrder;
use think\Db;
use app\common\services\UserWalletService;
use app\common\model\AccountDetails;
use app\common\model\CommissionDetails;

class Pledge extends Command
{
    const USDT = 'USDT';
    const ETH = 'ETH';
    
    
    protected function configure()
    {
        $this->setName('Pledge')->setDescription('质押订单结算 + 三级返佣');
    }

    protected function execute(Input $input, Output $output) {
        $orderList = PledgeOrder::where('status', 1)->select();
        $rate = get_usdt_rate(self::ETH);                                                  //获取汇率
        foreach ($orderList as $v) {
            $nowTime = time();
            $dayUsdt = bcmul($v->amount,$v->activity->day_rate / 100, 6);           //每日收益USDT
            $dayEth = bcdiv($dayUsdt, $rate, 6);                                          //每日收益ETH
            $v->profit_day += 1;                                                                //获利天数+1
            $v->profit_last_time = $nowTime;                                                    //最后获利时间
            $v->profit_total_amount += $dayEth;                                                 //累加利息
            if ($v->profit_day != $v->profit_top_day) {
                $result = $v->save();
                if (!$result) {
                    $output->writeln(sprintf("%s 质押锁仓订单id: %s 执行失败 ", date('Y-m-d H:i:s'), $v->id));
                    continue;
                }
                $output->writeln(sprintf("%s 质押锁仓订单id: %s 执行成功 ", date('Y-m-d H:i:s'), $v->id));
            } else {
                Db::startTrans();
                try {
                    $v->profit_amount += $v->profit_total_amount;                                //获取利息=累加利息
                    $v->status = 0;                                                              //状态改为已停止
                    $usdtUserWallet = (new UserWalletService($v->uid, self::USDT, $v->amount))->addBalance();        //返还usdt
                    $ethUserWallet = (new UserWalletService($v->uid, self::ETH, $v->profit_amount))->addBalance();   //增加eth
                    //新增账户明细
                    $accountDetailsData = [
                        [
                            'coin' => self::USDT,
                            'type' => 3,
                            'change_quantity' => $v->amount,
                            'current_quantity' => $usdtUserWallet->balance,
                            'extend_info' => json_encode(['pledge_order_id' => $v->id])
                        ],                                                                                                  //增加usdt账户明细
                        [
                            'coin' => self::ETH,
                            'type' => 4,
                            'change_quantity' => $v->profit_amount,
                            'current_quantity' => $ethUserWallet->balance,
                            'extend_info' => json_encode(['pledge_order_id' => $v->id])
                        ]                                                                                                   //增加eth账户明细
                    ];
                    $v->user->accountDetails()->saveAll($accountDetailsData);
                    //新增收益明细
                    $incomeDetailsData = [
                        'type'        => 3,
                        'income_usdt' => bcmul($v->profit_amount, $rate, 6),
                        'income_coin' => $v->profit_amount,
                    ];
                    $v->user->incomeDetails()->save($incomeDetailsData);
                    //计算分佣
                    if ($v->user->pid != 0) {
                        $this->rebate($v->id, $v->uid, $v->profit_amount);
                    }
                    $v->save();
                    Db::commit();
                    $output->writeln(sprintf("%s 质押锁仓订单id: %s 执行成功 ", date('Y-m-d H:i:s'), $v->id));
                } catch (Exception $e) {
                    Db::rollback();
                    $output->writeln(sprintf("%s 质押锁仓订单id: %s error: %s", date('Y-m-d H:i:s'), $v->id, $e->getMessage()));
                }
            }
        }
    }
    
    /**
     * 计算分佣
     * @param int $orderId 订单id
     * @param int $uid  用户id
     * @param string $amount 用来分佣的金额
     * @return void
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function rebate(int $orderId, int $uid, string $amount) {
        $where = ['team' => $uid, 'level' => ['between', '1,3']];
        $userList =  UserTeam::where($where)->field('uid, level')->order('level ASC')->select();
        $accountDetailsData = [];
        $commissionDetailsData = [];
        $childUid = $uid;
        foreach ($userList as $v) {
            $commission = bcmul($amount, Config::get('custom.pledge_' . $v->level), 6);              //计算佣金
            $userWallet = (new UserWalletService($v->uid, self::ETH, $commission))->addBalance();   //增加eth余额
            $accountDetailsData[] = [                                                                    //新增质押分佣账户明细
                'uid'               => $v->uid,
                'coin'              => self::ETH,
                'type'              => 12,
                'change_quantity'   => $commission,
                'current_quantity'  => $userWallet->balance,
                'extend_info' => json_encode(['pledge_order_id' => $orderId])
            ];
            $commissionDetailsData[] = [                                                                 //新增佣金明细账户明细
                'uid'           => $v->uid,
                'type'          => 2,
                'commission'    => $commission,
                'child_uid'     => $childUid,
            ];
            $childUid = $v->uid;
        }
        (new AccountDetails())->saveAll($accountDetailsData);
        (new CommissionDetails())->saveAll($commissionDetailsData);
    }
    
}