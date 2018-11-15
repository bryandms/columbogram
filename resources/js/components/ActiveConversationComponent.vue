<template>
    <b-row>
        <b-col class="px-0" cols="12">
            <b-card class="h-100 border-top-0 rounded-0 border-left-0">

                <div slot="header">
                    <b-form inline class="justify-content-between">
                        <label>{{ contactName }}</label>
                        <b-form-checkbox>
                            {{ disableNotifications }}
                        </b-form-checkbox>
                    </b-form>
                </div>

                <message-conversation-component
                    v-for="message in messages"
                    :key="message.id"
                    :written-by-me="message.written_by_me">
                    {{ message.content }}
                </message-conversation-component>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage"
                        autocomplete="off">
                        <b-input-group>
                            <b-form-input type="text"
                                v-model="newMessage"
                                :placeholder="writeMessage">
                            </b-form-input>

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
            'disableNotifications',
            'contactId',
            'contactName'
        ],
        data() {
            return {
                messages: [],
                newMessage: ''
            }
        },
        mounted() {
            this.getMessages()
        },
        methods: {
            getMessages() {
                axios.get(`/api/messages?contact_id=${this.contactId}`)
                    .then((res) => {
                        this.messages = res.data
                    })
            },
            postMessage() {
                const params = {
                    to_id: this.contactId,
                    content: this.newMessage
                }
                axios.post('/api/messages', params)
                    .then((res) => {
                        if (res.data.success) {
                            this.newMessage = ''
                            this.getMessages()
                        }
                    })
            },
        },
        watch: {
            contactId(value) {
                this.getMessages()
            }
        }
    }
</script>
