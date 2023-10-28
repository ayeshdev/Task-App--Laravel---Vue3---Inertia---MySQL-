<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Dashboard from '../Pages/Dashboard.vue';
import { FwbButton, FwbModal } from 'flowbite-vue'
import AddTask from './AddTask.vue';


// Start Modal

const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}
function showModal() {
    isShowModal.value = true
}
// End Modal


const tasks = defineProps({
    tasks: Array,
    title: String,

    title: {
        type: String,
        default: 'Update Task'
    },

    btn_name: {
        type: String,
        default: 'Update Task'
    },

})

const arr = Object.values(tasks.tasks[0]);

const form = useForm({
    id: '',
    name: '',
    date: '',
    description: ''
})


function updateTask(task) {

    form.id = task.id;
    form.name = task.name;
    form.description = task.description;
    form.date = task.date;

    isShowModal.value = true

}

const updateData = () => {

    form.post(route('task.update', {

    }));
};

const deleteTask = (task) => {
    form.id = task.id;
    form.post(route('task.delete', {
        
    }));

    location.reload();
};



</script>

<template>
    <div class="col-span-2">
        <div class="relative overflow-x-auto overflow-y-scroll h-[500px] shadow-md sm:rounded-lg">
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
                <tbody class="overflow-y-scroll">

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
                            <button class="bg-green-600 text-white py-2 px-3 rounded"
                                @click="updateTask(task)">Update</button>
                            <button class="bg-red-600 text-white py-2 px-3 rounded" @click="deleteTask(task)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <!-- modal -->
    <fwb-modal v-if="isShowModal" @close="closeModal">
        <template #body>

            <div class="col-span-1">
                <div class="p-5 space-y-3 rounded-lg bg-green-100 shadow-md">
                    <div>
                        <h1 class="text-3xl">{{ title }}</h1>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="space-y-2">
                            <div>
                                <label for="">Task Name</label>
                            </div>
                            <div>
                                <input class="w-full rounded-md" v-model="form.name" type="text">
                            </div>
                            <div>
                                <label for="">Task Date</label>
                            </div>
                            <div>
                                <input class="w-full rounded-md" v-model="form.date" type="date">
                            </div>
                            <div>
                                <label for="">Task Description</label>
                            </div>
                            <div>
                                <textarea class="w-full rounded-md" v-model="form.description" type="text">

                                </textarea>
                            </div>

                            <div>
                                <button class="w-full bg-purple-300 p-2 rounded-lg" type="submit" @click="updateData">{{
                                    btn_name }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </template>
    </fwb-modal>
</template>