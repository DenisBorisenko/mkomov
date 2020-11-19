<template>
    <v-card :to="{name: 'article-view', params: {id: article.id}}"
            link
            class="mx-auto"
            height="300px">

        <v-img class="white--text align-end"
               height="150px"
               :src="article.image">

            <v-card-title>
                {{ article.title }}
            </v-card-title>
        </v-img>

        <v-card-subtitle class="pb-0">
            {{ article.created_at }}
        </v-card-subtitle>

        <v-card-text class="text--primary pb-0 short-text">
            {{ article.description }}
        </v-card-text>

        <v-card-actions>
            <v-btn text disabled>
                <v-icon left>mdi-eye</v-icon>

                {{ article.views }}
            </v-btn>

            <v-spacer/>

            <v-btn text disabled>
                {{ article.likes }}

                <v-icon right>mdi-heart-outline</v-icon>
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
    export default {
        props: {
            article: Object,
        },
    }
</script>

<style>
    .short-text {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: auto;
    }
</style>
