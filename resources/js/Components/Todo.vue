<template>
    <div class="flex items-center justify-between gap-2 px-4 py-2 my-2 rounded " :class="props.bgColor">
        <div class="flex items-center justify-center gap-4">
            <form action="" method="post">
                <input id="default-checkbox" type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            </form>
            <p>
                <slot></slot>
            </p>
        </div>
        <button @click="deleteTodo(props.todoId)">
            <svg class="w-5 h-5 text-gray-800 dark:text-white hover:text-red-600" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import { alertConfirm, alertSuccess } from '../Helpers/alert';

const props = defineProps({
    content: {
        type: String,
        default: 'Todo',
    },
    bgColor: {
        type: String,
        default: 'bg-white',
    },
    todoId: {
        type: String,
        required: true,
    },
});

const success = computed(() => usePage().props.flash.success)

const deleteTodo = (todoId) => {
    alertConfirm('Peringatan!', 'Todo yang dihapus tidak dapat dipulihkan').then((confirm) => {
        if (confirm.isConfirmed) {
            router.delete(route('todos.destroy', todoId), {
                onSuccess: () => {
                    alertSuccess('Berhasil!', success.value)
                }
            })
        }
    })
}
</script>
