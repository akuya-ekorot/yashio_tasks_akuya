<template>
    <div class="bg-white py-12 sm:py-16 flex flex-col items-center gap-12">
        <div class="max-w-4xl w-full px-6 lg:px-8 border-b pb-12">
            <div class="mx-auto flex flex-col gap-4 max-w-2xl lg:mx-0">
                <router-link class="mb-4" :to="`/`">
                     Back
                </router-link>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ postStore.post.title }}</h2>
                <time :datetime="postStore.post.created_at" class="text-gray-500">{{ new Date(postStore.post.created_at).toLocaleDateString("en-US") }}</time>
            </div>
        </div>
        <div class="max-w-4xl w-full px-6 lg:px-8 pb-12">
            <p>{{postStore.post.body}}</p>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { reactive } from 'vue';
    import { useRoute } from 'vue-router';

    const route = useRoute();
    const id = route.params.id;

    const postStore = reactive({
        post: {}
    });

    const fetchPost = async () => {
      const postResponse = await axios.get(`/api/posts/${id}`);
      postStore.post = postResponse.data;
    };

    fetchPost();
</script>
