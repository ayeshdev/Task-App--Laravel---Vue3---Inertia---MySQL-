<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddTask from '@/Components/AddTask.vue';
import Tasks from '@/Components/Tasks.vue';
import { defineProps } from 'vue';

const tasks = defineProps({
    tasks: Array
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>
        <div class="grid grid-cols-3 gap-5 mt-5 mx-2">
            <AddTask />
            <Tasks :tasks="Object.values(tasks)"/>
        </div>
    </AuthenticatedLayout>
</template>
