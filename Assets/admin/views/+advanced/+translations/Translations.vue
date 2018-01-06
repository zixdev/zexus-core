<template>
    <div>
        <data-table
                :headers="headers"
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
        headers = [
            {
                text: 'group',
                value: 'group',
                align: 'left',
                searchable: true,
                sortable: true,
            },
            {
                text: 'key',
                value: 'key',

                searchable: true,
                sortable: true,
            },
            {
                text: 'text',
                value: 'text',
                callback: (data) => {
                    let {default_lang, fallback_lang} = this.$store.state.lang;
                    return (data.text && data.text[default_lang]) ? data.text[default_lang] : data.text[fallback_lang];
                },
                searchable: false,
                sortable: false,
            },
            {
                text: 'supported_languages',
                callback: (data) => {
                    return Object.keys(data.text).map(lang => {
                        return lang.toUpperCase();
                    }).join(', ');
                },
                searchable: false,
                sortable: false,
            },

            {
                text: 'Actions',
                value: 'actions',
                align: 'right',
                searchable: false,
                sortable: false,
            }
        ];

    }
</script>
