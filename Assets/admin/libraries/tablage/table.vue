<template>
    <div>
        <v-card>
            <v-card-title>
                {{ $t('system.sites.index_title') }}
                <v-spacer></v-spacer>
                <v-text-field
                        append-icon="search"
                        label="Search"
                        single-line
                        hide-details
                        v-model="search"
                ></v-text-field>
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
                    <table-items :route="route" :props="props" :headers="headers"></table-items>
                </template>
            </v-data-table>
        </v-card>
        <table-actions></table-actions>
    </div>
</template>

<script>

    import Component from "vue-class-component";
    import DataTable from './index'
    import TableItems from './table-items';
    import TableActions from './table-actions';

    @Component({
        // props: ['headers', 'route'],
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
        },
        components: {
            TableItems,
            TableActions
        }
    })
    export default class Table extends DataTable {

        mounted() {
            this.initTablage(this.apiRoute)
        }

        /*
         * Pluck Delete Selected Row.
         */
        pluckDelete() {
            this.selected.map(item => this.deleteData(item.id));
            this.selected = [];
        }

    }
</script>
