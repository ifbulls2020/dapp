<template>
    <div v-if="0"  id="fixedbutton" @click="go" class="float_cs_btn draggable whs-service" v-drag data-v-41ea2f78="" style="width: 56.25px; height: 56.25px; left: 305px; top: 533.6px;">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fluent" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="fluent:person-chat-24-regular" data-v-41ea2f78="">
            <g fill="none">
                <path d="M11.31 15.498a6.477 6.477 0 0 1 .71-1.5H6.25A2.25 2.25 0 0 0 4 16.248v.577c0 .893.319 1.757.898 2.436c1.413 1.654 3.491 2.552 6.192 2.713l.451-1.48c-2.502-.08-4.319-.822-5.502-2.207a2.25 2.25 0 0 1-.539-1.462v-.578c0-.413.336-.749.75-.749h5.06zM11.999 2a5.001 5.001 0 1 1 0 10.002a5.001 5.001 0 0 1 0-10.002zm0 1.5a3.5 3.5 0 1 0 0 7.002a3.5 3.5 0 0 0 0-7.002zM23 17.5a5.501 5.501 0 0 1-8.168 4.813l-2.187.665a.5.5 0 0 1-.624-.624l.666-2.187A5.501 5.501 0 1 1 23 17.498zm-7.502-1.5a.5.5 0 1 0 0 1H19.5a.5.5 0 1 0 0-1h-4zm-.5 2.5a.5.5 0 0 0 .5.5h2a.5.5 0 1 0 0-1h-2a.5.5 0 0 0-.5.5z" fill="currentColor">
                </path>
            </g>
        </svg>
    </div>

</template>

<script>

export default {
    name: 'kefu',
    props: {
    },
    components: {
    },
    computed: {
        configInfo() {
            return this.$store.state.user.configInfo
        }
    },
    data() {
        return {
        }
    },
    mounted() {
    },
    methods: {
        go () {
            var url = this.$store.state.user.userinfo.custom_service_url ? this.$store.state.user.userinfo.custom_service_url : this.configInfo.chatLink
            window.location.href = url
        }
    }
}
</script>

<style>

</style>
  
  