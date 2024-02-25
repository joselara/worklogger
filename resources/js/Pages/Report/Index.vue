<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Table from "@/Components/Table.vue";
import { Link, router } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    reports: Object,
});

const headers = [
    {
        label: "Report Name",
        field: "name",
    },
    {
        label: "Invoice Date",
        field: (row) => {
            if (row.invoice_date === null) return "";

            return new Date(row.invoice_date).toLocaleDateString();
        },
    },
    {
        label: "Invoice Number",
        field: "invoice_number",
    },
    {
        label: "Total Tasks",
        field: "tasks_count",
    },
    {
        label: "Amount",
        field: (row) => {
            if (!row.total_amount) return "";

            return new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: "USD",
            }).format(row.total_amount);
        },
    },
    {
        label: "Status",
        field: (row) => {
            return row.is_paid ? "Paid" : "Unpaid";
        },
    },
];

const rowClass = (row) => {
    const baseClass = "cursor-pointer";
    const colorClass = row.is_paid ? "bg-green-100" : "bg-red-100";

    return `${baseClass} ${colorClass}`;
};
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reports
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <Table
                    :headers="headers"
                    :rows="reports"
                    :onRowClick="
                        (row) => router.visit(route('reports.show', row))
                    "
                    :rowClass="(row) => rowClass(row)"
                >
                    <template #top>
                        <div class="flex justify-end mb-4">
                            <PrimaryButton :href="route('reports.create')">
                                Create Report
                            </PrimaryButton>
                        </div>
                    </template>

                    <!-- Ref: @/Components/Table.vue issue -->
                    <!-- <template v-slot:actions="row">
                        <Link
                            :href="`/report/edit/${row.id}`"
                            class="cursor-pointer text-indigo-600 hover:text-indigo-900"
                        >
                            Edit
                        </Link>
                    </template> -->
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
