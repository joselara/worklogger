<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import ContactForm from "@/Forms/ContactForm.vue";

const props = defineProps({
    contact: Object,
});

const form = useForm({
    id: props.contact?.id || null,
    first_name: props.contact?.first_name || "",
    last_name: props.contact?.last_name || "",
    email: props.contact?.email || "",
    phone: props.contact?.phone || "",
});

const createContact = () => {
    form.post(route("contact.store"), {
        errorBag: "createContact",
        preserveScroll: true,
    });
};

const updateContact = () => {
    form.put(route("contact.update", props.contact.id), {
        errorBag: "updateContact",
        preserveScroll: true,
    });
};

const fullName = computed(
    () => `${props.contact.first_name} ${props.contact.last_name}`
);

const title = computed(() => {
    return form.id ? "Update Contact" : "Create Contact";
});

const description = computed(() => {
    return form.id
        ? "Update the contact's information."
        : "Add the contact's information.";
});
</script>

<template>
    <AppLayout :title="title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ form.id ? fullName : "Create Contact" }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <ContactForm
                    :form="form"
                    @submit="
                        () => (form.id ? updateContact() : createContact())
                    "
                    :description="description"
                />
            </div>
        </div>
    </AppLayout>
</template>
