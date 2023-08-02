<template>
    <button v-if="primary" :type="type" class="rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800">{{ text }}</button>
    <button v-else  @click="action" :type="type" class="text-sm font-semibold leading-6 text-gray-900">{{ text }}</button>
</template>

<script setup>
    defineProps(['type', 'primary', 'text', 'action']);
</script>
