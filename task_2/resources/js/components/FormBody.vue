<template>
    <div class="space-y-8 w-full max-w-3xl">
      <div class="border-b border-gray-900/10 pb-8">
        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-6">

          <!-- Title Input -->
          <TextInput name="title" placeholder="Blog Title" label="Title" />

          <!-- Slug Input -->
          <TextInput name="slug" placeholder="blog-slug" label="Slug" />

          <!-- Category Input -->
          <SelectInput name="category" label="Category" />

          <!-- Excerpt Input -->
          <TextAreaInput name="excerpt" placeholer="Write your excerpt here" label="Excerpt" rows="3" />

          <!-- Body Input -->
          <TextAreaInput name="body" placeholer="Write your body here" label="Body" rows="8" />

        </div>
      </div>
    </div>
</template>

<script setup>
    import TextInput from './TextInput.vue';
    import TextAreaInput from './TextAreaInput.vue';
    import SelectInput from './SelectInput.vue';
</script>
