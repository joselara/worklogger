<script setup>
import { defineProps } from "vue";

defineProps({
    headers: {
        type: Array,
        required: true,
    },
    rows: {
        type: Array,
        required: true,
    },
});

const getColumnValue = (row, header) => {
    return typeof header.column === "function"
        ? header.column(row)
        : row[header.column];
};
</script>

<template>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
            >
                <div
                    class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg"
                >
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    v-for="(header, index) in headers"
                                    :key="index"
                                    scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                >
                                    {{ header.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="(row, index) in rows" :key="index">
                                <td
                                    v-for="(header, index) in headers"
                                    :key="index"
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"
                                >
                                    {{ getColumnValue(row, header) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
