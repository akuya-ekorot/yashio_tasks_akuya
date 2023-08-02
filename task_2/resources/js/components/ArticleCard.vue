<template>
    <article v-for="post in posts" :key="post.id" class="flex max-w-xl flex-col items-start hover:shadow-md p-4 rounded">
        <div class="flex flex-col items-center gap-y-4 text-xs">
            <time :datetime="post.created_at" class="text-gray-500">{{ new Date(post.created_at).toLocaleDateString("en-US") }}</time>
            <a v-if="page === 'home'" :href="`/categories/${post.category.id}`" class="relative z-10 rounded-full bg-gray-100 px-2 py-1 font-medium text-gray-600 hover:bg-gray-300">{{ post.category.name }}</a>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <router-link :to="`/posts/${post.id}`">
                    {{ post.title }}
                </router-link>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ post.excerpt }}</p>
        </div>
    </article>
</template>

<script setup>
    defineProps(['posts', 'page']);
</script>
