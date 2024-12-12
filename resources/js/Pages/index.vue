<script setup>
import { router } from "@inertiajs/vue3";
// fungsi untuk mengambil data
defineProps(["customers"]);

// fungsi untuk menghapus data dengan konfirmasi
function destroy(id) {
    if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
        router.delete(`/customers/${id}`, {
            onSuccess: () => {
                customers = customers.filter((customer) => customer.id !== id); // Perbarui daftar pelanggan secara lokal
            },
        });
    }
}

// fungsi untuk mengedit data
function edit(id) {
    router.get("/customers/" + id + "/edit");
}
</script>

<template>
    <div class="overflow-x-auto">
        <div
            v-if="$page.props.flash.message"
            role="alert"
            class="alert alert-info"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                class="h-6 w-6 shrink-0 stroke-current"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
            </svg>
            <span>{{ $page.props.flash.message }}.</span>
        </div>
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr v-for="customer in customers">
                    <th>{{ customer.name }}</th>
                    <td class="flex space-x-1">
                        <button
                            @click.prevent="edit(customer.id)"
                            class="btn btn-info btn-sm text-white"
                        >
                            Edit
                        </button>
                        <button
                            @click.prevent="destroy(customer.id)"
                            class="btn btn-error btn-sm text-white"
                        >
                            delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
