<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeLabel from '@/Components/InputLabel.vue';
import BreezeInput from '@/Components/TextInput.vue';
import BreezeTextArea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    title: '',
    description: '',
    genre: '',
    price: ''
});
const submit = () => {
    form.post(route('books.store'));
};
</script>
<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Book
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('books.index')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                                <div className="flex flex-col">

                                <!-- Title -->
                                    <div className="mb-4">
                                        <BreezeLabel for="title" value="Title" />
                                        <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus />
                                            <span className="text-red-600" v-if="form.errors.title">
                                                {{ form.errors.title }}
                                            </span>
                                    </div>

                                <!-- Description -->
                                    
                                    <div className="mb-4">
                                        <BreezeLabel for="description" value="Description" />
                                        <BreezeTextArea id="description" class="mt-1 block w-full" v-model="form.description" autofocus />
                                            <span className="text-red-600" v-if="form.errors.description">
                                                {{ form.errors.description }}
                                            </span>
                                    </div>

                                <!-- Genre/Type -->

                                    <div className="mb-4">
                                        <BreezeLabel for="genre" value="Genre" />
                                        <BreezeInput id="genre" type="text" class="mt-1 block w-full" v-model="form.genre" autofocus />
                                            <span className="text-red-600" v-if="form.errors.genre">
                                                {{ form.errors.genre }}
                                            </span>
                                    </div>

                                <!-- Price -->

                                    <div className="mb-4">
                                        <BreezeLabel for="price" value="Price" />
                                        <BreezeInput id="price" type="text" class="mt-1 block w-full" v-model="form.price" autofocus />
                                            <span className="text-red-600" v-if="form.errors.price">
                                                {{ form.errors.price }}
                                            </span>
                                    </div>

                                </div>

  
                                <div className="mt-4">
                                    <button type="submit" className="px-6 py-2 font-bold text-white bg-green-500 rounded" >
                                        Save
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>