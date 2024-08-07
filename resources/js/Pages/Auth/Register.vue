<template>
    <div class="flex items-center justify-center w-screen h-screen bg-blue-600 lg:bg-white">
        <div class="items-center justify-center hidden w-full h-screen px-24 bg-blue-600 lg:flex">
            <div class="w-3/4 text-center">
                <h1 class="mb-6 text-6xl font-bold text-white">
                    INOTED
                </h1>
                <h2 class="text-2xl text-white">
                    Catat, simpan, temukan. Aplikasi jurnal digital yang membantumu mengatur pikiran dan kenangan.
                    Dengan
                    fitur pengingat, pencarian cerdas, dan tampilan yang menarik, INOTED adalah sahabatmu dalam mencatat
                    keseharian.
                </h2>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center w-4/5 h-screen">
            <h1 class="hidden mb-8 text-3xl italic lg:block">"Your personal diary, <br>always there for you."</h1>
            <div class="flex flex-col items-center justify-center mb-6 text-center text-white lg:hidden">
                <h1 class="mb-2 text-3xl font-bold">INOTED</h1>
                <h2 class="text-xl italic">"Your personal diary always there for you."</h2>
            </div>
            <div>
                <Alert v-if="success" type="success">
                    {{ success }}
                </Alert>
                <div
                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <form class="space-y-6" @submit.prevent="submit">
                        <h5 class="text-xl font-bold text-center text-gray-900 dark:text-white">Register</h5>
                        <div>
                            <FormLabel for="name">Nama</FormLabel>
                            <FormInput class="mb-4" :modelValue="form.name" id="name" type="text" name="name"
                                placeholder="Asep Setiawan" v-model="form.name" required>
                            </FormInput>
                            <Alert v-if="errors.name" type="danger">
                                {{ errors.name }}
                            </Alert>
                        </div>
                        <div>
                            <FormLabel for="email">Email</FormLabel>
                            <FormInput class="mb-4" id="email" type="email" name="email" placeholder="asep@example.com"
                                v-model="form.email" required>
                            </FormInput>
                            <Alert v-if="errors.email" type="danger">
                                {{ errors.email }}
                            </Alert>
                        </div>
                        <div>
                            <FormLabel for="password">Password</FormLabel>
                            <FormInput class="mb-4" id="password" type="password" name="password" placeholder="••••••••"
                                v-model="form.password" required>
                            </FormInput>
                            <ul class="max-w-md mt-2 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                <li>
                                    Minimal 8 karakter
                                </li>
                                <Alert v-if="errors.password" type="danger">
                                    {{ errors.password }}
                                </Alert>
                            </ul>
                        </div>
                        <div>
                            <FormLabel for="confirmation_password">Konfirmasi password</FormLabel>
                            <FormInput class="mb-4" id="confirmation_password" type="password"
                                name="confirmation_password" placeholder="••••••••" v-model="form.confirmation_password"
                                required>
                            </FormInput>
                            <Alert v-if="errors.confirmation_password" type="danger">
                                {{ errors.confirmation_password }}
                            </Alert>
                        </div>
                        <PrimaryButton class="w-full" type="submit">Daftar sekarang</PrimaryButton>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Sudah punya akun?
                            <Link :href="route('viewLogin')" class="text-blue-700 hover:underline dark:text-blue-500">
                            Masuk sekarang</Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormLabel from '@/Components/FormLabel.vue';
import FormInput from '@/Components/FormInput.vue';
import Alert from '@/Components/Alert.vue';

import { reactive, computed, watch } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

defineProps({
    errors: Object,
});

const success = computed(() => usePage().props.flash.success)

const form = reactive({
    name: '',
    email: '',
    password: '',
    confirmation_password: '',
})

const submit = () => {
    router.post(route('register'), form);
}

watch(success, () => {
    setTimeout(() => {
        router.visit(route('viewLogin'))
    }, 3000)
})
</script>
