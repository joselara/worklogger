<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Table from "@/Components/Table.vue";
import { Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    tasks: Object,
});

const headers = [
    {
        label: "Title",
        field: "title",
    },
    {
        label: "Description",
        field: (row) => {
            return `${row.description.substring(0, 50)}...`;
        },
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
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Table :headers="headers" :rows="tasks">
                    <template #top>
                        <div class="flex justify-end mb-4">
                            <PrimaryButton :href="route('task.create')">
                                Create Task
                            </PrimaryButton>
                        </div>
                    </template>

                    <template v-slot:actions="row">
                        <Link
                            :href="`/tasks/edit/${row.id}`"
                            class="cursor-pointer text-indigo-600 hover:text-indigo-900"
                        >
                            Edit
                        </Link>
                    </template>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
