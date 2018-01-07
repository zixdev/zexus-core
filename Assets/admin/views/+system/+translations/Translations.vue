<template>
    <div>
        <data-table
                :headers="headers"
                :actions="actions"
                api-route="translations"
                route="system.translations"
        ></data-table>
    </div>
</template>

<script type="text/babel">
    import Component from 'vue-class-component';
    import DataTable from '../../../libraries/tablage/table';
    import Vue from "vue";

    @Component({
        components: {
            DataTable
        }
    })
    export default class Translations extends Vue {


        created() {
            this.actions = [
                {
                    text: 'table.edit',
                    color: 'primary',
                    fab: true,
                    icon: 'edit',
                    callback: (item) => this.$router.push({name: 'system.translations.edit', params: {id: item.id}})
                },
                {
                    text: 'table.delete',
                    color: 'red',
                    dark: true,
                    fab: true,
                    icon: 'delete',
                    callback: (item) => this.$events.$emit('table.delete-data', item.id)
                }
            ];
            this.headers = [
                {
                    text: this.$t('table.group'),
                    value: 'group',
                    align: 'left',
                    editable: true,
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.key'),
                    value: 'key',
                    editable: true,
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.text'),
                    value: 'text',
                    callback: (data) => {
                        let {default_lang, fallback_lang} = this.$store.state.lang;
                        return (data.text && data.text[default_lang]) ? data.text[default_lang] : data.text[fallback_lang];
                    },
                    searchable: false,
                    sortable: false,
                },
                {
                    text: this.$t('table.supported_languages'),
                    callback: (data) => {
                        return Object.keys(data.text).map(lang => {
                            return lang.toUpperCase();
                        }).join(', ');
                    },
                    searchable: false,
                    sortable: false,
                },

                {
                    text: this.$t('table.ctions'),
                    value: 'actions',
                    align: 'right',
                    searchable: false,
                    sortable: false,
                }
            ];
        }

        mounted() {
            this.$store.dispatch('setBreadCrumbs', ['system.translations.index'])

        }

    }
</script>
