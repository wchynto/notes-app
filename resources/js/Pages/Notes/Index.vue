<template>
    <AppLayout>
        <Breadcrumb :mainCategory="mainCategory" btnText="Buat baru" :btnUrl="route('notes.create')"></Breadcrumb>
        <div class="grid grid-cols-2 gap-4 mb-4 lg:grid-cols-3 xl:grid-cols-4">
            <Note v-for="note in notes" :bgColor="note.color" :title="note.title"
                :deleteUrl="route('notes.destroy', note.ulid)" :noteId="note.ulid"
                :updateUrl="route('notes.edit', note.ulid)">
                {{ note.content }}
            </Note>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Note from '@/Components/Note.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';

import { inject } from 'vue'

const swal = inject('$swal')

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    notes: {
        type: Array,
        required: true,
    },
});

const mainCategory = { title: props.title, url: route(route().current()) };


</script>
