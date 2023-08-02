<template>
    <template v-if="page !== 'post'">
        <div class="mx-auto lg:mx-0 flex flex-row justify-between">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ title }}</h2>
            <PageHeaderButton text="Create New Post" to="/posts/create" />
        </div>
    </template>
    <template v-else>
        <div class="max-w-4xl w-full px-6 lg:px-8 border-b pb-12">
            <div class="mx-auto flex flex-col gap-4 max-w-2xl lg:mx-0">
                <router-link class="mb-4" :to="`/`">
                     Back
                </router-link>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ postStore.post.title }}</h2>
                <time :datetime="postStore.post.created_at" class="text-gray-500">{{ new Date(postStore.post.created_at).toLocaleDateString("en-US") }}</time>
            </div>
        </div>
    </template>
</template>

<script setup>
    import { inject } from 'vue';
    import PageHeaderButton from './PageHeaderButton.vue';

    const postStore = inject('postStore');

    defineProps(['title', 'page']);
</script>
