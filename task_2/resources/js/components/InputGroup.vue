<template>
	<div class="sm:col-span-4">
        <label :for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ name.substring(0,1).toUpperCase() + name.substring(1) }}</label>
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

<script setup>
    defineProps(['modelValue', 'formStore', 'name', 'placeholder']);
    defineEmits(['update:modelValue']);
</script>
