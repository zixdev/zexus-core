<template>
    <div>
        <v-card>
            <v-card-title>
                <div v-if="!selected.length">
                    <v-btn flat color="primary" :to="{name: route+'.create'}" class="text-uppercase">
                        {{ $t('table.add') }}
                    </v-btn>
                </div>
                <div v-else>
                    <v-btn class="table__action--btn" flat color="primary">
                        {{ selected.length }} Items Selected
                    </v-btn>
                </div>
                <v-spacer></v-spacer>
                <v-text-field
                        v-if="!selected.length"
                        append-icon="search"
                        :label="$t('table.search')"
                        single-line
                        hide-details
                        v-model="search"
                ></v-text-field>
                <div v-else>
                    <v-btn
                            v-for="(action, i) in multiple_actions"
                            :key="i"
                            :title="action.title"
                            @click.native="action.callback(selected)"
                            flat
                    >
                        <v-icon>{{ action.icon }}</v-icon>
                    </v-btn>
                </div>
            </v-card-title>
            <v-data-table
                    v-model="selected"
                    v-bind:headers="headers"
                    v-bind:items="items"
                    v-bind:search="search"
                    v-bind:pagination.sync="pagination"
                    :total-items="totalItems"
                    :loading="loading"
                    select-all
                    class="elevation-1"
            >
                <template slot="items" slot-scope="props">
                    <table-items :route="route" :props="props" :headers="headers" :actions="actions"></table-items>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>

    import Component from "vue-class-component";
    import DataTable from './index'
    import TableItems from './table-items';

    @Component({
        props: {
            headers: {
                type: Array,
                required: true,
                default: []
            },
            apiRoute: {
                type: String,
                required: true
            },
            route: {
                type: String,
                required: true
            },
            actions: {
                type: Array,
                required: true,
                default: []
            }
        },
        components: {
            TableItems
        }
    })
    export default class Table extends DataTable {

        mounted() {
            this.initTablage(this.apiRoute);


            this.multiple_actions = [
                {
                    title: 'delete',
                    icon: 'delete',
                    callback: (items) => { // Pluck Delete Selected Rows.
                        items.map(item => this.deleteData(item.id));
                        this.selected = [];
                    }
                }
            ]
        }


    }
</script>