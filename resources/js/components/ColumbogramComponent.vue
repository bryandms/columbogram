<template>
    <b-container fluid class="h-100">
        <b-row class="h-100">
            <!-- Search bar and contact list -->
            <b-col cols="12" md="4" class="pt-3 border-right d-none d-md-block"
                :class="toggle ? 'd-block' : ''">
                <contact-form-component :search="search" />
                <contact-list-component :search="search" />
            </b-col>

            <!-- Active conversation -->
            <b-col cols="12" md="8" class="d-none d-md-block"
                :class="!toggle ? 'd-block' : ''">
                <active-conversation-component class="h-100"
                    :send="send"
                    :write-message="writeMessage"
                    :send-btn="sendBtn"
                    :disable-notifications="disableNotifications"
                    v-if="selectedConversation" />
            </b-col>
        </b-row>

        <!-- Profile Modal -->
        <profile-component :user="user"
            :csrf-token="csrfToken"
            :email="email"
            :enter-email="enterEmail"
            :name="name"
            :enter-name="enterName"
            :password="password"
            :enter-password="enterPassword"
            :send="send"
            :profile="profile"
            :upload-file="uploadFile">
        </profile-component>
    </b-container>
</template>

<script>
    export default {
        props: [
            'search',
            'send',
            'writeMessage',
            'sendBtn',
            'disableNotifications',
            'userId',
            'user',
            'csrfToken',
            'name',
            'enterName',
            'email',
            'enterEmail',
            'password',
            'enterPassword',
            'profile',
            'uploadFile'
        ],
        mounted() {
            this.$store.commit('setUser', this.user)
            this.$store.dispatch('getConversations')

            Echo.private(`users.${this.userId}`)
                .listen('MessageSent', (data) => {
                    const message = data.message
                    message.written_by_me = false
                    this.$store.commit('addMessage', message)
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
            changeStatus(user, status) {
                const index = this.$store.state.conversations.findIndex(conversation => {
                    return conversation.contact_id == user.id
                })
                if (index >= 0)
                    this.$set(this.$store.state.conversations[index], 'online', status)
            }
        },
        computed: {
            selectedConversation() {
                return this.$store.state.selectedConversation
            },
            toggle() {
                return this.$store.state.toggle
            }
        }
    }
</script>