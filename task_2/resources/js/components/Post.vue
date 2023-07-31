<template>
    <div class="bg-white py-12 sm:py-16 flex flex-col items-center gap-12">
        <div class="max-w-4xl w-full px-6 lg:px-8 border-b pb-12">
            <div class="mx-auto flex flex-col gap-4 max-w-2xl lg:mx-0">
                <router-link class="mb-4" :to="`/`">
                     Back
                </router-link>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ post.title }}</h2>
                <time :datetime="post.created_at" class="text-gray-500">{{ new Date(post.created_at).toLocaleDateString("en-US") }}</time>
            </div>
        </div>
        <div class="max-w-4xl w-full px-6 lg:px-8 pb-12">
            <p>{{post.body}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Post',
        data() {
            return {
                post: {},
            }
        },
        methods: {
            async fetchPost() {
                const postResponse = await axios.get(`/api/posts/${this.$route.params.id}`);
                console.log(postResponse);
                this.post = postResponse.data;
            }
        },
        mounted() {
            this.fetchPost();
        }
    }
</script>
