<template>
    <v-app>
        <app-side-bar></app-side-bar>
        <app-header></app-header>
        <main>
            <v-content>
                <v-container fluid  class="l-main">
                    <transition name="fade" mode="out-in">
                        <router-view></router-view>
                    </transition>
                </v-container>
            </v-content>
        </main>
        <app-snack-bar></app-snack-bar>
        <app-footer></app-footer>
    </v-app>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {AppHeader, AppFooter, AppSideBar, AppSnackBar} from './components';

    @Component({
        components: {
            AppHeader, AppFooter, AppSideBar, AppSnackBar
        }
    })
    export default class ZixAdmin extends Vue {
        mounted() {

        }



    }
</script>
