<script setup>
import { titleCase } from "@/utils";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

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
        default: "Contact Details",
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
            <div
                v-for="field in ['first_name', 'last_name', 'email', 'phone']"
                :key="field"
                class="col-span-6 sm:col-span-4"
            >
                <InputLabel :for="field" :value="titleCase(field)" />
                <TextInput
                    :id="field"
                    v-model="form[field]"
                    :type="field === 'email' ? 'email' : 'text'"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors[field]" class="mt-2" />
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
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
