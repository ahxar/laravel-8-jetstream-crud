<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Users Show
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
          Nama: {{ manageUser.name }}<br />
          Email: {{ manageUser.email }}<br />
          Role: {{ manageUser.role }}<br />
          Created At: {{ manageUser.created_at }}<br />
          Updated At: {{ manageUser.updated_at }}<br />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: {
    manageUser: Object
  },
};
</script>
