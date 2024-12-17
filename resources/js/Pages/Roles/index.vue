<template>
    <Head title="Roles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Roles
            </h2>
        </template>
        <div class="py-10 bg-gray-100">
            <div class="mx-auto max-w-7xl">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">
                                Roles
                            </h1>
                            <p class="mt-2 text-sm text-gray-700">
                                A list of all the Roles.
                            </p>
                        </div>

                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <Link
                                v-if="page.props.can.role_create"
                                :href="route('roles.create')"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                            >
                                Add Role
                            </Link>
                        </div>
                    </div>

                    <div class="flex flex-col mt-8">
                        <div
                            class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                        >
                            <div
                                class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                            >
                                <div
                                    class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
                                >
                                    <table
                                        class="min-w-full divide-y divide-gray-300"
                                    >
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                                >
                                                    ID
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                                >
                                                    Title
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="relative py-3.5 pl-3 pr-4 sm:pr-6"
                                                />
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200"
                                        >
                                            <tr
                                                v-for="role in roles"
                                                :key="role.id"
                                            >
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                                >
                                                    {{ role.id }}
                                                </td>
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6"
                                                >
                                                    {{ role.title }}
                                                </td>

                                                <td
                                                    class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6"
                                                >
                                                    <Link
                                                        v-if="
                                                            page.props.can
                                                                .role_edit
                                                        "
                                                        :href="
                                                            route(
                                                                'roles.edit',
                                                                role.id
                                                            )
                                                        "
                                                        class="text-indigo-600 hover:text-indigo-900"
                                                    >
                                                        Edit
                                                    </Link>
                                                    <button
                                                        v-if="
                                                            page.props.can
                                                                .role_delete
                                                        "
                                                        @click="
                                                            deleteRole(role.id)
                                                        "
                                                        class="ml-2 text-indigo-600 hover:text-indigo-900"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    roles: {
        type: Object,
        required: true,
    },
});

const deleteForm = useForm({});
const page = usePage();

const deleteRole = (roleId) => {
    if (confirm("Are you sure you want to delete this role?")) {
        deleteForm.delete(route("roles.destroy", roleId), {
            preserveScroll: true,
        });
    }
};
</script>

<style></style>
