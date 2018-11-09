<template>
    <b-row>
        <b-col class="px-0" cols="12">
            <b-card class="h-100 border-top-0 rounded-0"
                title="Conversación activa">

                <div slot="header">
                    <b-form inline class="justify-content-between">
                        <label>Usuario seleccionado</label>
                        <b-form-checkbox>
                            {{ disableNotifications }}
                        </b-form-checkbox>
                    </b-form>
                </div>

                <b-media vertical-align="center" class="mb-3">
                    <b-img rounded="circle" slot="aside" blank blank-color="#ccc" fluid width="48" alt="placeholder" />
                    <b-card>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                        sollicitudin.
                    </b-card>
                </b-media>
                <b-media right-align vertical-align="center" class="mb-3">
                    <b-img rounded="circle" slot="aside" blank blank-color="#ccc" fluid width="48" alt="placeholder" />
                    <b-card>
                        Cras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                        congue felis in faucibus.
                    </b-card>
                </b-media>

                <div slot="footer">
                    <b-input-group>
                        <b-form-input type="text" :placeholder="writeMessage">
                        </b-form-input>
                    <b-input-group-append>
                        <b-btn variant="ligth" class="border">
                            <div>
                                <b-img center :src="sendBtn" :alt="send" />
                            </div>
                        </b-btn>
                        </b-input-group-append>
                    </b-input-group>
                </div>
            </b-card>
        </b-col>
        <!-- <b-col cols="4" class="pt-3">
            <div>
                <b-img rounded="circle" blank width="55" height="55" blank-color="#777" alt="img" class="m-1" />
            </div>
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>
                {{ disableNotifications }}
            </b-form-checkbox>
        </b-col> -->
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
            }
        }
    }
</script>
