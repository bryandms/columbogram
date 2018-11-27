<template>
    <b-form-input class="form-control-sm mb-2" type="text"
        :placeholder="search"
        v-model="querySearch" />
</template>

<script>
    export default {
        props: [
            'search'
        ],
        computed: {
            querySearch: {
                get() {
                    return this.$store.state.querySearch
                },
                set(value) {
                    this.$store.commit('newQuerySearch', value)
                }
            }
        }
    }
</script>
