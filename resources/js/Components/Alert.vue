<template>
    <div v-if="type == 'alert'"
        class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">
            <slot></slot>
        </span>
    </div>
    <div v-if="type == 'danger'"
        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">
            <slot></slot>
        </span>
    </div>
    <div v-if="type == 'success'"
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">
            <slot></slot>
        </span>
    </div>
    <div v-if="type == 'warning'"
        class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
        role="alert">
        <span class="font-medium">
            <slot></slot>
        </span>
    </div>
    <div v-if="type == 'dark'"
        class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
        <span class="font-medium">
            <slot></slot>
        </span>
    </div>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        required: true
    },
});
</script>
