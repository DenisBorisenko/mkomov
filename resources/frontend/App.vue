<template>
    <v-app>
        <v-main>
            <app-snackbar/>
            <app-header/>

            <router-view/>
        </v-main>
    </v-app>
</template>

<script>
    import AppSnackbar from '@/components/AppSnackbar'
    import AppHeader from '@/components/AppHeader'

    export default {
        components: {
            AppSnackbar,
            AppHeader,
        },
    }
</script>
