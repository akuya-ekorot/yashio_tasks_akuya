<template>
  <form @submit.prevent="submitForm" class="w-full flex flex-col items-center py-6">
    <div class="space-y-12 w-full max-w-3xl">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <!-- Title Input -->
          <TextInput name="title" placeholder="Blog Title" label="Title" />

          <!-- Slug Input -->
          <TextInput name="slug" placeholder="blog-slug" label="Slug" />

          <div class="sm:col-span-4">
              <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
              <select class="mt-2" v-model="formStore.post.category">
                  <option
                      v-for="(category, index) in formStore.categories" :key="category.id"
                  >
                      {{category.name}}
                  </option>
              </select>
          </div>

          <!-- Excerpt Input -->
          <TextAreaInput name="excerpt" placeholer="Write your excerpt here" label="Excerpt" rows="3" />

          <!-- Body Input -->
          <TextAreaInput name="body" placeholer="Write your body here" label="Body" rows="8" />

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button @click="$router.push('/')" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800">Save</button>
    </div>
  </form>
</template>

<script setup>
    import axios from 'axios';
    import { provide, reactive } from 'vue';
    import { useRoute, useRouter } from 'vue-router';

    // components
    import TextInput from './TextInput.vue';
    import TextAreaInput from './TextAreaInput.vue';

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
          router.push('/');
        } catch (error) {
            console.error(error);
        }
    }
</script>
