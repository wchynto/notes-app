<template>
    <div class="flex w-screen h-screen items-center justify-center bg-blue-600 lg:bg-white">
        <div class="bg-blue-600 w-full h-screen hidden items-center justify-center px-24 lg:flex">
            <div class="text-center  w-3/4">
                <h1 class="text-white text-6xl font-bold mb-6">
                    INOTED
                </h1>
                <h2 class="text-white text-2xl">
                    Catat, simpan, temukan. Aplikasi jurnal digital yang membantumu mengatur pikiran dan kenangan.
                    Dengan
                    fitur pengingat, pencarian cerdas, dan tampilan yang menarik, INOTED adalah sahabatmu dalam mencatat
                    keseharian.
                </h2>
            </div>
        </div>
        <div class="w-4/5 h-screen flex flex-col justify-center items-center">
            <h1 class="mb-8 text-3xl italic hidden lg:block">"Your personal diary, <br>always there for you."</h1>
            <div class="mb-6 flex flex-col justify-center items-center text-center lg:hidden text-white">
                <h1 class="mb-2 text-3xl font-bold">INOTED</h1>
                <h2 class="text-xl italic">"Your personal diary always there for you."</h2>
            </div>
            <div>
                <Alert v-if="error" type="danger">
                    {{ error }}
                </Alert>
                <div
                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <form class="space-y-6" @submit.prevent="submit">
                        <h5 class="text-xl text-gray-900 dark:text-white font-bold text-center">Login</h5>
                        <div>
                            <FormLabel for="email">Email</FormLabel>
                            <FormInput id="email" type="email" name="email" placeholder="asep@example.com"
                                v-model="form.email" required>
                            </FormInput>
                        </div>
                        <div>
                            <FormLabel for="password">Password</FormLabel>
                            <FormInput id="password" type="password" name="password" placeholder="••••••••"
                                v-model="form.password" required>
                            </FormInput>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value=""
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                        v-model="form.remember" />
                                </div>
                                <FormLabel for="remember" class="ml-3">
                                    Ingat saya
                                </FormLabel>
                            </div>
                            <Link href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lupa
                            password?</Link>
                        </div>
                        <PrimaryButton class="w-full" type="submit">Masuk sekarang</PrimaryButton>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Belum punya akun?
                            <Link :href="route('viewRegister')"
                                class="text-blue-700 hover:underline dark:text-blue-500">
                            Buat akun</Link>
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

import { reactive, computed } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

const error = computed(() => usePage().props.flash.error)

const form = reactive({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    router.post(route('login'), form);
}
</script>
