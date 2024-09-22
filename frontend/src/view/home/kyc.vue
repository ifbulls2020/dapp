<template>
    <div class="arbitrage_record" data-v-8178a22e="">
        <header-nav :backIconType="2" :title="$t('key73')"></header-nav>
        <div class="exchange-container" data-v-8178a22e="">
            
        </div>
        <div class="list-container" data-v-8178a22e="">

        </div>
        <!---->
    </div>
</template>

<script>
import headerNav from '@/components/header-nav.vue'
import tab from '@/components/tab.vue'
import noData from '@/components/no-data.vue'
import { getRecordList, findAccountAndRate, exchangeCoin } from '@/api/user'

export default {
    name: 'miningrecord',
    props: {
    },
    components: {
        tab,
        noData,
        headerNav
    },
    data() {
        return {
            page: 1,
            page_size: 20,
            loading: false,
            finished: false,
            List: [],
            info: {},
            tabindex: 0,
            type: 1,
            num: ''
        }
    },
    watch: {
        tabindex () {
            this.type = this.tabindex + 1
            this.getRecordListXiala()
        }
    },
    mounted() {
        this.findAccountAndRate()
        this.getRecordList()
    },
    methods: {
        exchangeCoin () {
            if (!this.num) return this.$toast(this.$t('key30'))
            exchangeCoin({
                coin: 'ETH',
                amount: this.num
            }).then(res => {
                let data = res.data
                this.$toast(data.msg)
                if (data.code === 1) {
                    this.num = ''
                    this.findAccountAndRate()
                    this.getRecordListXiala()
                }
            })
        },
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
            getRecordList({ page: this.page, page_size: this.page_size, type: this.type }).then(res => {
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
.arbitrage_record[data-v-8178a22e] {
    padding-bottom: .6rem;
    font-weight: 500
}

.arbitrage_record .header[data-v-8178a22e] {
    position: relative;
    padding: .27rem .44rem;
    text-align: center
}

.arbitrage_record .header .back[data-v-8178a22e] {
    float: left;
    font-size: .4rem
}

.arbitrage_record .switch_container[data-v-8178a22e] {
    margin-top: .32rem
}

.arbitrage_record .switch_container .switch_content[data-v-8178a22e] {
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

.arbitrage_record .switch_container .switch_content .switch_item[data-v-8178a22e] {
    width: 2.14rem;
    height: .72rem;
    line-height: .72rem;
    text-align: center;
    font-size: .26rem;
    color: #353f52;
    font-weight: 600
}

.arbitrage_record .switch_container .switch_content .switch_item.active[data-v-8178a22e] {
    background: #fff;
    border-radius: .2rem
}

.arbitrage_record .record_list[data-v-8178a22e] {
    padding: 0 .36rem
}

.arbitrage_record .record_list .record_item[data-v-8178a22e] {
    margin-top: .56rem;
    background: #fff;
    box-shadow: .06rem .12rem .2rem #0000000d;
    border-radius: .3rem
}

.arbitrage_record .record_list .record_item .pro_info[data-v-8178a22e] {
    padding: 0 .32rem;
    height: 1.14rem;
    border-bottom: 1px solid rgba(216, 216, 216, .5);
    display: flex;
    justify-content: space-between;
    align-content: center;
    align-items: center
}

.arbitrage_record .record_list .record_item .pro_info .pro_cycle[data-v-8178a22e] {
    display: flex;
    align-content: center;
    align-items: center;
    font-size: .36rem;
    color: #353f52
}

.arbitrage_record .record_list .record_item .pro_info .pro_cycle .icon_save[data-v-8178a22e] {
    margin-right: .2rem;
    width: .48rem
}

.arbitrage_record .record_list .record_item .record_info .section[data-v-8178a22e] {
    padding: 0 !important;
    margin-top: .32rem
}

.arbitrage_record .record_list .record_item .record_info .section .section_item[data-v-8178a22e] {
    display: flex;
    justify-content: space-between;
    padding: 0 .32rem;
    align-content: center;
    align-items: center;
    margin-bottom: .32rem
}

.arbitrage_record .record_list .record_item .record_info .section .section_item .item_name[data-v-8178a22e] {
    color: #353f52
}

.arbitrage_record .record_list .record_item .record_info .section .section_item .item_value[data-v-8178a22e] {
    color: #5b616e
}

.arbitrage_record .record_list .record_item .order_info[data-v-8178a22e] {
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

.arbitrage_record .record_list .record_item .order_info .order_status[data-v-8178a22e] {
    display: flex;
    align-content: center;
    align-items: center
}

.arbitrage_record .record_list .record_item .order_info .order_status .button_status[data-v-8178a22e] {
    padding: 0 .4rem;
    display: inline-block;
    height: .65rem;
    line-height: .65rem;
    background: #1652f0;
    border-radius: .2rem;
    border: none;
    color: #fff
}

.arbitrage_record .no_data_content[data-v-8178a22e] {
    margin-top: .4rem;
    padding-bottom: .4rem;
    text-align: center
}

.arbitrage_record .no_data_content .title[data-v-8178a22e] {
    color: #aaa;
    font-size: .3rem
}

.arbitrage_record .no_data_content .img_no_data[data-v-8178a22e] {
    margin-bottom: .56rem;
    width: 3.7rem;
    height: auto
}

.arbitrage_record .load-more[data-v-8178a22e] {
    margin: 0 auto;
    margin-top: .32rem;
    text-align: center;
    color: #1652f0
}

.arbitrage_record .no-more-data[data-v-8178a22e] {
    margin: 0 auto;
    margin-top: .32rem;
    text-align: center
}

/*! _variables.scss | Vuero | Css ninja 2020-2021 */
[data-v-8178a22e] .van-loading {
    text-align: center;
    margin-top: .5rem
}

.exchange-container[data-v-8178a22e] {
    margin-top: .4rem;
    padding: 0 .32rem;
    line-height: normal
}

.exchange-container .base-content[data-v-8178a22e] {
    padding: .24rem .32rem .46rem;
    background: #fff;
    box-shadow: 0 4px 40px 1px #00000008;
    border-radius: 10px;
    border: 1px solid #eeeef0
}

.exchange-container .base-content .base-title[data-v-8178a22e] {
    position: relative;
    font-size: .28rem;
    color: #353f52;
    font-weight: 500
}

.exchange-container .base-content .base-title .left-line[data-v-8178a22e] {
    position: absolute;
    top: 0;
    left: -.32rem;
    width: .08rem;
    height: .4rem;
    background: linear-gradient(1turn, rgba(90, 71, 217, .09), #1652f0);
    border-radius: .04rem
}

.exchange-container .base-content .base-value[data-v-8178a22e] {
    margin-top: .44rem;
    display: flex;
    justify-content: space-between;
    text-align: center
}

.exchange-container .base-content .base-value .value-item[data-v-8178a22e] {
    width: 50%
}

.exchange-container .base-content .base-value .value-item .value-title[data-v-8178a22e] {
    margin-bottom: .16rem;
    font-size: .28rem;
    color: #353f52;
    font-weight: 500
}

.exchange-container .base-content .base-value .value-item .value[data-v-8178a22e] {
    color: #5b616e;
    font-weight: 400
}

.exchange-container .exchange-content[data-v-8178a22e] {
    margin-top: .4rem
}

.exchange-container .exchange-content .exchange-title[data-v-8178a22e] {
    color: #353f52;
    font-size: .32rem
}

.exchange-container .exchange-content .input-content[data-v-8178a22e] {
    margin-top: .24rem;
    display: flex;
    justify-content: space-between;
    align-items: center
}

.exchange-container .exchange-content .input-content .icon-exchange[data-v-8178a22e] {
    margin: 0 .24rem;
    width: .4rem;
    height: .4rem
}

.exchange-container .exchange-content .input-content input[data-v-8178a22e] {
    width: 3rem;
    height: .94rem;
    padding: 0 .24rem;
    box-sizing: border-box;
    background: #f3f4f6;
    border-radius: .1rem;
    color: #5f6775;
    font-family: NunitoSemiBold
}

.exchange-container .submit-content[data-v-8178a22e] {
    margin-top: .56rem;
    display: flex;
    justify-content: center
}

.exchange-container .submit-content .submit-btn[data-v-8178a22e] {
    width: 3.66rem;
    height: .94rem;
    line-height: .94rem;
    text-align: center;
    background: #1652f0;
    border-radius: 14px;
    color: #fff;
    font-size: .36rem;
    font-weight: 500
}

.list-container[data-v-8178a22e] {
    margin-top: .56rem;
    padding: 0 .32rem
}

.list-container .list-title[data-v-8178a22e] {
    margin-bottom: .24rem;
    color: #353f52;
    font-size: .32rem;
    font-weight: 600
}

.v-button[data-v-8178a22e] {
    width: 2.66rem;
    height: .84rem;
    font-size: .28rem;
    border-radius: 14px
}

.arbitrage_record .popup_content .ensure_popup[data-v-8178a22e] {
    width: 6.42rem;
    background: #fff;
    border-radius: .2rem;
    z-index: 2
}

.arbitrage_record .popup_content .ensure_popup .ensure_content[data-v-8178a22e] {
    padding: .44rem;
    text-align: center
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .icon_ensure[data-v-8178a22e] {
    width: 1.26rem
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .amount_info[data-v-8178a22e] {
    margin-top: .56rem
}

.arbitrage_record .popup_content .ensure_popup .ensure_content .confirm[data-v-8178a22e] {
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

.arbitrage_record .popup_content .ensure_popup .ensure_content .tips[data-v-8178a22e] {
    margin-top: .4rem;
    font-size: .24rem;
    color: #5b616e80
}

.load-more-btn[data-v-8178a22e] {
    margin-top: .6rem;
    text-align: center
}

.nomore-tips[data-v-8178a22e] {
    color: #353f5280;
    margin-top: .6rem;
    text-align: center
}

.fc-13B26F[data-v-8178a22e] {
    color: #13b26f
}

.fc-CF202F[data-v-8178a22e] {
    color: #cf202f
}
</style>

