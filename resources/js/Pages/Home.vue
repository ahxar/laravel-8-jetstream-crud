<template>
  <guest-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Posts
      </h2>
    </template>

    <div class="py-12">
      <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4"
        v-for="post in posts.data"
        :key="post.id"
      >
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
          <h2 class="text-xl font-bold">{{ post.title }}</h2>
          <div class="mb-2">Author: {{ post.user.name }}</div>
          <div class="whitespace-pre-line">{{ post.content }}</div>
        </div>
      </div>
    </div>
  </guest-layout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout";

export default {
  components: {
    GuestLayout,
  },

  props: {
    posts: Object,
  },
};
</script>
