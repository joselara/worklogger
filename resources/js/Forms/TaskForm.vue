<script setup>
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from "@/Components/Checkbox.vue";

defineProps({
    form: {
        type: Object,
        required: true,
    },
    submitLabel: {
        type: String,
        default: "Save",
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
    title: {
        type: String,
        default: "Task Details",
    },
    description: {
        type: String,
        default: "",
    },
});

defineEmits(["submit"]);
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>{{ title }}</template>

        <template #description>{{ description }}</template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextInput
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="completed_at" value="Completed At" />
                <TextInput
                    id="completed_at"
                    v-model="form.completed_at"
                    type="date"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.completed_at" class="mt-2" />
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
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                {{ submitLabel }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
