<template>
    <div>
        <b-form-input type="text" :placeholder="search">
        </b-form-input>
        <contact-component :notifications="3"></contact-component>
    </div>
</template>

<script>
    export default {
        props: [
            'search'
        ],
        data() {
            return {
                name: 'Paco Piedra',
                lastMessage: 'Tú: Nos hablamos',
                lastTime: '1:37 pm'
            }
        }
    }
</script>
