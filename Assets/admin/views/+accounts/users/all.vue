<template>
    <div>
        <data-table
                :headers="headers"
                :actions="actions"
                api-route="users"
                route="accounts.users"
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
    export default class Users extends Vue {

        created() {
            this.actions = [
                {
                    text: 'accounts.users.edit',
                    color: 'primary',
                    fab: true,
                    icon: 'edit',
                    callback: (item) => this.$router.push({name: 'accounts.users.edit', params: {id: item.id}})
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
                    text: this.$t('table.username'),
                    value: 'username',
                    align: 'left',
                    editable: true,
                    searchable: true,
                    sortable: true,
                },
                {
                    text: this.$t('table.email'),
                    value: 'email',
                    editable: true,
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
                'accounts.users.index'
            ]);
        }
    }
</script>
