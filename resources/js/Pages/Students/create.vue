<template>
    <Head title="Create Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Student
            </h2>
        </template>

        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">
                    <form>
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                                <div>
                                    <h3
                                        class="text-lg font-medium leading-6 text-gray-900"
                                    >
                                        Student Information
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Use this form to create a new student.
                                    </p>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <div class="flex space-x-4">
                                            <input
                                                v-model="form.firstname"
                                                type="text"
                                                id="firstname"
                                                placeholder="First Name"
                                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                :class="{
                                                    '@error text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror':
                                                        form.errors.firstname,
                                                }"
                                            />
                                            <InputError
                                                :message="form.errors.firstname"
                                                class="mt-2"
                                            />
                                            <input
                                                v-model="form.lastname"
                                                type="text"
                                                id="lastname"
                                                placeholder="Last Name"
                                                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                :class="{
                                                    '@error text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror':
                                                        form.errors.lastname,
                                                }"
                                            />
                                            <InputError
                                                :message="form.errors.lastname"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <input
                                            v-model="form.email"
                                            type="email"
                                            id="email"
                                            placeholder="Email Address"
                                            autocomplete="email"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                '@error text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror':
                                                    form.errors.email,
                                            }"
                                        />
                                    </div>
                                    <InputError
                                        :message="form.errors.email"
                                        class="mt-2"
                                    />

                                    <div class="col-span-6 sm:col-span-3">
                                        <select
                                            v-model="form.class_id"
                                            id="class_id"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                '@error text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror':
                                                    form.errors.class_id,
                                            }"
                                        >
                                            <option value="">
                                                Select a Class
                                            </option>
                                            <option
                                                v-for="item in classes"
                                                :key="item.id"
                                                :value="item.id"
                                            >
                                                {{ item.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <InputError
                                        :message="form.errors.class_id"
                                        class="mt-2"
                                    />

                                    <div class="col-span-6 sm:col-span-3">
                                        <select
                                            v-model="form.section_id"
                                            id="section_id"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                '@error text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror':
                                                    form.errors.section_id,
                                            }"
                                        >
                                            <option value="">
                                                Select a Section
                                            </option>
                                            <option
                                                v-for="section in localSections"
                                                :key="section.id"
                                                :value="section.id"
                                            >
                                                {{ section.name }}
                                            </option>
                                        </select>
                                        <InputError
                                            :message="form.errors.section_id"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-3 text-right bg-gray-50 sm:px-6"
                            >
                                <a
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 mr-4 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Cancel
                                </a>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Save
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
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";
import axios from "axios";
import { watch, ref } from "vue";

const props = defineProps({
    classes: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    firstname: "",
    lastname: "",
    email: "",
    class_id: "",
    section_id: "",
});

watch(
    () => form.class_id,
    (value) => {
        getSections(value);
    }
);

const localSections = ref([]);
function getSections(classId) {
    axios
        .get(`/api/sections?class_room_id=${classId}`)
        .then((response) => {
            localSections.value = response.data;
        })
        .catch((error) => {
            console.log("Error fetching sections:", error);
        });
    // axios
    //     .get(`/api/sections?class_room_id=${classId}`)
    //     .then((response) => {
    //         console.log("response", response.data);
    //         props.sections = response.data;
    //     })
    //     .catch((error) => {
    //         console.log("Error fetching sections:", error);
    //     });
}
</script>

<style></style>
