<template>
    <template v-if="type === 'input'">
        <div v-if="type === 'input'" class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <Input
                        v-model="formStore.post[`${name}`]"
                        :name="name"
                        :placeholder="placeholder"
                    />
                </div>
            </div>
        </div>
    </template>
    <template v-else-if="type === 'textarea'">
        <div class="col-span-full">
            <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">{{ name.substring(1).toUpperCase() + name.substring(1) }}</label>
            <div class="mt-2">
                <TextArea
                    v-model="formStore.post[`${name}`]"
                    name="excerpt"
                    rows="3"
                />
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">{{ placeholder }}</p>
        </div>
    </template>
    <template v-else-if="type === 'select'">
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
    </template>
</template>

<script setup>
    import Input from './Input.vue';
    import TextArea from './TextArea.vue';
    defineProps(['type', 'formStore', 'name', 'title', 'placeholder']);
</script>
