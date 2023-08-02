<template>
    <div class="col-span-full">
        <label :for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ label }}</label>
        <div class="mt-2">
            <textarea v-model="formStore.post[name]" required :id="name" :name="name" :rows="rows" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
        </div>
        <p class="mt-3 text-sm leading-6 text-gray-600">{{ placeholder }}</p>
    </div>
</template>

<script setup>
    import { inject } from 'vue';

    const formStore = inject('formStore');

    defineProps(['name', 'label', 'placeholder', 'rows']);
</script>
