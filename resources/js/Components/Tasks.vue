<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Dashboard from '../Pages/Dashboard.vue';

const tasks = defineProps({
    tasks: Array
})

const arr = Object.values(tasks.tasks[0]);

</script>

<template>
    <div class="col-span-2">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-white dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Task Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="task in arr" class="bg-white border-b dark:bg-gray-100 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                            {{ task.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ task.date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ task.description }}
                        </td>
                        <td class="px-6 py-4">
                            <input type="checkbox">
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <button class="bg-green-600 text-white py-2 px-3 rounded" :tasks="task">Update</button>
                            <button class="bg-red-600 text-white py-2 px-3 rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>