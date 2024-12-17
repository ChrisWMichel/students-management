<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <Link
                :href="route('login')"
                class="rounded-md px-3 py-2 text-2xl text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Log in
            </Link>
            <h1 class="mt-4 text-4xl font-bold">
                Welcome To My Students-Management App
            </h1>
            <div
                class="container p-4 mx-auto mt-4 bg-black bg-opacity-50 rounded-lg"
            >
                <p class="mt-4 text-2xl text-white">
                    This app shows off CRUD operations on students and roles
                    data. It is built with Laravel, Vue 3, and Tailwind CSS.
                    Sqlite is used for the database. Authorization and
                    permissions (assigning roles to users) are implemented by
                    scratch.
                </p>
                <p class="mt-4 text-2xl text-white">
                    Once you're on the login page, the default credentials are
                    already filled for an admin. To view the functionality of
                    the app (or lackthereof) with a user that has limited roles,
                    you can use
                    <span class="text-yellow-500">user@email.com</span> as the
                    email.
                </p>
                <p class="mt-4 text-lg">
                    Laravel version: {{ laravelVersion }}>
                </p>
            </div>
        </div>
    </div>
</template>
