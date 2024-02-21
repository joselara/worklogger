<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Table from "@/Components/Table.vue";

defineProps({
    contacts: Object,
});

const headers = [
    {
        label: "Name",
        column: (row) => `${row.first_name} ${row.last_name}`,
    },
    {
        label: "Email",
        column: "email",
    },
    {
        label: "Phone",
        column: "phone",
    },
    {
        label: "Actions",
        column: (row) => `Edit`,
    },
];
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Table :headers="headers" :rows="contacts" />
            </div>
        </div>
    </AppLayout>
</template>
