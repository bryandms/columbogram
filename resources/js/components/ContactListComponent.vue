<template>
    <div>
        <b-form-input type="text" :placeholder="search">
        </b-form-input>
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
            'search'
        ],
        data() {
            return {
                conversations: []
            }
        },
        mounted() {
            this.getConversations()
        },
        methods: {
            getConversations() {
                axios.get('/api/conversations')
                    .then((res) => {
                        this.conversations = res.data
                    })
            },
            selectConversation(conversation) {
                this.$emit('conversationSelected', conversation)
            }
        }
    }
</script>
