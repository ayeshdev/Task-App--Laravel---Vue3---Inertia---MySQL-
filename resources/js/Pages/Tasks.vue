<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const tasks = defineProps({
    tasks:Array
})

</script>

<template>
    <div class="grid grid-cols-3 gap-5 mt-5 mx-2">
        <div class="col-span-1">
            <div class="p-5 space-y-3 rounded-lg bg-green-100 shadow-md">
                <div>
                    <h1 class="text-3xl">Add Task</h1>
                </div>
                <form @submit.prevent="submit">
                    <div class="space-y-2">
                        <div>
                            <label for="">Task Name</label>
                        </div>
                        <div>
                            <input class="w-full rounded-md" type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Task Date</label>
                        </div>
                        <div>
                            <input class="w-full rounded-md" type="date" name="" id="">
                        </div>
                        <div>
                            <label for="">Task Description</label>
                        </div>
                        <div>
                            <textarea class="w-full rounded-md" type="text" name="" id="">

                        </textarea>
                        </div>

                        <div>
                            <button class="w-full bg-purple-300 p-2 rounded-lg" type="submit" @click="saveData">Add
                                Task</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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

                        <tr v-for="task in tasks.tasks" class="bg-white border-b dark:bg-gray-100 dark:border-gray-700">
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
                                <button class="bg-green-600 text-white py-2 px-3 rounded">Update</button>
                                <button class="bg-red-600 text-white py-2 px-3 rounded">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</template>