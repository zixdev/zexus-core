<template>
    <td v-if="eloquent_status == 'active'" class="text-xs-right">
        <v-btn small router color="primary"
               :to="{name: route+'.edit', params: {id: item.id}}">
            {{$t('table.edit')}}
        </v-btn>

        <v-btn small color="error" @click.native="$events.$emit('deleteData', item.id)">
            {{$t('table.delete')}}
        </v-btn>
    </td>
    <td v-else>
        <v-btn small dark error outline v-on:click.native="$events.$emit('forceDeleteData', item.id)">
            {{$t('table.force-delete')}}
        </v-btn>
        <v-btn small dark default outline v-on:click.native="$events.$emit('restoreData', item.id)">
            {{$t('table.restore')}}
        </v-btn>
    </td>
</template>

<script>

    import Component from "vue-class-component";
    import Vue from "vue";

    @Component({
        props: ['item', 'route']
    })
    export default class TableItemActions extends Vue {
        eloquent_status = 'active';
    }
</script>
