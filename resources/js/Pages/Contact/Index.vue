<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Table from "@/Components/Table.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    contacts: Object,
});

const headers = [
    {
        label: "Name",
        field: (row) => `${row.first_name} ${row.last_name}`,
    },
    {
        label: "Email",
        field: "email",
    },
    {
        label: "Phone",
        field: "phone",
    },
];
</script>

<template>
    <AppLayout title="Contacts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Table :headers="headers" :rows="contacts">
                    <template v-slot:actions="row">
                        <Link
                            :href="`/contacts/edit/${row.id}`"
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
