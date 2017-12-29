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
                    <!--<table-items :props="props" :headers="_headers"></table-items>-->
                </template>
            </v-data-table>
        </v-card>
        <v-btn
                absolute
                dark
                fab
                bottom
                right
                color="primary"
                :to="{name: 'system.sites.create'}" :title="{html: $t('system.sites.create')}"
        >
            <v-icon>add</v-icon>
        </v-btn>
    </div>
</template>

<script>

    import Component from "vue-class-component";
    import DataTable from './index'
    import TableItems from './table-items';

    @Component({
        props: ['headers', 'route'],
        components: {
            TableItems
        }
    })
    export default class Table extends DataTable {
        mounted() {
            // this.initTablage(this.route)
        }

    }
</script>
