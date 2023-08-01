<template>
    <article v-for="post in posts" :key="post.id" class="flex max-w-xl flex-col items-start hover:shadow-md p-4 rounded">
        <div class="flex flex-col items-center gap-y-4 text-xs">
            <time :datetime="post.created_at" class="text-gray-500">{{ new Date(post.created_at).toLocaleDateString("en-US") }}</time>
            <router-link :to="`/categories/${post.category_id}`" :v-if="showCategory" class="bg-gray-100 hover:bg-gray-800 hover:text-gray-50 text-gray-800 px-4 rounded-full py-1">
                {{ post.category?.name }}
            </router-link>
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
    const props = defineProps({
        posts: Array,
        showCategory: Boolean,
    });
</script>
