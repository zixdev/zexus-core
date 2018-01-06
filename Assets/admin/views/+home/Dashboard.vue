<template>
    <v-layout>
        <v-flex md4>
            <v-card>
                <v-card-title>
                    Users
                </v-card-title>
            </v-card>
        </v-flex>
        <v-flex md4>
            <v-card>
                <v-card-title>
                    Pages
                </v-card-title>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'

    @Component
    export default class Dashboard extends Vue {
        mounted() {
            this.$store.dispatch('setBreadCrumbs', []);
        }

    }
</script>
