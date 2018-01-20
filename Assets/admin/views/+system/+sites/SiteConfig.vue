<template>
    <div>
        <v-tabs v-model="active">

            <v-card>
                <v-tabs-bar dark>
                    <v-tabs-item
                            v-for="tab in tabs"
                            :key="tab.name"
                            :href="'#' + tab.name"
                    >
                        <v-icon>{{tab.icon}}</v-icon> &nbsp; &nbsp;
                        {{ tab.name }}
                    </v-tabs-item>
                    <v-tabs-slider color="primary"></v-tabs-slider>
                </v-tabs-bar>
                <v-card-text>
                    <v-tabs-items>
                        <v-tabs-content id="General">
                            <General></General>
                        </v-tabs-content>
                        <v-tabs-content id="EmailContact">
                            <EmailContact></EmailContact>
                        </v-tabs-content>
                        <v-tabs-content id="EmailSettings">
                            <EmailSettings></EmailSettings>
                        </v-tabs-content>
                        <v-tabs-content id="Maintenance">
                            <Maintenance></Maintenance>
                        </v-tabs-content>
                        <v-tabs-content id="Security">
                            <Security></Security>
                        </v-tabs-content>
                        <v-tabs-content id="SEO">
                            <SEO></SEO>
                        </v-tabs-content>
                        <v-tabs-content id="SocialApi">
                            <SocialApi></SocialApi>
                        </v-tabs-content>

                    </v-tabs-items>
                </v-card-text>
            </v-card>

        </v-tabs>

    </div>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'
    import {EmailContact, EmailSettings, General, Maintenance, Security, SEO, SocialApi} from './components';

    @Component({
        components: {
            EmailContact, EmailSettings, General, Maintenance, Security, SEO, SocialApi
        }
    })
    export default class SiteConfig extends Vue {
        active = null;
        config = {};
        tabs = [
            {
                name: 'General',
                icon: 'library_books'
            },
            {
                name: 'Security',
                icon: 'security'
            },
            {
                name: 'SEO',
                icon: 'search'
            },
            {
                name: 'Emails',
                icon: 'email'
            },
            {
                name: 'Social API',
                icon: 'share'
            },
            {
                name: 'Maintenance',
                icon: 'build'
            }
        ];

        mounted() {
            /*
            * Set Page BreadCrumb
            */
            this.$store.dispatch('setBreadCrumbs', [
                'system.sites.index',
                'system.sites.' + (this.edit ? 'edit' : 'add'),
                'system.sites.config',
            ]);
            this.loadConfig();
        }

        loadConfig() {
            this.$http.get('sites/' + this.$route.params.id + '/config')
                .then(response => {
                    let data = response.data.data;
                    let configs = {};
                    data.configs.map(config => {
                        configs[config.key] = config.value;
                    });
                    this.config = configs;
                    this.$events.$emit('site.set.configs', configs);
                });
        }

        get edit() {
            return !!this.$route.params.id;
        }

    }
</script>
