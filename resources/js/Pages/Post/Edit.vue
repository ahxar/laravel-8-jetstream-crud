<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Posts Edit
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <jet-form-section @submitted="updatePost">
          <template #title> Update Post </template>

          <template #description> Update postingan. </template>

          <template #form>
            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="title" value="Title" />
              <jet-input
                id="title"
                type="text"
                class="mt-1 block w-full"
                v-model="form.title"
                autocomplete="title"
              />
              <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Content -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="content" value="Content" />
              <textarea
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                v-model="form.content"
                rows="10"
              ></textarea>
              <jet-input-error :message="form.errors.content" class="mt-2" />
            </div>
          </template>

          <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Saved.
            </jet-action-message>

            <jet-button
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Save
            </jet-button>
          </template>
        </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSelect from "@/Components/Select";

export default {
  components: {
    AppLayout,
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetSelect,
  },

  props: {
    post: Object,
  },

  setup(props) {
    const form = useForm({
      _method: "PUT",
      title: props.post.title,
      content: props.post.content,
    });

    const updatePost = () => {
      form.post(route("posts.update", props.post.id), {
        preserveScroll: true,
      });
    };

    return { form, updatePost };
  },
};
</script>
