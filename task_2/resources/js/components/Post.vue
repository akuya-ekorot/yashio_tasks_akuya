<template>
    <div class="bg-white py-12 sm:py-16 flex flex-col items-center gap-12">
        <PageHeader page="post" />
        <div class="max-w-4xl w-full px-6 lg:px-8 pb-12">
            <p>{{postStore.post.body}}</p>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios';
    import { reactive, provide } from 'vue';
    import { useRoute } from 'vue-router';

    // components
    import PageHeader from './PageHeader.vue';

    const route = useRoute();
    const id = route.params.id;

    const postStore = reactive({
        post: {}
    });

    provide('postStore', postStore);

    const fetchPost = async () => {
      const postResponse = await axios.get(`/api/posts/${id}`);
      postStore.post = postResponse.data;
    };

    fetchPost();
</script>
