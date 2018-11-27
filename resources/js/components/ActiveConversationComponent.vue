<template>
    <b-row>
        <b-col class="px-0" cols="12">
            <b-card class="h-100 border-top-0 rounded-0 border-left-0" no-body>
                <!-- Options and information bar -->
                <div slot="header">
                    <b-form inline class="justify-content-between">
                        <div>
                            <label class="d-inline back d-md-none" @click="back">←</label>
                            <b-img :src="selectedConversation.contact_image" rounded="circle" fluid width="24" height="24" :alt="selectedConversation.contact_name" :title="selectedConversation.contact_name" class="m-1 d-inline" />
                            <label class="d-inline">{{ selectedConversation.contact_name }}</label>
                        </div>
                        <b-form-checkbox>
                            {{ disableNotifications }}
                        </b-form-checkbox>
                    </b-form>
                </div>

                <!-- Messages -->
                <b-card-body class="card-body-scroll">
                    <message-conversation-component
                        v-for="message in messages"
                        :key="message.id"
                        :written-by-me="message.written_by_me">
                        {{ message.content }}
                    </message-conversation-component>
                </b-card-body>

                <!-- Writing bar -->
                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage"
                        autocomplete="off">
                        <b-input-group class="input-group-sm">
                            <b-form-input type="text"
                                v-model="newMessage"
                                :placeholder="writeMessage" />

                            <b-input-group-append>
                                <b-btn variant="ligth" class="border" type="submit">
                                    <div>
                                        <b-img center :src="sendBtn" :alt="send" />
                                    </div>
                                </b-btn>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        props: [
            'send',
            'writeMessage',
            'sendBtn',
            'disableNotifications'
        ],
        data() {
            return {
                newMessage: ''
            }
        },
        methods: {
            postMessage() {
                this.$store.dispatch('postMessage', this.newMessage)
                this.newMessage = ''
            },
            scrollToBottom() {
                const el = document.querySelector('.card-body-scroll')
                el.scrollTop = el.scrollHeight
            },
            back() {
                this.$store.commit('changeToggle')
            }
        },
        computed: {
            messages() {
                return this.$store.state.messages
            },
            selectedConversation() {
                return this.$store.state.selectedConversation
            }
        },
        updated() {
            this.scrollToBottom()
        }
    }
</script>

<style>
    .card-body-scroll {
        overflow-y: auto;
        max-height: calc(100vh - 165.5px);
    }
    .card-header {
        background-color: #fff !important;
    }
    .back {
        font-weight: bold;
        font-size: 1.5em;
    }
</style>