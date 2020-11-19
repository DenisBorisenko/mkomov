<template>
    <v-row>
        <v-card class="my-2 w-100">
            <v-list three-line>
                <v-list-item>
                    <v-list-item-avatar>
                        <v-img src="https://cdn.vuetifyjs.com/images/lists/1.jpg"/>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title v-html="comment.author_name"/>
                        <v-list-item-subtitle v-html="comment.theme" class="mb-1"/>
                        <v-list-item-subtitle v-html="comment.body"/>

                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-card>
    </v-row>
</template>

<script>
    export default {
        props: {
            comment: Object,
        },
    }
</script>
