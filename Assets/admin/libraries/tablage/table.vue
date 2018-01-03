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
                    <table-items :props="props" :headers="headers"></table-items>
                </template>
            </v-data-table>
        </v-card>

        <v-btn
                class="tablage--btn"
                v-if="!selected.length"
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
        <v-speed-dial
                class="tablage--speed-dial"
                v-if="selected.length"
                v-model="fab"
                absolute
                dark
                fab
                bottom
                right
                color="primary"
        >
            <v-btn
                    slot="activator"
                    color="blue darken-2"
                    dark
                    fab
                    hover
                    v-model="fab"
            >
                <v-icon>settings</v-icon>
                <v-icon>close</v-icon>
            </v-btn>

            <v-btn
                    fab
                    dark
                    small
                    color="red"
                    @click="pluckDelete()"
            >
                <v-icon>delete</v-icon>
            </v-btn>
        </v-speed-dial>
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
        fab = false;

        mounted() {
            this.initTablage(this.route)
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
