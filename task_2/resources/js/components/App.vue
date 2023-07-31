<template>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The blog</h2>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article v-for="post in posts" :key="post.id" class="flex max-w-xl flex-col items-start hover:shadow-md p-4 rounded">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time :datetime="post.created_at" class="text-gray-500">{{ new Date(post.created_at).toLocaleDateString("en-US") }}</time>
                        <!--
                            <a :href="post.category.href" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ post.category.title }}</a>
                        -->
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a :href="`posts/${post.slug}`">
                                {{ post.title }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ post.excerpt }}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "App",
        data() {
            return {
                posts: []
            }
        },
        methods: {
            async fetchPosts() {
                const postResponse = await axios.get('/api/posts');
                this.posts = postResponse.data;
            },
        },
        async mounted() {
            await this.fetchPosts();
        },
    }
</script>
