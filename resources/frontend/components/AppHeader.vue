<template>
    <v-row class="pa-5">
        <v-spacer/>

        <v-col cols="auto">
            <v-btn :to="{name: 'home'}" text exact>
                На Главную
            </v-btn>
            <v-btn :to="{name: 'article-catalog'}" text exact>
                Каталог статей
            </v-btn>
        </v-col>
    </v-row>
</template>

<script>
    export default {
    }
</script>
