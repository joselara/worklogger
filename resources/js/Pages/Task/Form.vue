<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, defineProps } from "vue";
import { useForm } from "@inertiajs/vue3";
import TaskForm from "@/Forms/TaskForm.vue";

const props = defineProps({
    task: Object,
});

const form = useForm({
    id: props.task?.id || "",
    title: props.task?.title || "",
    description: props.task?.description || "",
    completed: props.task?.completed || false,
    completed_at: props.task?.completed_at || "",
});

const createTask = () => {
    form.post(route("tasks.store"), {
        errorBag: "createTask",
        preserveScroll: true,
        onSuccess: () => {},
    });
};

const updateTask = () => {
    form.put(route("tasks.update", form.id), {
        errorBag: "updateTask",
        preserveScroll: true,
        onSuccess: () => {},
    });
};

const title = computed(() => {
    return form.id ? "Update Task" : "Create Task";
});

const description = computed(() => {
    return form.id
        ? "Update the task's information."
        : "Add the task's information.";
});
</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ title }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <TaskForm
                    :form="form"
                    @submit="() => (form.id ? updateTask() : createTask())"
                    :description="description"
                />
            </div>
        </div>
    </AppLayout>
</template>
