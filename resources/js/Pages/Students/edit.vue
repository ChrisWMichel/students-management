<template>
    <Head title="Update Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Update Student
            </h2>
        </template>

        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">
                    <form @submit.prevent="updateStudent">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                                <div>
                                    <h3
                                        class="text-lg font-medium leading-6 text-gray-900"
                                    >
                                        Student Information
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Use this form to update a current
                                        student.
                                    </p>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="firstname"
                                            class="block text-sm font-medium text-gray-700"
                                            >First Name</label
                                        >
                                        <input
                                            v-model="form.firstname"
                                            type="text"
                                            id="firstname"
                                            placeholder="First Name"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.firstname,
                                            }"
                                        />
                                        <InputError
                                            :message="form.errors.firstname"
                                            class="mt-2"
                                        />
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="lastname"
                                            class="block text-sm font-medium text-gray-700"
                                            >Last Name</label
                                        >
                                        <input
                                            v-model="form.lastname"
                                            type="text"
                                            id="lastname"
                                            placeholder="Last Name"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.lastname,
                                            }"
                                        />
                                        <InputError
                                            :message="form.errors.lastname"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="email"
                                            class="block text-sm font-medium text-gray-700"
                                            >Email Address</label
                                        >
                                        <input
                                            v-model="form.email"
                                            type="email"
                                            id="email"
                                            placeholder="Email Address"
                                            autocomplete="email"
                                            class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.email,
                                            }"
                                        />
                                        <InputError
                                            :message="form.errors.email"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="class_id"
                                            class="block text-sm font-medium text-gray-700"
                                            >Class</label
                                        >
                                        <select
                                            v-model="form.class_room_id"
                                            id="class_id"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
                                                    form.errors.class_room_id,
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
                                        <InputError
                                            :message="form.errors.class_room_id"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="section_id"
                                            class="block text-sm font-medium text-gray-700"
                                            >Section</label
                                        >
                                        <select
                                            v-model="form.section_id"
                                            id="section_id"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{
                                                'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300':
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
                                <Link
                                    :href="route('students.index')"
                                    class="inline-flex items-center px-4 py-2 mr-4 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Cancel
                                </Link>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Update Student
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
import { Head, useForm, Link } from "@inertiajs/vue3";
import axios from "axios";
import { watch, ref, onMounted } from "vue";

const props = defineProps({
    classes: {
        type: Object,
        required: true,
    },
    student: {
        type: Object,
        required: true,
    },
});

const localSections = ref([]);
const form = useForm({
    firstname: props.student.firstname,
    lastname: props.student.lastname,
    email: props.student.email,
    class_room_id: props.student.class.id,
    section_id: props.student.section.id,
});

watch(
    () => form.class_room_id,
    (value) => {
        if (Number.isInteger(parseInt(value))) {
            getSections(value);
        } else {
            form.section_id = "";
            localSections.value = [];
        }
    }
);

onMounted(() => {
    getSections(form.class_room_id);
});

function getSections(classId) {
    axios
        .get(`/api/sections?class_room_id=${classId}`)
        .then((response) => {
            localSections.value = response.data;
        })
        .catch((error) => {
            console.log("Error fetching sections:", error);
        });
}

const updateStudent = () => {
    //console.log("student id", props.student.id);
    form.put(route("students.update", props.student.id));
};
</script>

<style></style>
