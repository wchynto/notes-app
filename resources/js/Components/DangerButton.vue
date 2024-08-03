<template>
    <Link v-if="isLink" :href="url"
        class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
    <slot></slot>
    </Link>
    <button v-else
        class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
        <slot></slot>
    </button>
</template>

<script setup>
defineProps({
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
