<template>
    <div>
        <data-table
                :headers="headers"
                :actions="actions"
                api-route="sites"
                route="system.sites"
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
    export default class Sites extends Vue {

        created() {
            this.actions = [
                {
                    text: 'table.edit',
                    color: 'primary',
                    fab: true,
                    icon: 'edit',
                    callback: (item) => this.$router.push({name: 'system.sites.edit', params: {id: item.id}})
                },
                {
                    text: 'table.delete',
                    color: 'red',
                    dark: true,
                    fab: true,
                    icon: 'delete',
                    callback: (item) => this.$events.$emit('deleteData', item.id)
                }
            ];

            this.headers = [
                {
                    text: 'table.name',
                    value: 'name',
                    align: 'left',
                    searchable: true,
                    sortable: true,
                },
                {
                    text: 'table.url',
                    value: 'url',

                    searchable: true,
                    sortable: true,
                },
                {
                    text: 'table.ui',
                    value: 'ui',
                    searchable: true,
                    sortable: true,
                },
                {
                    text: 'table.status',
                    value: 'status',
                    sortable: true,
                },
                {
                    text: 'table.actions',
                    value: 'actions',
                    align: 'right',
                }
            ];
        }


        mounted() {
            this.$store.dispatch('setBreadCrumbs', [
                'system.sites.index'
            ]);
        }
    }
</script>
