<template>
    <b-card :class="[writtenByMe ? 'border-primary text-primary ml-5 mb-3' : 'mr-5 mb-3']">
        <slot></slot>
    </b-card>
</template>

<script>
    export default {
        props: {
            writtenByMe: Boolean
        }
    }
</script>