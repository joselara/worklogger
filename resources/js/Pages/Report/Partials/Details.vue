<script setup>
import { getFieldFromObject } from "@/utils";

defineProps({
    report: Object,
});

const reportFields = [
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
</script>

<template>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
            <div class="border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div
                        v-for="row in reportFields"
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm font-medium text-gray-900">
                            {{ row.label }}
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ getFieldFromObject(report, row.field) }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>
