<template>
  <form @submit.prevent="submitForm" class="w-full flex flex-col items-center py-6">
    <div class="space-y-12 w-full max-w-3xl">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <CustomInputGroup
              type="input"
              :formStore="formStore"
              placeholder="Title of your Post"
              name="title"
          />
          <CustomInputGroup
              type="input"
              :formStore="formStore"
              placeholder="title-of-your-post"
              name="slug"
          />
          <CustomInputGroup
              type="select"
              :formStore="formStore"
              name="category"
          />
          <CustomInputGroup
              type="textarea"
              :formStore="formStore"
              placeholder="Write an excerpt that captures the essence of your post."
              name="excerpt"
          />
          <CustomInputGroup
              type="textarea"
              :formStore="formStore"
              placeholder="Write your full post here."
              name="body"
          />
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button @click="$router.push('/')" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800">Save</button>
    </div>
  </form>
</template>

<script>
    import axios from 'axios';
    import { reactive } from 'vue';
    import { useRouter } from 'vue-router';

    import CustomInputGroup from './CustomInputGroup.vue';

    export default {
        components: {
            CustomInputGroup
        },
        setup() {
            const router = useRouter();

            const formStore = reactive({
                post: {},
                categories: []
            });

            const fetchCategories = async () => {
                const categoriesResponse = await axios.get(`/api/categories`);
                formStore.categories = categoriesResponse.data;
            }

            fetchCategories();

            const cleanForm = (post) => {
                return {
                    ...post,
                    category_id: formStore.categories.filter((item) => (item.name === post.category))[0].id,
                }
            }

            const submitForm = async () => {
                try {
                    const cleanedForm = cleanForm(formStore.post);

                    formStore.post = await axios.post('/api/posts', cleanedForm);

                    router.push('/');
                } catch (error) {
                    console.error(error);
                }
            }

            return {
                formStore,
                submitForm,
            }
        }
    }
</script>
