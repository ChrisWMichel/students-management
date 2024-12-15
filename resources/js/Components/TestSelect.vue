<template>
    <div>
        <MultiSelect
            v-model="selectedOptions"
            :options="options"
            optionLabel="label"
            placeholder="Select Options"
            display="chip"
        ></MultiSelect>
        <button @click="logSelected">Log Selected</button>
    </div>
</template>

<script setup>
import MultiSelect from "primevue/multiselect";
import { ref } from "vue";

const options = ref([
    { label: "Option 1", value: 1 },
    { label: "Option 2", value: 2 },
    { label: "Option 3", value: 3 },
]);

const selectedOptions = ref([]);

const logSelected = () => {
    console.log("Selected Options:", selectedOptions.value);
};
</script>
