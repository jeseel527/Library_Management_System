<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    books: Array,
});
const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('books.destroy', id));
    }
}
</script>


<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                LIBRARY MANAGEMENT SYSTEM - JESEEL
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                :href="route('books.create')"
                            >
                                Create Book
                            </Link>
                        </div>
                        <table className="table-fixed w-full">
                            <thead>
                                <tr className="bg-gray-100">
                                    <th className="px-4 py-2 w-20">ID</th>
                                    <th className="px-4 py-2">Title</th>
                                    <th className="px-4 py-2">Description</th>
                                    <th className="px-4 py-2">Genre/Type</th>
                                    <th className="px-4 py-2">Price</th>
                                    <th className="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="book in books">
                                    <td className="border px-4 py-2">{{ book.id }}</td>
                                    <td className="border px-4 py-2">{{ book.title }}</td>
                                    <td className="border px-4 py-2">{{ book.description }}</td>
                                    <td className="border px-4 py-2">{{ book.genre }}</td>
                                    <td className="border px-4 py-2">{{ book.price }}</td>
                                    <td className="border px-4 py-2">
                                        <Link
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                            :href="route('books.edit', book.id)"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            @click="destroy(book.id)"
                                            tabIndex="-1"
                                            type="button"
                                            className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

