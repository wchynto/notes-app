<template>
    <AppLayout>
        <Breadcrumb :mainCategory="mainCategory" :subCategories="subCategories" :useButton="false"></Breadcrumb>
        <div class="w-full p-8 bg-white rounded shadow-md">
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <FormLabel for="title">Judul</FormLabel>
                    <FormInput type="text" v-model="form.title" id="title" name="title"
                        placeholder="Tulis judul catatanmu disini..." required />
                </div>
                <div class="mb-5">
                    <FormLabel for="content">Deskripsi</FormLabel>
                    <FormTexarea v-model="form.description" id="content" name="content"
                        placeholder="Tulis catatanmu disini..." rows="10">
                    </FormTexarea>
                </div>
                <div class="mb-5">
                    <FormLabel for="content">Todos</FormLabel>
                    <div>
                        <form @submit.prevent="addTodo">
                            <div class="flex gap-2">
                                <FormInput type="text" v-model="todo.title" id="todo" name="todo"
                                    placeholder="Tambahkan todo disini..." required />
                                <button
                                    class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                    <svg class="w-4 h-4 text-white ms-1 me-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </form>
                        <ul>
                            <li v-for="(todo, index) in form.todos">
                                <form @submit.prevent="deleteTodo(index)">
                                    <div class="flex items-center justify-between gap-2 px-4 py-2 my-2 border-2 rounded-lg"
                                        :class="props.bgColor">
                                        <div class="flex items-center justify-center gap-4">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <p>
                                                {{ todo.title }}
                                            </p>
                                        </div>
                                        <button>
                                            <svg class="w-5 h-5 text-gray-800 dark:text-white hover:text-red-600"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex justify-end w-full gap-4">
                    <SecondaryButton type="reset">
                        <svg class="w-4 h-4 text-white ms-1 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                        </svg>
                        Atur ulang
                    </SecondaryButton>
                    <PrimaryButton type="submit"><svg class="w-4 h-4 text-white ms-1 me-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        Simpan
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import FormLabel from '@/Components/FormLabel.vue';
import FormInput from '@/Components/FormInput.vue';
import FormTexarea from '@/Components/FormTexarea.vue';

import { reactive, computed, ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import { alertSuccess } from '../../Helpers/alert';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    subCategory: {
        type: String,
        required: true
    },
    list: {
        type: Object,
        required: true,
    },
    todos: {
        type: Array,
        required: true,
    },
});

const success = computed(() => usePage().props.flash.success)

const mainCategory = { title: props.title, url: route('lists.index') };

const subCategories = [
    { title: props.subCategory, url: route('lists.create') },
];

const form = reactive({
    title: props.list.title,
    description: props.list.description,
    todos: props.todos,
    deleteTodos: []
});

const todo = reactive({
    title: '',
    isDone: false,
});

const submit = () => {
    router.put(route('lists.update', props.list.ulid), form, {
        onSuccess: () => {
            alertSuccess('Berhasil!', success.value);
        },
    });
}

const addTodo = () => {
    form.todos.push({ title: todo.title, isDone: todo.isDone });
    todo.title = '';
    todo.isdone = false;
}

const deleteTodo = (index) => {
    form.deleteTodos.push(form.todos.splice(index, 1)[0]);
}
</script>
