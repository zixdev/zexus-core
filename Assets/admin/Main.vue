<template>
    <v-app light>
        <app-side-bar></app-side-bar>
        <app-header></app-header>

        <v-content>
            <v-container fluid class="l-main">

                <app-breadcrumbs></app-breadcrumbs>

                <transition name="fade" mode="out-in">
                    <router-view></router-view>
                </transition>
            </v-container>
        </v-content>

        <app-notifications></app-notifications>
        <app-footer></app-footer>
    </v-app>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {AppFooter, AppSideBar, AppHeader, AppBreadcrumbs, AppNotifications} from "@zix-core/admin/components";

    @Component({
        components: {
            AppHeader, AppFooter, AppSideBar, AppBreadcrumbs, AppNotifications
        }
    })
    export default class ZixAdmin extends Vue {
        items = [];

        mounted() {

        }


    }
</script>
