<template>
    <div class="mx-auto lg:mx-0 flex flex-row justify-between">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ title }}</h2>
        <PageHeaderButton text="Create New Post" to="/posts/create" />
    </div>
</template>

<script setup>
    import PageHeaderButton from './PageHeaderButton.vue';

    defineProps(['title']);
</script>
