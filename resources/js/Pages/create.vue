<script setup>
import { useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    email: "",
    phone: "",
});

const submit = () => {
    router.post("/customers", form);
};
</script>

<template>
    <div class="flex justify-center">
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Form Costumers</h2>
                <form @submit.prevent="submit">
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input
                            type="text"
                            v-model="form.name"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <div class="label">
                            <span
                                class="label-text-alt text-red-500 text-sm"
                                v-if="errors.name"
                                >{{ errors.name }}</span
                            >
                        </div>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input
                            type="text"
                            v-model="form.email"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <div class="label">
                            <span
                                class="label-text-alt text-red-500 text-sm"
                                v-if="errors.email"
                                >{{ errors.email }}</span
                            >
                        </div>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Phone</span>
                        </div>
                        <input
                            type="text"
                            v-model="form.phone"
                            class="input input-bordered w-full max-w-xs"
                        />
                        <div class="label">
                            <span
                                class="label-text-alt text-red-500 text-sm"
                                v-if="errors.phone"
                                >{{ errors.phone }}</span
                            >
                        </div>
                    </label>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary mt-3">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
