<template>
     <div class="arbitrage_record" data-v-46211887="">
      <header-nav :backIconType="2" :title="$t('key79') + $t('key140')"></header-nav>
      <div class="exchange-container" data-v-46211887="">
          <div class="base-content" data-v-46211887="">
              <div class="base-title" data-v-46211887="">
                  <div class="left-line" data-v-46211887=""></div>
              </div>
              <div class="base-value" data-v-46211887="" style="justify-content: center; margin-top: 0rem;">
                  <div class="value-item" data-v-46211887="">
                      <div class="value-title" data-v-46211887="">{{$t('key70')}}</div>
                      <div class="value ff_InterRegular" data-v-46211887="">{{info.usdt_balance}} USDT </div>
                  </div>
              </div>
              <div class="base-value" data-v-46211887="">
                  <div class="value-item" data-v-46211887="">
                      <div class="value-title" data-v-46211887="">{{$t('key71')}}</div>
                      <div class="value ff_InterRegular" data-v-46211887="">{{info.total_produce}} ETH </div>
                  </div>
                  <div class="value-item" data-v-46211887="">
                      <div class="value-title" data-v-46211887="">{{$t('key72')}}</div>
                      <div class="value ff_InterRegular" data-v-46211887="">{{info.day_produce}} ETH </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="list-container" data-v-46211887="">
          <div class="list-title" data-v-46211887="">{{$t('key73')}}</div>
          <van-pull-refresh v-model="loading" @refresh="getRecordListXiala" pulling-text="Pull down to refresh.." loosing-text="Release to refresh..." loading-text="loading...">
              <van-list v-model="loading" :finished="finished" loading-text="loading..." @load="getRecordList">
              <div class="record_list" data-v-46211887="" style="padding: 0px;">
                  <div class="record_item" data-v-46211887="" v-for="(item, index) in List" :key="index">
                      <div class="pro_info" data-v-46211887="">
                          <div class="pro_cycle ff_NunitoSemiBold" data-v-46211887="">
                              <img :src="item.icon" class="icon_save" data-v-46211887="">
                              <span class="fs-32" data-v-46211887="">
                                  <span class="" :class="[Number(item.amount) > 0 ? 'ygreen' : 'yred']" data-v-46211887="">{{item.amount}}</span> {{item.coin}}
                              </span>
                          </div>
                      </div>
                      <div class="order_info" data-v-46211887="">
                          <div data-v-46211887="">{{item.create_time}}</div>
                          <div class="order_status" data-v-46211887="">
                              <button class="button_status" data-v-46211887="" v-if="item.type === 7">{{$t('key74')}}</button>
                              <button class="button_status" data-v-46211887="" v-if="item.type === 8">{{$t('key75')}}</button>
                              <button class="button_status" data-v-46211887="" v-if="item.type === 10">{{$t('key76')}}</button>
                              <button class="button_status" data-v-46211887="" v-if="item.type === 11">{{$t('key77')}}</button>
                              <button class="button_status" data-v-46211887="" v-if="item.type === 12">{{$t('key78')}}</button>
                          </div>
                      </div>
                  </div>
                  <!---->
              </div>
              </van-list>
              <no-data v-if="List.length <= 0"></no-data>
          </van-pull-refresh>
      </div>
  </div>
</template>

<script>
import headerNav from '@/components/header-nav.vue'
import NoData from '@/components/no-data.vue'
import { getRecordList, findAccountAndRate } from '@/api/user'

