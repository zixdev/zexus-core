<template>
    <form @submit.prevent="save()">

        <v-card class="mb-3">
            <v-card-text>
                <v-text-field
                        name="translation_group"
                        :label="$t('table.group')"
                        v-model="translation.group"
                        :rules="messages.validation.group"
                        autofocus
                        required
                ></v-text-field>

                <v-text-field
                        name="translation_key"
                        :label="$t('table.key')"
                        v-model="translation.key"
                        :rules="messages.validation.key"
                        required
                ></v-text-field>
            </v-card-text>


        </v-card>
        <v-card class="mb-3">
            <v-card-text>
                <v-text-field
                        v-for="lang in $store.state.lang.supported_languages"
                        :key="lang"
                        name="translation_text"
                        :label="$t('table.text') + ' (' +lang.toUpperCase()+')'"
                        v-model="translation.text[lang]"
                        :rules="messages.validation.text"
                ></v-text-field>


            </v-card-text>
        </v-card>
        <div>
            <v-btn color="primary" :loading="$store.state.fetching" type="submit">
                <i v-if="$store.state.fetching" class="fa fa-spinner fa-pulse"></i>
                {{ edit ? $t('form.edit') : $t('form.create') }}
            </v-btn>
            <v-btn type="reset" router :to="{name: 'system.translations.index'}">
                {{ $t('form.cancel') }}
            </v-btn>
        </div>
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
    export default class TranslationManager extends Vue {
        translation = {text: {}};

        mounted() {
            /*
             * Set Page BreadCrumb
             */
            this.$store.dispatch('setBreadCrumbs', [
                'system.translations.index',
                'system.translations.' + (this.edit ? 'edit' : 'add')
            ]);
            if (this.edit) {
                this.$http.get('translations/' + this.$route.params.id).then(response => this.translation = response.data.data);
            }
        }

        save() {
            return this.edit ? this.update() : this.create();
        }

        get edit() {
            return !!this.$route.params.id;
        }

        update() {
            return this.$http.put('translations/' + this.$route.params.id, this.translation).then(response => {
                this.$events.$emit('notify', {
                    type: 'info',
                    title: 'Success !',
                    message: this.$t('notifications.data.updated_successfully')
                });
                this.$router.push({name: 'system.translations.index'});
            });
        }

        create() {
            return this.$http.post('translations', this.translation).then(response => {
                this.$events.$emit('notify', {
                    type: 'success',
                    title: 'Success !',
                    message: this.$t('notifications.data.created_successfully')
                });
                this.$router.push({name: 'system.translations.index'});
            });
        }

    }
</script>
