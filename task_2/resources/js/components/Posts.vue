<template>
    <div class="bg-white py-24 sm:py-32">
       <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <PageHeader title="The Blog" />
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <ArticleCard page="home" :posts="postsStore.posts" />
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { reactive, provide } from 'vue';

    // components
    import ArticleCard from './ArticleCard.vue';
    import PageHeader from './PageHeader.vue';

    const postsStore = reactive({
        posts: [],
    });

    const fetchPosts = async () => {
        const postsResponse = await axios.get('/api/posts');
        postsStore.posts = postsResponse.data;
    }

    fetchPosts();
</script>
