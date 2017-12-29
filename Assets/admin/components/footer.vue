<template>
    <v-footer class="l-footer elevation-1" app>
        <v-container fluid>
            <v-layout class="l-footer__copy_write">
                <v-flex md6 v-html="rights"></v-flex>
                <v-flex md6 class="text-sm-right">
                    Powered By: <a href="https://zixdev.com/" target="_blank">zixdev.com</a>
                </v-flex>
            </v-layout>
        </v-container>
    </v-footer>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'

    @Component
    export default class Footer extends Vue {

        get rights() {
            let d = new Date();
            return ` &copy; 2016-${d.getFullYear()} ${this.$store.state.app_name}, All right reserved`
        }

    }
</script>
<style type="text/scss" lang="scss" rel="stylesheet/scss">
    .footer {
        height: 50px;
        a {
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }
    }

</style>