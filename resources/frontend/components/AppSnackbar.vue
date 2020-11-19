<template>
    <v-snackbar v-model="isVisible"
                :color="color"
                :timeout="timeout"
                top>

        <div class="d-flex justify-space-between align-center">
            <span>
                {{ message }}
            </span>

            <v-btn icon
                   text
                   @click="isVisible = false">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </div>

    </v-snackbar>
</template>

<script>
    import EventBus from '@/eventBus'

    export default {
        data: () => ({
            isVisible: false,
            message: '',
            timeout: null,
            color: null,
        }),
        mounted() {
            EventBus.$on('show-snackbar', ({message, timeout, color}) => {
                this.isVisible = true
                this.message = message
                this.timeout = timeout
                this.color = color
            })
        },
    }
</script>
