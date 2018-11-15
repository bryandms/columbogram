<template>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-3">
        <b-img rounded="circle" slot="aside" blank blank-color="#ccc" fluid width="48" alt="placeholder" />
        <b-card>
            <slot></slot>
        </b-card>
    </b-media>
</template>

<script>
    export default {
        props: {
            writtenByMe: Boolean
        },
        data() {
            return {
                content: 'abc'
            }
        }
    }
</script>