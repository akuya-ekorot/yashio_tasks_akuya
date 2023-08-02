<template>
    <div class="sm:col-span-4">
        <label :for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ label }}</label>
        <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input v-model="formStore.post[name]" required type="text" :name="name" :id="name" class="pl-6 block flex-1 border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" :placeholder="placeholder" />
            </div>
        </div>
    </div>
</template>

<script setup>
    import { inject } from 'vue';

    defineProps(['name', 'placeholder', 'label']);

    const formStore = inject('formStore');
</script>
