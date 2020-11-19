<template>
    <v-container v-if="!isLoading">
        <v-row>
            <v-img :lazy-src="article.image" :src="article.image" max-height="200" class="pa-5">
                <p class="text-h3 white--text mt-auto">{{ article.title }}</p>
            </v-img>
        </v-row>

        <v-row class="my-6">
            <v-col>
                <v-btn text>
                    <v-icon large>mdi-eye</v-icon>

                    {{ article.views }}
                </v-btn>

                <v-btn :loading="isLikeClicked"
                       depressed
                       text
                       @click="storeLike">
                    <v-icon large>mdi-heart-outline</v-icon>

                    {{ article.likes }}
                </v-btn>
            </v-col>

            <v-col class="d-flex justify-end">
                <v-chip v-for="(tag, index) in article.tags"
                        :key="index"
                        class="mx-1">
                    {{ tag.name }}
                </v-chip>
            </v-col>
        </v-row>

        <v-row class="mt-3">
            <p class="text-h5 font-weight-light">{{ article.description }}</p>
        </v-row>

        <v-divider class="mt-10"/>

        <article-comment-form :article-id="article.id"/>

        <article-comment-card v-for="(comment, index) in article.comments"
                              :comment="comment"
                              :key="index"/>

    </v-container>
</template>

<script>
    import axios from 'axios'
    import ArticleCommentCard from '@/components/ArticleCommentCard'
    import ArticleCommentForm from '@/components/ArticleCommentForm'
    import {MS_TO_COUNT_VIEW} from '@/consts'

    export default {
        components: {
            ArticleCommentCard,
            ArticleCommentForm,
        },
        data: () => ({
            isLoading: true,
            isLikeClicked: false,
            article: null,
            viewTimeout: null,
        }),
        methods: {
            handleArticleView() {
                this.viewTimeout = setTimeout(this.storeView, MS_TO_COUNT_VIEW)
            },
            async storeView() {
                const {data} = await axios.post(`/articles/${this.article.id}/view`)
                this.article.views = data
            },
            async storeLike() {
                this.isLikeClicked = true
                const {data} = await axios.post(`/articles/${this.article.id}/like`)
                this.article.likes = data
                this.isLikeClicked = false
            },
            async loadArticle(id) {
                this.isLoading = true
                const {data} = await axios.get(`/articles/${id}`)
                this.article = data
                this.isLoading = false
            },
        },
        mounted() {
            const id = this.$route.params.id
            this.loadArticle(id)
            this.handleArticleView()
        },
        destroyed() {
            clearTimeout(this.viewTimeout)
        },
    }
</script>
