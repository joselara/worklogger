<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { titleCase } from "@/utils";

const props = defineProps({
    contact: Object,
});

const form = useForm({
    first_name: props.contact.first_name,
    last_name: props.contact.last_name,
    email: props.contact.email,
    phone: props.contact.phone,
});

const updateContact = () => {
    form.put(route("contact.update", props.contact.id), {
        errorBag: "updateContact",
        preserveScroll: true,
    });
};

const fullName = computed(
    () => `${props.contact.first_name} ${props.contact.last_name}`
);
</script>

<template>
    <AppLayout title="Update Contact">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ fullName }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <FormSection @submitted="updateContact">
                    <template #title>Contact Details</template>

                    <template #description>
                        Update the contact's information.
                    </template>

                    <template #form>
                        <div
                            v-for="field in [
                                'first_name',
                                'last_name',
                                'email',
                                'phone',
                            ]"
                            :key="field"
                            class="col-span-6 sm:col-span-4"
                        >
                            <InputLabel
                                :for="field"
                                :value="titleCase(field)"
                            />
                            <TextInput
                                :id="field"
                                v-model="form[field]"
                                :type="field === 'email' ? 'email' : 'text'"
                                class="mt-1 block w-full"
                            />
                            <InputError
                                :message="form.errors[field]"
                                class="mt-2"
                            />
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
