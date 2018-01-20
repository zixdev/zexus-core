<template>
    <form @submit.prevent="save()">
        <h4>Captcha</h4>
        <v-layout wrap>
            <v-flex sm6 xs12 class="pa-2">
                <v-text-field
                        name="public_key"
                        :label="$t('public_key')"
                        v-model="config.captcha_public_key"
                        minlength="3"
                        maxlength="255"
                        autofocus
                ></v-text-field>


            </v-flex>
            <v-flex sm6 xs12 class="pa-2">
                <v-text-field
                        name="private_key"
                        :label="$t('private_key')"
                        v-model="config.captcha_private_key"
                        minlength="3"
                        maxlength="255"
                ></v-text-field>
            </v-flex>
        </v-layout>
        <v-btn color="primary" :loading="$store.state.fetching" type="submit">
            <i v-if="$store.state.fetching" class="fa fa-spinner fa-pulse"></i>
            {{ $t('form.save') }}
        </v-btn>
        <v-btn color="default" type="reset" router :to="{name: 'system.sites.index'}">
            {{ $t('form.cancel') }}
        </v-btn>
    </form>
</template>
<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'
    import {mapState} from 'vuex'

    @Component({
        computed: mapState(['messages'])
    })
    export default class Security extends Vue {
        config = {};

        mounted() {
            this.$events.$on('site.set.configs', conf => this.config = conf)
        }

        save() {
            this.$http.post('sites/' + this.$route.params.id + '/config', this.config)
                .then(response => this.$events.$emit('notify', {
                    type: 'info',
                    title: 'Success !',
                    message: this.$t('notifications.config.updated_successfully')
                }))
        }
    }
</script>
