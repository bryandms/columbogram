import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        messages: [],
        selectedConversation: null,
        conversations: [],
        toggle: true,
        querySearch: '',
        user: null
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        },
        newMessagesList(state, messages) {
            state.messages = messages
        },
        addMessage(state, message) {
            const conversation = state.conversations.find(conversation => {
                return conversation.contact_id == message.from_id ||
                    conversation.contact_id == message.to_id
            })

            const author = state.userId === message.from_id ? '' : `${conversation.contact_name}: `

            conversation.last_message = `${author}${message.content}`
            conversation.last_time = message.created_at

            if (state.selectedConversation.contact_id == message.from_id
                || state.selectedConversation.contact_id == message.to_id)
                state.messages.push(message)
        },
        selectConversation(state, conversation) {
            state.selectedConversation = conversation
        },
        changeToggle(state) {
            state.toggle = !state.toggle
        },
        newQuerySearch(state, newValue) {
            state.querySearch = newValue
        },
        newConversationsList(state, conversations) {
            state.conversations = conversations
        }
    },
    actions: {
        getMessages(context, conversation) {
            axios.get(`/api/messages?contact_id=${conversation.contact_id}`)
                .then(res => {
                    context.commit('newMessagesList', res.data)
                    context.commit('selectConversation', conversation)
                    context.commit('changeToggle')
                })
        },
        getConversations(context) {
            axios.get('/api/conversations')
                .then(res => context.commit('newConversationsList', res.data))
        },
        postMessage(context, newMessage) {
            const params = {
                to_id: context.state.selectedConversation.contact_id,
                content: newMessage
            }
            axios.post('/api/messages', params)
                .then(res => {
                    if (res.data.success) {
                        newMessage = ''
                        const message = res.data.message
                        message.written_by_me = true
                        context.commit('addMessage', message)
                    }
                })
        }
    },
    getters: {
        conversationsFiltered(state) {
            return state.conversations.filter(
                conversation => conversation.contact_name
                    .toLowerCase()
                    .includes(state.querySearch.toLowerCase())
            )
        }
    }
});