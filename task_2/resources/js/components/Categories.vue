<template>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <PageHeader :title="categoryStore.category.name" />
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <ArticleCard page="category" :posts="categoryStore.category.posts" />
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { useRoute } from 'vue-router';
    import { reactive } from 'vue';

    // components
    import ArticleCard from './ArticleCard.vue';
    import PageHeader from './PageHeader.vue';

    const route = useRoute();
    const id = route.params.id;

    const categoryStore = reactive({
        category: {},
    });

    const fetchPosts = async () => {
        const categoryResponse = await axios.get(`/api/categories/${id}`);
        categoryStore.category = categoryResponse.data[0];
    };

    fetchPosts();
</script>
