<template>
    <div class="sm:col-span-4">
        <label :for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ label }}</label>
        <select class="mt-2" v-model="formStore.post.category">
            <option
                v-for="(category, index) in formStore.categories" :key="category.id"
            >
                {{category.name}}
            </option>
        </select>
    </div>
</template>

<script setup>
    import { inject } from 'vue';

    const formStore = inject('formStore');

    defineProps(['label', 'name']);
</script>
