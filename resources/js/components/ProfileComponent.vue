<template>
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">{{ profile }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b-form action="/profile" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" v-model="csrfToken">

                        <b-form-group class="d-flex justify-content-center">
                            <b-img v-if="url" :src="url" center rounded="circle" fluid width="48" height="48" :alt="user.name" :title="user.name" class="m-1" />
                            <b-img v-else :src="image" center rounded="circle" fluid width="48" height="48" :alt="user.name" :title="user.name" class="m-1" />
                            <div class="upload-btn-wrapper d-flex justify-content-center">
                                <button class="btn btn-dark btn-sm" type="button">{{ uploadFile }}</button>
                                <input type="file" name="image" @change="onFileChange" />
                            </div>
                        </b-form-group>

                        <b-form-group :label="name">
                            <b-form-input type="text" required
                                name="name"
                                v-model="user.name"
                                :placeholder="enterName">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group :label="email">
                            <b-form-input type="email"
                                name="email"
                                v-model="user.email"
                                :placeholder="enterEmail">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group :label="password">
                            <b-form-input type="password"
                                name="password"
                                :placeholder="enterPassword">
                            </b-form-input>
                        </b-form-group>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark mx-auto">{{ send }}</button>
                        </div>
                    </b-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'user',
            'csrfToken',
            'email',
            'enterEmail',
            'name',
            'enterName',
            'send',
            'profile',
            'password',
            'enterPassword',
            'uploadFile'
        ],
        data() {
            return {
                url: null
            }
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0]
                this.url = URL.createObjectURL(file)
            }
        },
        computed: {
            image() {
                return `/users/${this.user.image}`
            }
        }
    }
</script>

<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>