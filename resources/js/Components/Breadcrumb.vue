<template>
    <div class="flex mb-4 justify-between items-center">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <Link :href="mainCategory.url"
                        class="inline-flex items-center text-sm md:text-xl font-bold text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-5 h-5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ mainCategory.title }}
                    </Link>
                </li>
                <li v-for="item in subCategories">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <Link :href="item.url"
                            class="ms-1 text-sm md:text-xl font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        {{
                            item.title }}</Link>
                    </div>
                </li>
            </ol>
        </nav>
        <PrimaryButton v-if="useButton" :url="btnUrl" :isLink="true">
            <svg class="w-4 h-4 me-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg>
            {{ btnText }}
        </PrimaryButton>
    </div>
</template>

<script setup>
import PrimaryButton from './PrimaryButton.vue';

defineProps({

    /**
     * The mainCategory prop represents the main category object for the breadcrumb.
     *
     * @type {Object}
     * @default {}
     * @required false
     */
    mainCategory: {
        type: Object,
        required: false,
        default: () => ({})
    },

    /**
     * The subCategories prop represents an array of sub-categories for the breadcrumbs.
     *
     * @type {Array}
     * @required false
     * @default () => []
     *
     * @example
     * <Breadcrumbs :subCategories="[{title: 'Categories 1', url: '/index'}]" />
     *
     */
    subCategories: {
        type: Array,
        required: false,
        default: () => []
    },

    /**
     * The btnText prop represents the text of the button.
     *
     * @type {String}
     * @required false
     * @default 'Tambah'
     *
     * @example
     * <Breadcrumbs btnText="Buat baru" />
     *
     */
    btnText: {
        type: String,
        required: false,
        default: 'Tambah'
    },

    /**
     * The btnText prop represents the text of the button.
     *
     * @type {String}
     * @required false
     * @default '/''
     *
     * @example
     * <Breadcrumbs btnUrl="/" />
     *
     */
    btnUrl: {
        type: String,
        required: false,
        default: '/'
    },

    /**
     * The showBackButton prop represents the visibility of the back button.
     *
     * @type {Boolean}
     * @required false
     * @default true
     *
     * @example
     * <Breadcrumbs :showBackButton="false" />
     *
     */
    useButton: {
        type: Boolean,
        required: false,
        default: true
    }
})
</script>
