<template>
  <form @submit.prevent="submitForm" class="w-full flex flex-col items-center py-6">
    <div class="space-y-12 w-full max-w-3xl">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input v-model="formStore.post.title" required type="text" name="title" id="title" class="pl-6 block flex-1 border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Blog title" />
              </div>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input v-model="formStore.post.slug" required type="text" name="slug" id="slug" class="pl-6 block flex-1 border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="blog-title" />
              </div>
            </div>
          </div>

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

          <div class="col-span-full">
              <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">Excerpt</label>
              <div class="mt-2">
                  <textarea v-model="formStore.post.excerpt" required id="excerpt" name="excerpt" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
              </div>
              <p class="mt-3 text-sm leading-6 text-gray-600">Write an excerpt that captures the essence of your post.</p>
          </div>

          <div class="col-span-full">
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
            <div class="mt-2">
              <textarea v-model="formStore.post.body" required id="body" name="body" rows="8" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write your blog.</p>
          </div>
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
    import { reactive } from 'vue';
    import { useRoute, useRouter } from 'vue-router';

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