export default {
    name: 'authorized-activity',
    props: {
    },
    components: {
        headerNav,
        NoData
    },
    data() {
        return {
            page: 1,
            page_size: 20,
            loading: false,
            finished: false,
            List: [],
            info: {}
        }
    },
    mounted() {
        this.findAccountAndRate()
        this.getRecordList()
    },
    methods: {
        findAccountAndRate () {
            findAccountAndRate().then(res => {
                let data = res.data
                if (data.code === 1) {
                    this.info = data.data
                }
            })
        },
        reset () {
            this.page = 1
            this.loading = false
            this.finished = false
            this.List = []
        },
        getRecordListXiala () {
            this.reset()
            this.getRecordList()
        },
        getRecordList () {
            this.loading = true
            getRecordList({ page: this.page, page_size: this.page_size, type: 2 }).then(res => {
                let data = res.data
                this.loading = false
                if (data.code == 1) {
                    this.List.push(...data.data.list)
                    this.page++
                }
                if (this.List.length >= data.data.count) this.finished = true
            })
        },
    }
}
</script>

<style>
.arbitrage_record[data-v-46211887] {
    padding-bottom: .6rem;
    font-weight: 500
}

.arbitrage_record .header[data-v-46211887] {
    position: relative;
    padding: .27rem .44rem;
    text-align: center
}

.arbitrage_record .header .back[data-v-46211887] {
    float: left;
    font-size: .4rem
}

.arbitrage_record .switch_container[data-v-46211887] {
    margin-top: .32rem
}

.arbitrage_record .switch_container .switch_content[data-v-46211887] {
    margin: 0 auto;
    padding: .08rem;
    width: 4.44rem;
    background: #f5f6f8;
    border-radius: .2rem;
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center
}

.arbitrage_record .switch_container .switch_content .switch_item[data-v-46211887] {
    width: 2.14rem;
    height: .72rem;
    line-height: .72rem;
    text-align: center;
    font-size: .26rem;
    color: #353f52;
    font-weight: 600
}

.arbitrage_record .switch_container .switch_content .switch_item.active[data-v-46211887] {
    background: #fff;
    border-radius: .2rem
}

.arbitrage_record .record_list[data-v-46211887] {
    padding: 0 .36rem
}

.arbitrage_record .record_list .record_item[data-v-46211887] {
    margin-top: .56rem;
    background: #fff;
    box-shadow: .06rem .12rem .2rem #0000000d;
    border-radius: .3rem
}

.arbitrage_record .record_list .record_item .pro_info[data-v-46211887] {
    padding: 0 .32rem;
    height: 1.14rem;
    border-bottom: 1px solid rgba(216, 216, 216, .5);
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center
}

.arbitrage_record .record_list .record_item .pro_info .pro_cycle[data-v-46211887] {
    display: flex;
    align-content: center;
    align-items: center;
    font-size: .36rem;
    color: #353f52
}

.arbitrage_record .record_list .record_item .pro_info .pro_cycle .icon_save[data-v-46211887] {
    margin-right: .2rem;
    width: .48rem
}

.arbitrage_record .record_list .record_item .record_info .section[data-v-46211887] {
    padding: 0 !important;
    margin-top: .32rem
}

.arbitrage_record .record_list .record_item .record_info .section .section_item[data-v-46211887] {
    display: flex;
    justify-content: space-between;
    padding: 0 .32rem;
    align-content: center;
    align-items: center;
    margin-bottom: .32rem
}

.arbitrage_record .record_list .record_item .record_info .section .section_item .item_name[data-v-46211887] {
    color: #353f52
}

.arbitrage_record .record_list .record_item .record_info .section .section_item .item_value[data-v-46211887] {
    color: #5b616e
}

.arbitrage_record .record_list .record_item .order_info[data-v-46211887] {
    padding: 0 .4rem;
    height: 1.04rem;
    background: #f5f6f8;
    box-shadow: 6px 12px 20px #0000000d;
    border-radius: 0 0 .3rem .3rem;
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center
}

.arbitrage_record .record_list .record_item .order_info .order_status[data-v-46211887] {
    display: flex;
    align-content: center;
    align-items: center
}

.arbitrage_record .record_list .record_item .order_info .order_status .button_status[data-v-46211887] {
    padding: 0 .4rem;
    display: inline-block;
    height: .65rem;
    line-height: .65rem;
    background: #1652f0;
    border-radius: .2rem;
    border: none;
    color: #fff
}

