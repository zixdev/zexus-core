<template>
    <div>
        <data-table
                :headers="headers"
                :actions="actions"
                api-route="roles"
                route="accounts.roles"
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
    export default class Roles extends Vue {

        created() {
            this.actions = [
                {
                    text: 'accounts.roles.edit',
                    color: 'primary',
                    fab: true,
                    icon: 'edit',
                    callback: (item) => this.$router.push({name: 'accounts.roles.edit', params: {id: item.id}})
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
                    text: this.$t('table.guard_name'),
                    value: 'guard_name',
                    editable: true,
                    searchable: true,
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
                'accounts.roles.index'
            ]);
        }
    }
</script>
