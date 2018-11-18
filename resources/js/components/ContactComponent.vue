<template>
    <b-row class="p-2 border-bottom">
        <b-col cols="12" md="3" class="text-center">
            <b-img rounded="circle" blank fluid width="55" height="55" blank-color="#777" alt="img" class="m-1" />
        </b-col>
        <b-col cols="6" align-self="center" class="d-none d-md-block text-truncate">
            <p class="mb-0">
                <status-component :online="conversation.online" />
                {{ conversation.contact_name }}
            </p>
            <span class="text-muted small">{{ conversation.last_message }}</span>
        </b-col>
        <b-col cols="3" align-self="center" class="d-none d-md-block">
            <div class="row justify-content-center">
                <p class="text-muted small mb-0 text-right">{{ lastTime }}</p>
            </div>
            <div class="row" style="min-height: 18px;">
                <b-badge v-show="notifications > 0" class="mx-auto" variant="dark">{{ notifications }}</b-badge>
            </div>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        props: {
            'notifications': Number,
            'conversation': Object
        },
        computed: {
            lastTime() {
                return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss")
                    .locale('es').fromNow()
            }
        }
    }
</script>