.arbitrage_record .no_data_content[data-v-46211887] {
    margin-top: .4rem;
    padding-bottom: .4rem;
    text-align: center
}

.arbitrage_record .no_data_content .title[data-v-46211887] {
    color: #aaa;
    font-size: .3rem
}

.arbitrage_record .no_data_content .img_no_data[data-v-46211887] {
    margin-bottom: .56rem;
    width: 3.7rem;
    height: auto
}

.arbitrage_record .load-more[data-v-46211887] {
    margin: 0 auto;
    margin-top: .32rem;
    text-align: center;
    color: #1652f0
}

.arbitrage_record .no-more-data[data-v-46211887] {
    margin: 0 auto;
    margin-top: .32rem;
    text-align: center
}

/*! _variables.scss | Vuero | Css ninja 2020-2021 */
[data-v-46211887] .van-loading {
    text-align: center;
    margin-top: .5rem
}

.exchange-container[data-v-46211887] {
    margin-top: .4rem;
    padding: 0 .32rem;
    line-height: normal
}

.exchange-container .base-content[data-v-46211887] {
    padding: .24rem .32rem .46rem;
    background: #fff;
    box-shadow: 0 4px 40px 1px #00000008;
    border-radius: 10px;
    border: 1px solid #eeeef0
}

.exchange-container .base-content .base-title[data-v-46211887] {
    position: relative;
    font-size: .28rem;
    color: #353f52;
    font-weight: 500
}

.exchange-container .base-content .base-title .left-line[data-v-46211887] {
    position: absolute;
    top: 0;
    left: -.32rem;
    width: .08rem;
    height: .4rem;
    background: linear-gradient(1turn, rgba(90, 71, 217, .09), #1652f0);
    border-radius: .04rem
}

.exchange-container .base-content .base-value[data-v-46211887] {
    margin-top: .44rem;
    display: flex;
    justify-content: space-between;
    text-align: center
}

.exchange-container .base-content .base-value .value-item[data-v-46211887] {
    width: 50%
}

.exchange-container .base-content .base-value .value-item .value-title[data-v-46211887] {
    margin-bottom: .16rem;
    font-size: .28rem;
    color: #353f52;
    font-weight: 500
}

.exchange-container .base-content .base-value .value-item .value[data-v-46211887] {
    color: #5b616e;
    font-weight: 400
}

.list-container[data-v-46211887] {
    margin-top: .56rem;
    padding: 0 .32rem
}

.list-container .list-title[data-v-46211887] {
    margin-bottom: .24rem;
    color: #353f52;
    font-size: .32rem;
    font-weight: 600
}

.arbitrage_record .popup_content .ensure_popup[data-v-46211887] {
    width: 6.42rem;
    background: #fff;
    border-radius: .2rem;
    z-index: 2
}

.arbitrage_record .popup_content .ensure_popup .ensure_content[data-v-46211887] {
    padding: .44rem;
    text-align: center
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .icon_ensure[data-v-46211887] {
    width: 1.26rem
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .amount_info[data-v-46211887] {
    margin-top: .56rem
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .confirm[data-v-46211887] {
    margin: 0 auto;
    margin-top: .72rem;
    width: 4.46rem;
    height: .92rem;
    line-height: .92rem;
    background: #1652f0;
    border-radius: .2rem;
    color: #fff;
    font-size: .32rem
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .tips[data-v-46211887] {
    margin-top: .4rem;
    font-size: .24rem;
    color: #5b616e80
}

.load-more-btn[data-v-46211887] {
    margin-top: .6rem;
    text-align: center
}

.nomore-tips[data-v-46211887] {
    color: #353f5280;
    margin-top: .6rem;
    text-align: center
}

.fc-13B26F[data-v-46211887] {
    color: #13b26f
}

.fc-CF202F[data-v-46211887] {
    color: #cf202f
}
</style>

