<template>
    <Link v-if="isLink" :href="url"
        class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
    <slot></slot>
    </Link>
    <button v-else
        class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
        <slot></slot>
    </button>
</template>

<script setup>
const props = defineProps({
    isLink: {
        type: Boolean,
        required: false,
        default: false
    },
    url: {
        type: String,
        required: false,
        default: '/'
    },
});
</script>
