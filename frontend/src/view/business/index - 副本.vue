<template>
    <div class="business" data-v-ac6cd016="">
      <header-nav></header-nav>
      <div class="pro-info" data-v-ac6cd016="">
          <div class="info" data-v-ac6cd016="">
              <div class="base-info" data-v-ac6cd016="">
                  <img class="icon" data-v-ac6cd016="" :src="info.icon">
                  <div data-v-ac6cd016="">
                      <div class="coin-name" data-v-ac6cd016="">{{info.coin_alias}}</div>
                      <div class="short-code" data-v-ac6cd016="">{{info.coin}}</div>
                  </div>
              </div>
              <div class="value-info" data-v-ac6cd016="">
                  <div class="price" data-v-ac6cd016="">$ {{close}}</div>
                  <div class="change rise" data-v-ac6cd016="" v-if="Number(change) >= 0"> $&nbsp;+{{changeAmount}} (+{{change}}%) </div>
                  <div class="change fall" data-v-ac6cd016="" v-if="Number(change) < 0"> $&nbsp;{{changeAmount}} ({{change}}%) </div>
              </div>
          </div>
          <div class="action" data-v-ac6cd016="">
              <img src="../../assets/static/image/icon_pro_collect_active.34febf3c.png" data-v-ac6cd016="" v-if="info.is_follow == 1" @click="followContract(0)">
              <img src="../../assets/static/image/icon_pro_collect.bf32e20c.svg" data-v-ac6cd016="" v-if="info.is_follow == 0" @click="followContract(1)">
              <img class="record" src="../../assets/static/image/icon_pro_record.e0ae5e13.svg" @click="go('/business/orders', { contract_id: contract_id })" data-v-ac6cd016="">
          </div>
      </div>
      <div class="pro-trend" data-v-ac6cd016="">
          <div class="kline-container" ref="kline" data-v-ac6cd016="">

          </div>
          <div class="time-select ff_NunitoBold" data-v-ac6cd016="">
              <div class="time-item" data-v-ac6cd016="" :class="[interval =='1' ? 'active' : '']" @click="changeInterval('1')"> 1M </div>
              <div class="time-item" data-v-ac6cd016="" :class="[interval =='5' ? 'active' : '']" @click="changeInterval('5')"> 5M </div>
              <div class="time-item" data-v-ac6cd016="" :class="[interval =='30' ? 'active' : '']" @click="changeInterval('30')"> 30M </div>
              <div class="time-item" data-v-ac6cd016="" :class="[interval =='60' ? 'active' : '']" @click="changeInterval('60')"> 1H </div>
              <div class="time-item" data-v-ac6cd016="" :class="[interval =='d' ? 'active' : '']" @click="changeInterval('d')"> 1D </div>
          </div>
      </div>
      <div class="pro-other" data-v-ac6cd016="">
          <div class="other-title" data-v-ac6cd016="">{{$t('key40')}}</div>
          <div class="other-list" data-v-ac6cd016="">
              <div class="other-item" data-v-ac6cd016="">
                  <div class="item-info" data-v-ac6cd016="">
                      <img src="../../assets/static/image/icon_pro_deal.5538f870.svg" class="item-icon" data-v-ac6cd016="">
                      <span class="item-title" data-v-ac6cd016="">{{$t('key41')}}</span>
                  </div>
                  <div class="item-value" data-v-ac6cd016="">{{liang}}</div>
              </div>
              <div class="other-item" data-v-ac6cd016="">
                  <div class="item-info" data-v-ac6cd016="">
                      <img src="../../assets/static/image/icon_pro_num.6570a32b.svg" class="item-icon" data-v-ac6cd016="">
                      <span class="item-title" data-v-ac6cd016="">{{$t('key42')}}</span>
                  </div>
                  <div class="item-value" data-v-ac6cd016=""> $ {{jiaoyie}}</div>
              </div>
          </div>
      </div>
      <div class="submit-container" data-v-ac6cd016="">
          <div class="submit-btn" data-v-ac6cd016="" @click="changesubmitModal(true)">{{$t('key43')}}</div>
      </div>

      <div class="popup-container">
          <van-popup v-model="submitModal" position="bottom" round="" class="van-popup van-popup--round van-popup--bottom transaction-popup">
              <div class="deal" data-v-ac6cd016="">
                  <div class="deal-title" data-v-ac6cd016="">
                      <span data-v-ac6cd016="">
                          <span class="uppercase" data-v-ac6cd016="">{{info.coin}}</span>&nbsp;{{$t('key44')}}
                      </span>
                      <div data-v-ac6cd016="">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" @click="changesubmitModal(false)" aria-hidden="true" role="img" class="iconify iconify--fluent close" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-ac6cd016="">
                              <g fill="none">
                                  <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                              </g>
                          </svg>
                      </div>
                  </div>
                  <div class="deal-pro-info" data-v-ac6cd016="">
                      <div class="base-info" data-v-ac6cd016="">
                          <img :src="info.icon" class="pro-icon" data-v-ac6cd016="">
                          <div class="pro-name" data-v-ac6cd016="">
                              <div class="coin-name" data-v-ac6cd016="">{{info.coin}}</div>
                              <div data-v-ac6cd016="">
                                  <span class="mr-12" data-v-ac6cd016="">{{$t('key45')}}</span>
                                  <span class="fc-13B26F" v-if="type === 'up'" data-v-ac6cd016="">{{$t('key46')}}</span>
                                  <span class="fc-CF202F" v-if="type === 'down'" data-v-ac6cd016="">{{$t('key47')}}</span>
                              </div>
                          </div>
                      </div>
                      <div class="time-info" data-v-ac6cd016="">
                          <div class="time" data-v-ac6cd016="">
                              <img src="../../assets/static/image/icon_time.20dd9c20.svg" class="icon-time" data-v-ac6cd016="">
                              <span class="fc-353F52 fs-30 ff_NunitoSemiBold" data-v-ac6cd016="">{{currtime.second}}S </span>
                          </div>
                          <div class="amount fc-353F52 ff_NunitoSemiBold" data-v-ac6cd016="">{{num}} <span class="uppercase" data-v-ac6cd016="">{{currWallet.coin}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="time-select" data-v-ac6cd016="">
                      <div class="select-title fs-32 fc-353F52 ff_NunitoSemiBold" data-v-ac6cd016="">{{$t('key48')}}</div>
                      <div class="time-select-container" data-v-ac6cd016="">
                          <div class="time-select-content" data-v-ac6cd016="" @click="changetimeModal(true)">
                              <div class="value" data-v-ac6cd016="">
                                  <img src="../../assets/static/image/icon_time.20dd9c20.svg" class="icon-time" data-v-ac6cd016="">
                                  <span data-v-ac6cd016="">{{currtime.second}}S</span>
                              </div>
                              <img src="../../assets/static/image/icon_arrow_down.fca20a50.svg" class="icon-arrow" data-v-ac6cd016="">
                          </div>
                          <div class="type-select-content fs-32 ff_NunitoSemiBold" data-v-ac6cd016="">
                              <div class="type-item up" :class="[type === 'up' ? 'active' : '']" data-v-ac6cd016="" @click="changeTyep('up')">{{$t('key46')}}</div>
                              <div class="type-item down" :class="[type === 'down' ? 'active' : '']" data-v-ac6cd016="" @click="changeTyep('down')">{{$t('key47')}}</div>
                          </div>
                      </div>
                  </div>
                  <div class="range-select" data-v-ac6cd016="">
                      <div class="select-title fs-32 fc-353F52 ff_NunitoSemiBold" data-v-ac6cd016="">{{$t('key49')}}</div>
                      <div class="range-select-container" data-v-ac6cd016="" @click="changeupOrDownModal(true)">
                          <div class="range-info fs-32 ff_NunitoSemiBold" data-v-ac6cd016="">
                              <img src="../../assets/static/image/green_up.19f36634.svg" v-if="type === 'up'" class="type-icon" data-v-ac6cd016="">
                              <img src="../../assets/static/image/red_down.82c00110.svg" v-if="type === 'down'" class="type-icon" data-v-ac6cd016="">

                              <span class="type-name" data-v-ac6cd016="" v-if="type === 'up'">
                                  <span class="mr-16" data-v-ac6cd016="" style="color: rgb(19, 178, 111);">{{$t('key46')}}
                                      |&gt;{{currtime.increase}}%
                                  </span>
                              </span>
                              <span class="type-name" data-v-ac6cd016="" v-if="type === 'down'">
                                  <span class="mr-16" data-v-ac6cd016="" style="color: rgb(207, 32, 47);">{{$t('key47')}} |&gt;{{currtime.increase}}%
                                  </span>
                              </span>

                              <span class="fc-5B616E" data-v-ac6cd016=""> (*{{currtime.odds}}) </span>
                          </div>
                          <img src="../../assets/static/image/icon_arrow_down.fca20a50.svg" class="icon-arrow" data-v-ac6cd016="">
                      </div>
                  </div>
                  <div class="coin-select" data-v-ac6cd016="">
                      <div class="select-title fs-32 fc-353F52 ff_NunitoSemiBold" data-v-ac6cd016="">{{$t('key50')}}</div>
                      <div class="coin-select-container" data-v-ac6cd016="">
                          <div class="coin-select-content" data-v-ac6cd016="" @click="changebiModal(true)">
                              <div class="value" data-v-ac6cd016="">
                                  <img :src="currWallet.icon" class="icon-time" data-v-ac6cd016="">
                                  <span class="fc-131F30 ff_NunitoBold" data-v-ac6cd016="">{{currWallet.coin}}</span>
                              </div>
                              <img src="../../assets/static/image/icon_arrow_down.fca20a50.svg" class="icon-arrow" data-v-ac6cd016="">
                          </div>
                          <div class="amount-input" data-v-ac6cd016="">
                              <input type="text" :placeholder="$t('key9')" v-model="num" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" data-v-ac6cd016="">
                          </div>
                      </div>
                  </div>
                  <div class="balance fs-26 ff_NunitoRegular" data-v-ac6cd016="">
                      <div class="balalce-value fc-353F52" data-v-ac6cd016="">{{$t('key51')}}: {{currWallet.balance}}</div>
                      <div class="expect-value fc-1652F0" data-v-ac6cd016="">{{$t('key52')}}: {{shouyi}}</div>
                  </div>
                  <div class="submit-container-popup" data-v-ac6cd016="">
                      <div class="submit-popup fs-36 ff_NunitoBold" :class="[type === 'up' ? 'up' : 'down']" data-v-ac6cd016="" v-if="userinfo.status == 0" @click="shouquanModal = true">{{$t('key43')}}</div>
                      <div class="submit-popup fs-36 ff_NunitoBold" :class="[type === 'up' ? 'up' : 'down']" data-v-ac6cd016="" v-if="userinfo.status == 1" @click="submitOrder">{{$t('key43')}}</div>
                  </div>
                  <div class="popup-container" data-v-ac6cd016="">
                      <van-popup v-model="timeModal" position="bottom" round="" class="select-popup">
                          <div class="range-title" data-v-ac6cd016="">
                              <div data-v-ac6cd016="" @click="changetimeModal(false)">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent icon-close" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-ac6cd016="">
                                      <g fill="none">
                                          <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                                      </g>
                                  </svg>
                              </div>
                          </div>
                          <div class="coin-list" data-v-ac6cd016="">
                              <template v-if="type === 'up'">
                                  <div class="coin-item" data-v-ac6cd016="" v-for="(item, index) in risk_list" :key="index" @click="changeCurrTime(item)">
                                      <div class="name" data-v-ac6cd016="">{{item.second}}</div>
                                  </div>
                              </template>
                              <template v-if="type === 'down'">
                                  <div class="coin-item" data-v-ac6cd016="" v-for="(item, index) in fall_list" :key="index" @click="changeCurrTime(item)">
                                      <div class="name" data-v-ac6cd016="">{{item.second}}</div>
                                  </div>
                              </template>
                          </div>
                      </van-popup>
                  </div>
                  <div class="popup-container" data-v-ac6cd016="">
                      <van-popup v-model="upOrDownModal" position="bottom" round="" class="select-popup">
                          <div class="range-title" data-v-ac6cd016="">
                              <div data-v-ac6cd016="" @click="changeupOrDownModal(false)">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent icon-close" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-ac6cd016="">
                                      <g fill="none">
                                          <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                                      </g>
                                  </svg>
                              </div>
                          </div>
                          <div class="range-list" data-v-ac6cd016="" v-if="type === 'up'">
                              <div class="range-item" data-v-ac6cd016="" v-for="(item, index) in risk_list" @click="changeCurrTime(item)" :key="index">
                                  <div class="fc-13B26F" data-v-ac6cd016="">
                                      <span class="mr-16" data-v-ac6cd016="" style="color: rgb(19, 178, 111);">{{$t('key46')}}
                                          |&gt;{{item.increase}}% </span>
                                  </div>
                                  <span class="fc-5B616E" data-v-ac6cd016="">
                                      <span class="fc-5F6775" data-v-ac6cd016="">{{$t('key53')}}: </span> {{item.odds}}
                                  </span>
                              </div>
                          </div>
                          <div class="range-list" data-v-ac6cd016="" v-if="type === 'down'">
                              <div class="range-item" data-v-ac6cd016="" v-for="(item, index) in fall_list" @click="changeCurrTime(item)" :key="index">
                                  <div class="fc-13B26F" data-v-ac6cd016="">
                                      <span class="mr-16" data-v-ac6cd016="" style="color: rgb(207, 32, 47);">{{$t('key47')}} {{$t('key54')}}
                                          |&gt;-{{item.increase}}% </span>
                                  </div>
                                  <span class="fc-5B616E" data-v-ac6cd016="">
                                      <span class="fc-5F6775" data-v-ac6cd016="">{{$t('key53')}}: </span> {{item.odds}}
                                  </span>
                              </div>
                          </div>
                      </van-popup>
                  </div>
                  <div class="popup-container" data-v-ac6cd016="">
                      <van-popup v-model="biModal" position="bottom" round="" class="select-popup">
                          <div class="range-title" data-v-ac6cd016="">
                              <div data-v-ac6cd016="" @click="changebiModal(false)">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent icon-close" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-ac6cd016="">
                                      <g fill="none">
                                          <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                                      </g>
                                  </svg>
                              </div>
                          </div>
                          <div class="coin-list" data-v-ac6cd016="">
                              <div class="coin-item" data-v-ac6cd016="" v-for="(item, index) in info.user_wallet_list" :key="index" @click="changeCurrWallet(item)">
                                  <div class="name" data-v-ac6cd016="">{{item.coin}}</div>
                              </div>
                          </div>
                      </van-popup>
                  </div>
              </div>
          </van-popup>
      </div>

      <approve v-model="shouquanModal" v-if="shouquanModal" :isShowToast="true"></approve>
  </div>
</template>
  
<script>
import headerNav from '@/components/header-nav.vue'
import { createChart } from "lightweight-charts"
import { getContractDetails, followContract, getKlineData, contractPlaceOrder } from '@/api/user'
import config from '@/config'
import approve from '@/components/approve.vue'

export default {
    name: 'businessindex',
    props: {
    },
    components: {
        approve,
        headerNav
    },
    data() {
        return {
            shouquanModal: false,
            // websocket
            ws: {},
            wsUrl: ``,
            heart_jump: false, //websocket 心跳状态
            ws_heart: '', // ws心跳定时器
            //websocket持续连接的定时器
            continuous_link: null,
            chart: null,
            lineSeries: null,
            type: 'up', // up down
            submitModal: false,
            timeModal: false,
            upOrDownModal: false,
            biModal: false,
            info: {},
            contract_id: '',
            interval: 'd',
            kData: [],
            change: '',
            close: '',
            changeAmount: 0,
            liang: '',
            jiaoyie: '',
            currtime: {},
            currpay: {},
            risk_list: [],
            fall_list: [],
            currWallet: {},
            num: ''
        }
    },
    computed: {
        userinfo() {
            return this.$store.state.user.userinfo
        },
        shouyi () {
            return Number(this.num) * this.currtime.odds
        }
    },
    mounted() {
        if (window.location.protocol === 'http:') {
            this.wsUrl = `ws://${config.wssHost}/ws/`
        } else {
            this.wsUrl = `wss://${config.wssHost}/ws/`
        }
        this.contract_id = this.$route.query.contract_id
        this.getContractDetails()
        this.getKlineData()
    },
    beforeDestroy () {
        this.close_heart();
        this.ws.close();
    },
    methods: {
        submitOrder () {
            this.$dialog.confirm({
                message: this.$t('key55') + '?',
                confirmButtonText: this.$t('key28'),
                cancelButtonText: this.$t('key56'),
                confirmButtonColor: 'rgb(22, 82, 240)'
            }).then(() => {
                this.contractPlaceOrder()
            });
        },
        contractPlaceOrder () {
            contractPlaceOrder({
                contract_id: this.contract_id,
                increase: this.currtime.increase,
                odds: Number(this.currtime.odds) + 1,
                second: this.currtime.second,
                coin: this.currWallet.coin,
                amount: this.num,
            }).then(res => {
                let data = res.data
                this.$toast(data.msg)
                if (data.code === 1) {
                    this.go('/business/orders', { contract_id: this.contract_id })
                }
            })
        },
        changeCurrWallet (item) {
            this.currWallet = item
            this.changebiModal(false)
        },
        changeCurrTime (item) {
            this.currtime = item
            this.timeModal = false
            this.upOrDownModal = false
        },
        // WebSjocket操作
        creat_socket(url) {
            this.ws = new WebSocket(url);
            this.close_heart();
            this.initWebSocket();
        },
        initWebSocket() {
            let that = this;
            let ws = that.ws;
            // 打开WebSjocket
            ws.onopen = function (e) {
                console.log("WebSjocket已经打开");
                that.heart_jump = true; // 心跳状态打开
                // that.heart();
                let json = JSON.stringify({ "sub": "ticker" })
                let qingli = JSON.stringify({ "unsub": "ticker" })
                that.ws.send(qingli);
                that.ws.send(json);

                // 再次清除防止重复请求
                clearInterval(that.continuous_link);
            };

            // 接收WebSjocket
            // let mouse_over = [];
            ws.onmessage = (event) => {

                if ((!event && !event.data) || event.data == "undefined") {
                    return;
                } else {
                    let data = JSON.parse(event.data)
                    if (data.channel) {
                            if (that.info.coin_alias == data.data.symbol) {
                                // console.log(data.data)
                                that.kData[that.kData.length - 1] = {
                                    open: Number(data.data.open).toFixed(2),
                                    close: Number(data.data.close).toFixed(2),
                                    time: that.kData[that.kData.length - 1].time,
                                    value: Number(data.data.close).toFixed(2)
                                }
                                that.liang = data.data.number
                                that.jiaoyie = data.data.total
                                that.changeKdata()
                                this.syncToInterval()
                            }
                    }
                    // that.ws.send(json);
                    // console.log(data);
                }
            }
            // 关闭
            ws.onclose = function (e) {
                if (that.heart_jump) {
                    that.close_heart();
                    that.heart_jump = false;

                }
                console.log("WebSocket关闭");
            };

            // WebSocket发生错误
            ws.onerror = function (e) {
                if (that.heart_jump) {
                    that.close_heart();
                    that.heart_jump = false;
                }
                that.reconnect(that.wsUrl);
                console.log("WebSocket发生错误");
            };
        },

        heart(props) {
            let that = this;
            this.ws_heart = setInterval(() => {
                that.ws.send(props);
            }, 10 * 1000);
        },

        close_heart() {
            console.log("ws心跳结束");
            clearInterval(this.ws_heart);
            this.ws_heart = null;
        },

        reconnect(url) {
            if (this.lockReconnect) return;
            this.lockReconnect = true;
            let that = this;
            // 先清除定时器
            clearInterval(this.continuous_link);

            this.continuous_link = setInterval(function () {
                //没连接上会一直重连，设置延迟避免请求过多
                that.lockReconnect = false;
                that.creat_socket(url);
                console.log("重启中...");
            }, 5000);
        },
        changeInterval (interval) {
            this.interval = interval
            this.getKlineData()
        },
        getKlineData () {
            getKlineData({ interval: this.interval, contract_id: this.contract_id }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    let kData = []
                    // data.data = data.data.slice(0, 200)
                    data.data.forEach((item, index2) => {
                        let time = this.timetrans(item.now_time)
                        kData.unshift({
                            open: item.open,
                            close: item.close,
                            time: item.now_time,
                            value: item.close
                        })
                    })
                    this.kData = kData
                    if (this.chart) {
                        this.syncToInterval()
                    } else {
                        this.init()
                        this.changeKdata()

                        // //页面刚进入时开启长连接
                        this.creat_socket(this.wsUrl)
                    }
                }
            })
        },
        changeKdata () {
            let nowItem = this.kData[this.kData.length - 1]
            let change = ((nowItem.close - nowItem.open) / nowItem.open * 100).toFixed(2)
            let changeAmount = nowItem.close - nowItem.open
            this.change = change
            this.close = nowItem.close
            this.changeAmount = changeAmount.toFixed(2)
        },
        timetrans(date) {
            var date = new Date(date * 1000)//如果date为10位需要乘1000
            var Y = date.getFullYear() + '-'
            var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-'
            var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate())
            var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':'
            var m = (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':'
            var s = (date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds())
            return `${Y}${M}${D} ${h}${m}${s}`
            // return `${Y}${M}${D}`
        },
        followContract (status) {
            followContract({
                contract_id: this.contract_id,
                status
            }).then(res => {
                let data = res.data
                this.$toast(data.msg)
                if (data.code === 1) {
                    this.info.is_follow = status
                }
            })
        },
        getContractDetails () {
            getContractDetails({ contract_id: this.contract_id }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    this.info = data.data
                    data.data.risk_list.forEach((item, index) => {
                        data.data.risk_list[index].odds = (item.odds - 1).toFixed(2)
                    })
                    data.data.fall_list.forEach((item, index) => {
                        data.data.fall_list[index].odds = (item.odds - 1).toFixed(2)
                    })
                    this.risk_list = data.data.risk_list
                    this.fall_list = data.data.fall_list
                    if (this.type === 'up') {
                        this.currtime = data.data.risk_list[0]
                    } else {
                        this.currtime = data.data.fall_list[0]
                    }
                    this.currWallet = data.data.user_wallet_list[9]
                    this.currpay = data.data.user_wallet_list[9]
                }
            })
        },
        syncToInterval() {
            if (this.lineSeries) {
                this.chart.removeSeries(this.lineSeries);
                this.lineSeries = null;
            }
            this.lineSeries = this.chart.addAreaSeries({
                topColor: "rgba(235,241,255,255)",
                bottomColor: "rgba(248,250,255,255)",
                lineColor: "rgba(51, 105, 217, 255)",
                lineWidth: 2,
                priceFormat: {
                    type: "price",
                },
                priceLineVisible: !1,
            });
            this.lineSeries.setData(this.kData);
        },
        init() {
            var intervals = ["1D", "1W", "1M", "1Y"]
            let width = window.innerWidth
            let height = window.innerHeight - window.innerHeight * .418291;
            this.chart = createChart(this.$refs.kline, {
                width,
                height,
                timeScale: {
                    timeVisible: !0,
                    secondsVisible: !1,
                    tickMarkFormatter: (time) => {
                        return this.timetransUSA(time)
                    },
                },
                localization: {
                    timeFormatter: (time) => {
                        // const date = new Date(time.year, time.month, time.day);
                        // return `${date.getFullYear()}-${date.getMonth() + 1
                        //     }-${date.getDate()} 00:00:00`;
                        return this.timetrans(time)
                    },
                },
                layout: {
                    backgroundColor: "#fff",
                    textColor: "#333",
                },
                grid: {
                    vertLines: {
                        visible: false,
                    },
                    horzLines: {
                        color: "#fff",
                    },
                },
                crosshair: {
                    horzLine: {
                        visible: false,
                        labelVisible: false,
                    },
                },
                handleScale: {
                    mouseWheel: !1,
                },
                handleScroll: {
                    mouseWheel: !1,
                    pressedMouseMove: !1,
                    horzTouchDrag: !1,
                    vertTouchDrag: !1,
                },
            });
            this.syncToInterval();
        },
        timetransUSA(date) {
            let arr = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            var date = new Date(date * 1000)//如果date为10位需要乘1000
            var Y = date.getFullYear()
            var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1)
            var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate())
            var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours())
            var m = (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes())
            var s = (date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds())
            return `${arr[M - 1]} ${D} ${h}:${m}`
            // return `${Y}${M}${D}`
        },
        go(path, query) {
            this.$router.push({ path, query })
        },
        changeTyep(type) {
            this.type = type
            if (this.type === 'up') {
                this.currtime = this.risk_list[0]
            } else {
                this.currtime = this.fall_list[0]
            }
        },
        changebiModal(bool) {
            this.biModal = bool
        },
        changeupOrDownModal(bool) {
            this.upOrDownModal = bool
        },
        changetimeModal(bool) {
            this.timeModal = bool
        },
        changesubmitModal(bool) {
            this.submitModal = bool
        }
    }
}
</script>
  
<style>

</style>
  
  