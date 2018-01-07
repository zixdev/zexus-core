<template>
    <form @submit.prevent="save()">
        <v-card class="mb-3">
            <v-card-text>

                <v-text-field
                        name="site_name"
                        :label="$t('table.name')"
                        v-model="site.name"
                        :rules="messages.validation.name"
                        autofocus
                        required
                ></v-text-field>
                <v-text-field
                        name="site_url"
                        :label="$t('table.url')"
                        v-model="site.url"
                        :rules="messages.validation.url"
                        required
                ></v-text-field>
                <v-text-field
                        name="site_ui"
                        :label="$t('table.ui')"
                        v-model="site.ui"
                        :rules="messages.validation.ui"
                        required
                ></v-text-field>
            </v-card-text>
        </v-card>
        <v-btn color="primary" :loading="$store.state.fetching" type="submit">
            <i v-if="$store.state.fetching" class="fa fa-spinner fa-pulse"></i>
            {{ edit ? $t('form.edit') : $t('form.create') }}
        </v-btn>
        <v-btn type="reset" router :to="{name: 'system.sites.index'}">
            {{ $t('form.cancel') }}
        </v-btn>
    </form>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'
    import {mapState} from 'vuex'

    @Component({
        computed: {
            ...mapState(['messages'])
        }
    })
    export default class SiteManager extends Vue {
        site = {};

        mounted() {
            /*
             * Set Page BreadCrumb
             */
            this.$store.dispatch('setBreadCrumbs', [
                'system.sites.index',
                'system.sites.' + (this.edit ? 'edit' : 'add')
            ]);

            if (this.edit) {
                this.$http.get('sites/' + this.$route.params.id).then(response => this.site = response.data.data);
            }
        }

        save() {
            return this.edit ? this.update() : this.create();
        }

        get edit() {
            return !!this.$route.params.id;
        }

        update() {
            return this.$http.put('sites/' + this.$route.params.id, this.site).then(response => {
                this.$events.$emit('notify', {
                    type: 'info',
                    title: 'Success !',
                    message: this.$t('notifications.data.updated_successfully')
                });
                this.$router.push({name: 'system.sites.index'});
            });
        }

        create() {
            return this.$http.post('sites', this.site).then(response => {
                this.$events.$emit('notify', {
                    type: 'success',
                    title: 'Success !',
                    message: this.$t('notifications.data.created_successfully')
                });
                this.$router.push({name: 'system.sites.index'});
            });
        }

    }
</script>
