<template>
    <v-toolbar class="l-header__top"
               app
               color="primary"
               clipped-left
               fixed>
        <v-toolbar-side-icon @click.native.stop="toggleSidebar()"/>
        <v-toolbar-title>ZIX DEV</v-toolbar-title>


        <v-spacer class="hidden-sm-and-down"></v-spacer>
        <v-toolbar-items>
            <v-menu bottom right class="hidden-xs-only">
                <v-btn icon slot="activator">
                    <v-icon>language</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="setLang('en')">
                        <v-list-tile-title>English</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile @click="setLang('fr')">
                        <v-list-tile-title>French</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile @click="setLang('ar')">
                        <v-list-tile-title>العربية</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-menu bottom left>
                <v-btn icon slot="activator">
                    <v-icon>settings</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="logout()">
                        <v-list-tile-title>Logout</v-list-tile-title>
                    </v-list-tile>

                </v-list>
            </v-menu>
        </v-toolbar-items>


    </v-toolbar>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {mapGetters, mapActions} from 'vuex';

    @Component({
        methods: mapActions(['toggleSidebar'])
    })
    export default class Header extends Vue {
        mounted() {

        }

        logout() {
            window.location = '/logout';
        }

    }
</script>
