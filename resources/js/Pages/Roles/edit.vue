<template>
    <Head title="Edit Role" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Role
            </h2>
        </template>
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">
                    <form @submit.prevent="submit">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                                <div>
                                    <h3
                                        class="text-lg font-medium leading-6 text-gray-900"
                                    >
                                        Role Information
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Use this form to create a new Role.
                                    </p>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="title"
                                            class="block text-sm font-medium text-gray-700"
                                            >Title</label
                                        >
                                        <input
                                            v-model="form.title"
                                            type="text"
                                            id="title"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.title"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="title"
                                            class="block text-sm font-medium text-gray-700"
                                            >Permissions</label
                                        >
                                        <Multiselect
                                            multiple
                                            :options="permissions.data"
                                            v-model="form.selectedPermissions"
                                            :reduce="
                                                (permission) => permission.id
                                            "
                                            label="title"
                                            class="block w-full py-2 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        ></Multiselect>
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.selectedPermissions
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-3 text-right bg-gray-50 sm:px-6"
                            >
                                <Link
                                    :href="route('roles.index')"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Cancel
                                </Link>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";

const role = usePage().props.role;

defineProps({
    permissions: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    title: role.title,
    selectedPermissions: role.permissions.map((permission) => permission.id),
});

const submit = () => {
    form.put(route("roles.update", role.id), {
        preserveScroll: true,
    });
};
</script>

<style></style>
