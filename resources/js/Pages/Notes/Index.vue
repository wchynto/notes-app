<template>
    <AppLayout>
        <Note v-for="item in bgColors" :bgColor="item" title="Lorem ipsum">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat assumenda
            doloribus totam quia enim, deserunt nam praesentium ea! Voluptas vero asperiores impedit quas esse
            aliquam voluptatem laborum maxime. Ut, amet. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Minima ducimus possimus unde saepe in. Vitae quidem, reprehenderit minima ea optio hic natus libero cum!
            Maxime molestias vitae sapiente libero itaque.
        </Note>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Note from '@/Components/Note.vue';

const bgColors = [
    'bg-blue-400',
    'bg-green-400',
    'bg-yellow-400',
    'bg-red-400',
    'bg-indigo-400',
    'bg-purple-400',
    'bg-pink-400',
    'bg-gray-400',
];
</script>
