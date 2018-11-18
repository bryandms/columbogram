<template>
    <b-container fluid class="h-100">
        <b-row class="h-100">
            <b-col cols="4" class="pt-3 border-right">
                <contact-list-component :search="search"
                    @conversationSelected="changeActiveConversation($event)"
                    :conversations="conversations">
                </contact-list-component>
            </b-col>

            <b-col cols="8">
                <active-conversation-component class="h-100"
                    :send="send"
                    :write-message="writeMessage"
                    :send-btn="sendBtn"
                    :disable-notifications="disableNotifications"
                    v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact_name"
                    :messages="messages"
                    @messageCreated="addMessage($event)">
                </active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {
                selectedConversation: null,
                messages: [],
                conversations: []
            }
        },
        props: [
            'search',
            'send',
            'writeMessage',
            'sendBtn',
            'disableNotifications',
            'userId'
        ],
        mounted() {
            this.getConversations()

            Echo.private(`users.${this.userId}`)
                .listen('MessageSent', (data) => {
                    const message = data.message
                    message.written_by_me = false
                    this.addMessage(message)
                })
        },
        methods: {
            changeActiveConversation(conversation) {
                this.selectedConversation = conversation
                this.getMessages()
            },
            getMessages() {
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
                    .then((res) => {
                        this.messages = res.data
                    })
            },
            addMessage(message) {
                const conversation = this.conversations.find(conversation => {
                    return conversation.contact_id == message.from_id ||
                        conversation.contact_id == message.to_id
                })

                const author = this.userId === message.from_id ? '' : `${conversation.contact_name}: `

                conversation.last_message = `${author}${message.content}`
                conversation.last_time = message.created_at

                if (this.selectedConversation.contact_id == message.from_id
                    || this.selectedConversation.contact_id == message.to_id)
                    this.messages.push(message)
            },
            getConversations() {
                axios.get('/api/conversations')
                    .then((res) => {
                        this.conversations = res.data
                    })
            },
        }
    }
</script>