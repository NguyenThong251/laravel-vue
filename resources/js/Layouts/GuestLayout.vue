<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import UserLayouts from "../Pages/User/Layouts/UserLayouts.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <UserLayouts>
        <div
            class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0"
        >
            <div>
                <Link href="/">
                    <ApplicationLogo
                        class="h-20 text-gray-500 fill-current w-100"
                    />
                </Link>
            </div>

            <div
                class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg"
            >
                <slot />
            </div></div
    ></UserLayouts>
</template>
