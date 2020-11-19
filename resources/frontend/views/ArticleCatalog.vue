<template>
    <v-container fluid class="px-10">
        <v-row>
            <p class="text-h4">Каталог статей</p>
        </v-row>

        <v-row v-if="!isLoading">
            <v-col v-for="(article, index) in articles"
                   :key="index"
                   cols="4">

                <article-card :article="article"/>

            </v-col>
        </v-row>

        <v-row>
            <v-pagination v-model="currentPage"
                          class="mx-auto"
                          :length="totalPagesCount"/>
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
            isLoading: false,
            articles: [],
            currentPage: null,
            totalPagesCount: null,
        }),
        watch: {
            currentPage() {
                this.loadArticles(this.currentPage)
            },
        },
        methods: {
            async loadArticles(page = 1) {
                this.isLoading = true
                const {data: {total, per_page, current_page, data}} = await axios.get(`/articles?page=${page}`)
                this.totalPagesCount = total / per_page
                this.currentPage = current_page
                this.articles = data
                this.isLoading = false
            },
        },
        mounted() {
            this.loadArticles()
        },
    }
</script>
