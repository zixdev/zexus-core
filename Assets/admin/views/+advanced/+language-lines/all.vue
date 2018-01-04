<template>
    <div>
        <data-table
                :headers="headers"
                route="language-lines"
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
    export default class LanguageLines extends Vue {
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
                searchable: true,
                sortable: true,
            },

            {
                text: 'Actions',
                value: 'actions',
                align: 'right',
            }
        ];

    }
</script>
