<template>
    <div>
        <v-btn
                class="tablage--btn"
                v-if="!$parent.selected.length"
                absolute
                dark
                fab
                bottom
                right
                color="primary"
                :to="{name: $parent.route+'.create'}"
                :title="{html: $t($parent.route+'.create')}"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-speed-dial
                class="tablage--speed-dial"
                v-if="$parent.selected.length"
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
                    @click="$parent.pluckDelete()"
            >
                <v-icon>delete</v-icon>
            </v-btn>
        </v-speed-dial>
    </div>
</template>

<script>

    import Component from "vue-class-component";
    import Vue from "vue";

    @Component({
        props: []
    })
    export default class TableActions extends Vue {
        fab = false;

    }
</script>
