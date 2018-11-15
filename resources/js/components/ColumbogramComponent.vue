<template>
    <b-container fluid class="h-100">
        <b-row class="h-100">
            <b-col cols="4" class="pt-3 border-right">
                <contact-list-component :search="search"
                    @conversationSelected="changeActiveConversation($event)">
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
                    :contact-name="selectedConversation.contact_name">
                </active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {
                selectedConversation: null
            }
        },
        props: [
            'search',
            'send',
            'writeMessage',
            'sendBtn',
            'disableNotifications'
        ],
        methods: {
            changeActiveConversation(conversation) {
                this.selectedConversation = conversation
            }
        }
    }
</script>