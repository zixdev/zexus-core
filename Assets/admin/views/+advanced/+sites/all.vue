<template>
    <div>
        <data-table
                :headers="headers"
                route="sites"
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
    export default class AllSites extends Vue {
        headers = [
            {
                text: 'name',
                value: 'name',
                align: 'left',
                searchable: true,
                sortable: true,
            },
            {
                text: 'url',
                value: 'url',

                searchable: true,
                sortable: true,
            },
            {
                text: 'ui',
                value: 'ui',
                searchable: true,
                sortable: true,
            },
            {
                text: 'status',
                value: 'status',
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
