<template>
    <AppLayout>
        <Breadcrumb :mainCategory="mainCategory" btnText="Buat baru" :btnUrl="route('notes.create')"></Breadcrumb>
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-4">
            <Note v-for="item in bgColors" :bgColor="item" title="Lorem ipsum">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat assumenda
                doloribus totam quia enim, deserunt nam praesentium ea! Voluptas vero asperiores impedit quas esse
                aliquam voluptatem laborum maxime. Ut, amet. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Minima ducimus possimus unde saepe in. Vitae quidem, reprehenderit minima ea optio hic natus libero cum!
                Maxime molestias vitae sapiente libero itaque.
            </Note>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Note from '@/Components/Note.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';

const mainCategory = { title: 'My notes', url: route('notes.index') };

const bgColors = [
    'bg-blue-400',
    'bg-green-400',
    'bg-yellow-400',
    'bg-red-400',
    'bg-indigo-400',
    'bg-purple-400',
    'bg-pink-400',
    'bg-gray-400',
    'bg-blue-400',
    'bg-green-400',
    'bg-yellow-400',
    'bg-red-400',
    'bg-indigo-400',
    'bg-purple-400',
    'bg-pink-400',
    'bg-gray-400',
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
