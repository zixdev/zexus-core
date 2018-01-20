<template>
    <form @submit.prevent="save()">
        <h4>
            Social API's
        </h4>
        <v-layout wrap>

            <v-flex sm6 xs12 v-for="(social, i) of socials" :key="i">
                <strong>
                    {{ social.name }}
                </strong>
                <v-text-field
                        name="app_id"
                        :label="$t('app_id')"
                        v-model="config[social.id + '_clientId']"
                        minlength="3"
                        maxlength="255"
                ></v-text-field>
                <v-text-field
                        name="app_secret"
                        :label="$t('app_secret')"
                        v-model="config[social.id + '_clientSecret']"
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
    export default class SocialApi extends Vue {
        config = {};
        socials = [
            {
                id: 'services_facebook',
                name: 'Facebook'
            },
            {
                id: 'services_twitter',
                name: 'Twitter'
            },
            {
                id: 'services_google',
                name: 'Google Plus'
            },
            {
                id: 'services_github',
                name: 'Github'
            }
        ];

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
