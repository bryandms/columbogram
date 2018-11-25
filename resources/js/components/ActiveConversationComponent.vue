<template>
    <b-row>
        <b-col class="px-0" cols="12">
            <b-card class="h-100 border-top-0 rounded-0 border-left-0" no-body>

                <div slot="header">
                    <b-form inline class="justify-content-between">
                        <div>
                            <label class="d-inline back d-md-none" @click="$emit('back')">←</label>
                            <b-img :src="contactImage" rounded="circle" fluid width="24" height="24" :alt="contactName" :title="contactName" class="m-1 d-inline" />
                            <label class="d-inline">{{ contactName }}</label>
                        </div>
                        <b-form-checkbox>
                            {{ disableNotifications }}
                        </b-form-checkbox>
                    </b-form>
                </div>

                <b-card-body class="card-body-scroll">
                    <message-conversation-component
                        v-for="message in messages"
                        :key="message.id"
                        :written-by-me="message.written_by_me">
                        {{ message.content }}
                    </message-conversation-component>
                </b-card-body>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage"
                        autocomplete="off">
                        <b-input-group class="input-group-sm">
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
            'contactName',
            'contactImage',
            'messages'
        ],
        data() {
            return {
                newMessage: ''
            }
        },
        methods: {
            postMessage() {
                const params = {
                    to_id: this.contactId,
                    content: this.newMessage
                }
                axios.post('/api/messages', params)
                    .then((res) => {
                        if (res.data.success) {
                            this.newMessage = ''
                            const message = res.data.message
                            message.written_by_me = true
                            this.$emit('messageCreated', message)
                        }
                    })
            },
            scrollToBottom() {
                const el = document.querySelector('.card-body-scroll')
                el.scrollTop = el.scrollHeight
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