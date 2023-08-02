<template>
    <div class="mt-6 flex items-center justify-end gap-x-6">

        <!-- Cancel Button -->
        <Button type="button" :primary="false" text="Cancel" :action="() => $router.push('/')" />

        <!-- Save Button -->
        <Button type="submit" :primary="true" text="Save" />

    </div>
</template>

<script setup>
    import Button from './Button.vue';
</script>
