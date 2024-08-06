<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-10">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue'
import Sidebar from '@/Components/Sidebar.vue';

import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite';

onMounted(() => {
    initFlowbite();
})
</script>
