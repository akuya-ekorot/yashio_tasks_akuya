<template>
    <div class="bg-white py-24 sm:py-32">
       <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 flex flex-row justify-between">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The blog</h2>
                <router-link slot="{ navigate }" to="/posts/create">
                    <button
                        class="bg-gray-800 h-full text-gray-50 rounded px-6 text-sm font-semibold"
                        @click="navigate"
                        role="link"
                    >
                        Create New Blog
                    </button>
                </router-link>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <ArticleCard />
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { reactive, provide } from 'vue';

    // components
    import ArticleCard from './ArticleCard.vue';

    const postsStore = reactive({
        posts: [],
    });

    provide('postsStore', postsStore);

    const fetchPosts = async () => {
        const postsResponse = await axios.get('/api/posts');
        postsStore.posts = postsResponse.data;
    }

    fetchPosts();
</script>
