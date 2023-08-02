<template>
  <form @submit.prevent="submitForm" class="w-full flex flex-col items-center py-4">
    <FormBody />
    <FormActions />
  </form>
</template>

<script setup>
    import axios from 'axios';
    import { provide, reactive } from 'vue';
    import { useRoute, useRouter } from 'vue-router';

    // components
    import FormBody from './FormBody.vue';
    import FormActions from './FormActions.vue';

    const route = useRoute();
    const id = route.params.id;

    const router = useRouter();

    const formStore = reactive({
        post: {
            title: '',
            category: '',
            slug: '',
            excerpt: '',
            body: '',
        },
        categories: []
    });

    provide('formStore', formStore);

    const fetchData = async () => {
        const categoriesResponse = await axios.get(`/api/categories`);
        formStore.categories = categoriesResponse.data;
    }

    fetchData();

    const cleanForm = (post) => {
       return {
         ...post,
         category_id: formStore
             .categories
             .filter((category) => (category.name === post.category))[0]
             .id
       }
    }

    const submitForm = async () => {
        const cleanedForm = cleanForm(formStore.post);

        try {
          await axios.post('/api/posts', cleanedForm);
        } catch (error) {
            console.error(error);
        }
    }
</script>
