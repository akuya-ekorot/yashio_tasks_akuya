<template>
    <router-link slot="{ navigate }" :to="to">
        <button
            class="bg-gray-800 h-full text-gray-50 rounded px-6 text-sm font-semibold"
            @click="navigate"
            role="link"
            >
            {{ text }}
        </button>
    </router-link>
</template>

<script setup>
    defineProps(['to', 'text']);
</script>
