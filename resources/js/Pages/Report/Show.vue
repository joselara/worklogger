<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionTitle from "@/Components/SectionTitle.vue";
import Details from "./Partials/Details.vue";

defineProps({
    report: Object,
});

const taskFields = [
    {
        label: "Title",
        field: "title",
    },
    {
        label: "Description",
        field: "description",
    },
    {
        label: "Due Date",
        field: (row) => {
            if (row.due_date === null) return "";

            return new Date(row.due_date).toLocaleDateString();
        },
    },
    {
        label: "Status",
        field: (row) => {
            return row.completed ? "Completed" : "Incomplete";
        },
    },
];
</script>

<template>
    <AppLayout :title="report.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ report.name }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <SectionTitle>
                        <template #title> Report Details </template>
                        <template #description>
                            Find all details, information and related task.
                        </template>
                    </SectionTitle>

                    <Details :report="report" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
