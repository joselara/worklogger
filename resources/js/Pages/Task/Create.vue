<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from "@/Components/Checkbox.vue";

const form = useForm({
    title: "",
    description: "",
    completed: false,
    completed_at: "",
});

const createTask = () => {
    form.post(route("task.store"), {
        errorBag: "createTask",
        preserveScroll: true,
        onSuccess: () => {},
    });
};
</script>

<template>
    <AppLayout title="Task Details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Task
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <FormSection @submitted="createTask">
                    <template #title>Task Details</template>

                    <template #description>
                        Add the task's information.
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.title"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="description" value="Description" />
                            <TextInput
                                id="description"
                                v-model="form.description"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.description"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                for="completed_at"
                                value="Completed At"
                            />
                            <TextInput
                                id="completed_at"
                                v-model="form.completed_at"
                                type="date"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors.completed_at"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="flex items-center">
                                <Checkbox
                                    id="completed"
                                    v-model:checked="form.completed"
                                    name="completed"
                                />
                                <InputLabel
                                    class="ms-2 text-sm text-gray-600 select-none"
                                    for="completed"
                                    value="Completed"
                                />
                            </label>
                        </div>
                    </template>

                    <template #actions>
                        <ActionMessage
                            :on="form.recentlySuccessful"
                            class="me-3"
                        >
                            Saved.
                        </ActionMessage>

                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
