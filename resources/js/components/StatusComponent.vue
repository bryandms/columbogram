<template>
    <b-img rounded="circle" blank fluid width="10" height="10" class="mx-1"
        :title="online ? 'Online' : 'Offline'"
        :blank-color="online ? 'green' : 'gray'" />
</template>

<script>
    export default {
        props: [
            'online'
        ]
    }
</script>