<template>
    <b-container fluid class="h-100">
        <b-row class="h-100">
            <b-col cols="4" class="pt-3 border-right">
                <b-form-input class="form-control-sm"
                    type="text"
                    v-model="querySearch"
                    :placeholder="search">
                </b-form-input>
                <contact-list-component :search="search"
                    @conversationSelected="changeActiveConversation($event)"
                    :conversations="conversationsFiltered">
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
                conversations: [],
                querySearch: ''
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
            
            Echo.join(`columbogram`)
                .here(users =>
                    users.forEach(user => this.changeStatus(user, true))
                )
                .joining(
                    user => this.changeStatus(user, true)
                )
                .leaving(
                    user => this.changeStatus(user, false)
                )
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
            changeStatus(user, status) {
                const index = this.conversations.findIndex(conversation => {
                    return conversation.contact_id == user.id
                })
                if (index >= 0)
                    this.$set(this.conversations[index], 'online', status)
            }
        },
        computed: {
            conversationsFiltered() {
                return this.conversations.filter(
                    conversation => conversation.contact_name
                    .toLowerCase()
                    .includes(this.querySearch.toLowerCase())
                )
            }
        }
    }
</script>