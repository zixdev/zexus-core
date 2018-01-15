<template>
    <form @submit.prevent="save()">
        <v-card class="mb-3">
            <v-card-text>
                <v-text-field
                        name="username"
                        :label="$t('table.username')"
                        v-model="user.username"
                        :rules="messages.validation.username"
                        required
                        minlength="3"
                        maxlength="255"
                ></v-text-field>
                <v-text-field
                        name="email"
                        type="email"
                        :label="$t('table.email')"
                        v-model="user.email"
                        :rules="messages.validation.email"
                        required
                        minlength="3"
                        maxlength="255"
                ></v-text-field>
                <v-select
                        :items="roles"
                        v-model="user.roles"
                        :label="$t('table.user_roles')"
                        class="input-group--focused"
                        item-text="name"
                        item-value="id"
                        return-object
                        multiple
                        chips
                ></v-select>
                <div v-if="!edit">
                    <v-text-field
                            name="password"
                            type="password"
                            :label="$t('table.password')"
                            v-model="user.password"
                            :rules="messages.validation.password"
                            :required="!edit"
                            minlength="3"
                            maxlength="255"
                    ></v-text-field>
                </div>
                <div v-if="!edit">
                    <v-text-field
                            name="password_confirmation"
                            type="password"
                            :label="$t('table.password_confirmation')"
                            v-model="user.password_confirmation"
                            :rules="messages.validation.password_confirmation"
                            :required="!edit"
                            minlength="3"
                            maxlength="255"
                    ></v-text-field>
                </div>
            </v-card-text>
        </v-card>

        <v-btn color="primary" :loading="$store.state.fetching" type="submit">
            <i v-if="$store.state.fetching" class="fa fa-spinner fa-pulse"></i>
            {{ edit ? $t('form.edit') : $t('form.create') }}
        </v-btn>
        <v-btn color="default" router :to="{name: 'accounts.users.index'}" type="reset">
            {{ $t('form.cancel') }}
        </v-btn>
    </form>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import {mapState, mapActions} from 'vuex';

    @Component({
        computed: mapState(['messages'])
    })
    export default class UserManager extends Vue {
        user = {};
        roles = [];

        mounted() {
            /*
             * Set Page BreadCrumb
             */
            this.$store.dispatch('setBreadCrumbs', [
                'accounts.users.index',
                'accounts.users.' + (this.edit ? 'edit' : 'add')
            ]);
            if (this.edit) {
                this.$http.get('users/' + this.$route.params.id).then(response => this.user = response.data.data);
            }

            this.$http.get('roles').then(response => this.roles = response.data.data);
        }

        get edit() {
            return !!this.$route.params.id;
        }

        save() {
            // if form for create
            return this.edit ? this.update() : this.create();
        }

        update() {
            this.$http.put('users/' + this.$route.params.id, this.user)
                .then(response => {
                    this.$events.$emit('notify', {
                        type: 'info',
                        title: 'Success !',
                        message: this.$t('notifications.data.updated_successfully')
                    });
                    this.$router.push({name: 'accounts.users.index'});
                });
        }

        create() {
            return this.$http.post('users', this.user).then(response => {
                this.$events.$emit('notify', {
                    type: 'success',
                    title: 'Success !',
                    message: this.$t('notifications.data.created_successfully')
                });
                this.$router.push({name: 'accounts.users.index'});
            });
        }



    }
</script>
