<template>
    <v-container fluid class="px-10">
        <v-row>
            <p class="text-h4">Последние статьи</p>
        </v-row>
        <v-row v-if="!isLoading">

            <v-col v-for="(article, index) in articles"
                   :key="index"
                   cols="4">

                <article-card :article="article"/>

            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import axios from 'axios'
    import ArticleCard from '@/components/ArticleCard'

    export default {
        components: {
            ArticleCard,
        },
        data: () => ({
            isLoading: true,
            articles: [],
        }),
        methods: {
            async loadLatestArticles() {
                this.isLoading = true
                const {data} = await axios.get('/articles/latest')
                this.articles = data
                this.isLoading = false
            },
        },
        mounted() {
            this.loadLatestArticles()
        },
    }
</script>
