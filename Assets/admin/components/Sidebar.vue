<template>
    <v-navigation-drawer class="l-sidebar "
                         fixed
                         app
                         :mini-variant="$store.state.sidebar.mini_variant"
                         :clipped="$store.state.sidebar.clipped"
                         v-model="$store.state.sidebar.show">
        <v-list dense>
            <template v-for="(item,i) in router">
                <v-list-group v-if="item.children" no-action>
                    <v-list-tile ripple slot="item" @click="">
                        <v-list-tile-action>
                            <v-icon>{{ item.meta.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title v-text="$t(item.name)"/>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-icon>keyboard_arrow_down</v-icon>
                        </v-list-tile-action>

                    </v-list-tile>
                    <v-list-tile v-for="(subItem,i) in valid(item.children)" :key="i" ripple router
                                 :to="{name: subItem.name}">
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ $t(subItem.name) }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-subheader v-else-if="item.header" v-text="item.header"></v-subheader>
                <v-divider v-else-if="item.divider" light/>
                <v-list-tile v-else ripple router :to="{name: item.name}">
                    <v-list-tile-action>
                        <v-icon>{{ item.meta.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title v-text="$t(item.name)"></v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </template>
        </v-list>
    </v-navigation-drawer>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {mapGetters} from 'vuex';

    @Component({
        computed: mapGetters(['sidebar'])
    })
    export default class Sidebar extends Vue {

        get router() {
            return this.valid(Zexus.routes)
        }

        get _sidebar() {
            return this.sidebar;
        }

        set _sidebar(val) {
        }

        valid(routes) {
            return routes.filter(route => route.meta.menu);
        }

    }
</script>
<style type="text/scss" lang="scss" rel="stylesheet/scss">
    .l-sidebar {
        padding-top: 20px;
    }

    .list--group__container > .list.list--group > li .list__tile__title {
        padding-left: 57px;
    }
</style>