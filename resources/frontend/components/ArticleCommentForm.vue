<template>
    <v-row class="mt-4 mb-5">
        <v-card class="w-100 px-5">
            <v-card-title class="px-0">
                Оставить комментарий
            </v-card-title>

            <v-card-text class="pa-0">
                <v-text-field v-model="form.theme"
                              class="mb-4"
                              label="Тема сообщения"
                              hide-details
                              outlined
                              dense/>

                <v-textarea v-model="form.body"
                            label="Сообщение"
                            hide-details
                            outlined
                            dense/>
            </v-card-text>

            <v-card-actions>
                <v-spacer/>

                <v-btn class="primary"
                       @click="send">
                    Отправить
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-row>
</template>

<script>
    import axios from 'axios'
    import EventBus from '@/eventBus'
    import {getValidationErrors} from '@/util'

    export default {
        props: {
            articleId: Number,
        },
        data: () => ({
            form: {
                theme: null,
                body: null,
            },
        }),
        methods: {
            async send() {
                try {
                    await axios.post(`/articles/${this.articleId}/comment`, this.form)

                    EventBus.$emit('show-snackbar', {
                        message: 'Ваше комментарий успешно сохранен!',
                        timeout: 2000,
                        color: 'green',
                    })

                    this.form = {}
                } catch (e) {
                    const errors = getValidationErrors(e)
                    const errorsMessage = Object.keys(errors).map((error) => errors[error][0])[0]

                    EventBus.$emit('show-snackbar', {
                        message: errorsMessage,
                        timeout: 2000,
                        color: 'red',
                    })
                }
            },
        },
    }
</script>

<style>
    .w-100 {
        width: 100%;
    }
</style>
