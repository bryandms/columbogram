<template>
    <div>
        <contact-component v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation"
            :notifications="3"
            :selected="selectedConversationId === conversation.id"
            @click.native="selectConversation(conversation)">
        </contact-component>
    </div>
</template>

<script>
    export default {
        props: [
            'conversations'
        ],
        data() {
            return {
                selectedConversationId: null
            }
        },
        methods: {
            selectConversation(conversation) {
                this.selectedConversationId = conversation.id
                this.$emit('conversationSelected', conversation)
            }
        }
    }
</script>
