<template>
    <div>{{ getValue(item, header) }}</div>
</template>

<script>

    import Component from "vue-class-component";
    import Vue from "vue";

    @Component({
        props: ['header', 'item']
    })
    export default class TableItem extends Vue {
        getValue(data, header) {
            if (header.callback) {
                return header.callback(data)
            }
            if (String(header.value).includes('.')) {
                let $val = header.value.split('.');
                if (data[$val[0]]) {
                    if ($val[2]) {
                        return data[$val[0]][$val[1]][$val[2]]
                    }
                    return data[$val[0]][$val[1]]
                }
            }
            return data[header.value]
        }
    }
</script>
