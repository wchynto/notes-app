<template>
    <AppLayout>
        <Breadcrumb :mainCategory="mainCategory" :subCategories="subCategories" :useButton="false"></Breadcrumb>
        <div class="w-full p-8 bg-white rounded shadow-md">
            <form @submit.prevent="submit">
                <div class="mb-5">
                    <FormLabel for="title">Judul</FormLabel>
                    <FormInput type="text" v-model="form.title" id="title" name="title"
                        placeholder="Tulis judul catatanmu disini..." />
                </div>
                <div class="mb-5">
                    <FormLabel for="content">Catatan</FormLabel>
                    <FormTexarea v-model="form.content" id="content" name="content"
                        placeholder="Tulis catatanmu disini..." rows="10">
                    </FormTexarea>
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

import { reactive, computed } from 'vue';
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
    note: {
        type: Object,
        required: true,
    },
    errors: {
        type: String,
        required: true,
    },
});

const success = computed(() => usePage().props.flash.success)

const mainCategory = { title: props.title, url: route('notes.index') };

const subCategories = [
    { title: props.note.title, url: route('notes.edit', props.note.ulid) },
    { title: props.subCategory, url: route('notes.edit', props.note.ulid) },
];

const form = reactive({
    title: props.note.title,
    content: props.note.content,
});

const submit = () => {
    router.put(route('notes.update', props.note.ulid), form, {
        onSuccess: () => {
            alertSuccess('Berhasil!', success.value);
        },
    });
}
</script>
