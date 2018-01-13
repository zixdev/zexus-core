<template>
    <div>
        <v-data-table
                v-bind:headers="headers"
                :items="permissions"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{props.item.toUpperCase()}}</td>
                <td class="text-xs-right" v-for="action in actions">
                    <v-switch right
                              v-model="user_permissions[action + '_' + props.item]"
                              color="primary"
                              :value="action + '_' + props.item"
                              hide-details></v-switch>
                </td>

            </template>
        </v-data-table>
    </div>
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
    export default class Permissions extends Vue {
        role = {};
        user_permissions = {};


        guards = [];
        actions = [];
        permissions = [];
        // role: [];
        headers = [
            {
                text: 'Type',
                align: 'left',
                sortable: false,
                value: 'name'
            },
            {text: 'View', value: 'view', align: 'left', sortable: false},
            {text: 'Create', value: 'create', align: 'left', sortable: false},
            {text: 'Update', value: 'update', align: 'left', sortable: false},
            {text: 'Delete', value: 'delete', align: 'left', sortable: false}
        ];
        items = [
            {
                value: false,
                name: 'Frozen Yogurt',
                calories: 159,
                fat: 6.0,
                carbs: 24,
                protein: 4.0,

            }
        ]

        mounted() {
            /*
             * Set Page BreadCrumb
             */
            this.$store.dispatch('setBreadCrumbs', [
                'accounts.roles.index',
                'accounts.roles.' + (this.edit ? 'edit' : 'add'),
                'accounts.roles.permissions',
            ]);

            this.$http.get('permissions')
                .then(response => {
                    let guards = [];
                    let actions = [];
                    let permissions = [];

                    response.data.data.map(permission => {
                        guards.push(permission.guard_name);
                        actions.push(permission.name.split('_')[0]);
                        permissions.push(permission.name.split('_')[1]);
                    });


                    this.guards = guards.filter((guard_name, index, self) => {
                        return self.indexOf(guard_name) === index;
                    });

                    this.actions = actions.filter((name, index, self) => {
                        return self.indexOf(name) === index;
                    });

                    this.permissions = permissions.filter((name, index, self) => {
                        return self.indexOf(name) === index;
                    });
                })
            // this.$http.get('roles/' + this.$route.params.id).then(response => this.role = response.data.data);
        }


        get edit() {
            return !!this.$route.params.id;
        }


    }
</script>
