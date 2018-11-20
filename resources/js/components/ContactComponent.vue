<template>
    <b-row class="p-2 border-bottom" :class="selected ? 'c-active' : 'c-inactive'">
        <b-col cols="12" md="3" class="text-center">
            <b-img :src="conversation.contact_image" rounded="circle" fluid width="48" height="48" :alt="conversation.contact_name" :title="conversation.contact_name" class="m-1" />
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
            'conversation': Object,
            'selected': Boolean
        },
        computed: {
            lastTime() {
                return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss")
                    .locale('es').fromNow()
            }
        }
    }
</script>

<style>
    .c-active {
        border-right: 2px solid #007bff;
    }

    .c-inactive {
        border-right: 2px solid #ffffff;
    }
</style>
