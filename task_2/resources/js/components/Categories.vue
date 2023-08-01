<template>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex flex-row justify-between">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ store.category }}</h2>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <ArticleCard :showCategory="false" :posts="store.posts"></ArticleCard>
            </div>
        </div>
    </div>
</template>

<script>
    import ArticleCard from './ArticleCard.vue';
    import axios from 'axios';
    import { reactive } from 'vue';
    import { useRoute } from 'vue-router';

    export default {
        components: {
            ArticleCard
        },
        setup() {
            // useRoute to get route
            const route = useRoute();
            const id = route.params.id;

            // store for component
            const store = reactive({
                category: '',
                posts: [],
            });

            async function fetchPosts() {
                const categoryResponse = await axios.get(`/api/categories/${id}`);

                store.category = categoryResponse.data[0].name;
                store.posts = categoryResponse.data[0].posts;
            };

            fetchPosts();

            return {
                store,
            }
        }
    }
</script>
