<template>
    <form @submit.prevent="save()">
        <h4>Email Sender</h4>
        <v-layout wrap>
            <v-flex sm6 xs12>
                <v-text-field
                        name="name"
                        :label="$t('name')"
                        v-model="config.mail_from_name"
                        minlength="3"
                        maxlength="255"
                        required
                ></v-text-field>

            </v-flex>
            <v-flex sm6 xs12>
                <v-text-field
                        type="email"
                        name="email"
                        :label="$t('email')"
                        v-model="config.mail_from_address"
                        minlength="3"
                        maxlength="255"
                        required
                ></v-text-field>
            </v-flex>
            <v-flex md12>
                <strong>Driver ({{ config.mail_driver }})</strong>
            </v-flex>
            <v-flex md12>
                <v-select
                        v-bind:items="drivers"
                        v-model="config.mail_driver"
                        :label="$t('mail_system')"
                        dark
                        single-line
                        auto
                />

                <v-layout v-if="config.mail_driver == 'smtp'" wrap>
                    <v-flex md5>
                        <v-text-field
                                name="host"
                                :label="$t('host')"
                                v-model="config.mail_host"
                                minlength="3"
                                maxlength="255"
                        ></v-text-field>

                    </v-flex>
                    <v-flex md5 offset-md2>
                        <v-text-field
                                name="port"
                                type="number"
                                :label="$t('port')"
                                v-model="config.mail_port"
                                minlength="3"
                                maxlength="255"
                        ></v-text-field>
                    </v-flex>
                    <v-flex md5>
                        <v-text-field
                                name="username"
                                :label="$t('username')"
                                v-model="config.mail_username"
                                minlength="3"
                                maxlength="255"
                        ></v-text-field>

                    </v-flex>
                    <v-flex md5 offset-md2>
                        <v-text-field
                                name="password"
                                type="password"
                                :label="$t('password')"
                                v-model="config.mail_password"
                                minlength="3"
                                maxlength="255"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
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
    export default class EmailSettings extends Vue {
        config = {};
        drivers = ['smtp', 'mail', 'sendmail', 'mailgun', 'mandrill', 'sparkpost', 'ses'];

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
