<template>
    <div>
        <contact-component v-for="conversation in conversationsFiltered"
            :key="conversation.id"
            :conversation="conversation"
            :notifications="3"
            :selected="isSelected(conversation)"
            @click.native="selectConversation(conversation)">
        </contact-component>
    </div>
</template>

<script>
    export default {
        methods: {
            selectConversation(conversation) {
                this.$store.dispatch('getMessages', conversation)
            },
            isSelected(conversation) {
                if (this.selectedConversation)
                    return this.selectedConversation.id === conversation.id

                return false
            }
        },
        computed: {
            selectedConversation() {
                return this.$store.state.selectedConversation
            },
            conversationsFiltered() {
                return this.$store.getters.conversationsFiltered
            }
        }
    }
</script>
