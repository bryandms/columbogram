<template>
    <div>
        <contact-component v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation"
            :notifications="3"
            @click.native="selectConversation(conversation)">
        </contact-component>
    </div>
</template>

<script>
    export default {
        props: [
            'conversations'
        ],
        methods: {
            selectConversation(conversation) {
                this.$emit('conversationSelected', conversation)
            }
        }
    }
</script>
