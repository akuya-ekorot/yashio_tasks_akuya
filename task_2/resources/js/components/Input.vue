<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        required
        type="text"
        :name="name"
        :id="name"
        class="pl-6 block flex-1 border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
        :placeholder="placeholder"
    />
</template>

<script setup>
    defineProps(['modelValue', 'name', 'placeholder']);
    defineEmits(['update:modelValue']);
</script>
