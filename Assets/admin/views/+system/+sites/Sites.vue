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
    import DataTable from '@zix-core/admin/libraries/tablage/table';
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
                    text: 'system.sites.edit',
                    color: 'primary',
                    fab: true,
                    icon: 'edit',
                    callback: (item) => this.$router.push({name: 'system.sites.edit', params: {id: item.id}})
                },
                {
                    text: 'system.sites.config.index',
                    color: 'default',
                    fab: true,
                    icon: 'settings',
                    callback: (item) => this.$router.push({name: 'system.sites.config.index', params: {id: item.id}})
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
                    text: this.$t('table.name'),
                    value: 'name',
                    align: 'left',
                    editable: true,
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.url'),
                    value: 'url',
                    editable: true,
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.ui'),
                    value: 'ui',
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.status'),
                    value: 'status',
                    sortable: true,
                },
                {
                    text: this.$t('table.actions'),
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
