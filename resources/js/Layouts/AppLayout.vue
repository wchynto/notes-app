<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="grid grid-cols-4 gap-4 mb-4">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue'
import Sidebar from '@/./Components/Sidebar.vue';
</script>
