<template>
    <v-card class="mb-4">
        <v-breadcrumbs divider="/">
            <v-breadcrumbs-item
                    v-for="item in $store.state.breadcrumbs" :key="item"
                    exact
                    :to="{name: item}"
            >
                {{ $t(item) }}
            </v-breadcrumbs-item>
        </v-breadcrumbs>
    </v-card>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {mapGetters, mapActions} from 'vuex';

    @Component({
        methods: mapActions(['toggleSidebar'])
    })
    export default class Breadcrumbs extends Vue {

        breads = [
            'dashboard.index',
            'system.translations.index',
            'system.translations.edit'
        ];

        mounted() {

        }


    }
</script>
