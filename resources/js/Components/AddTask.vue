<script>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


export default {

    data() {
        return {
            form: useForm({
                name: '',
                date: '',
                description: ''
            })
        }
    },

    methods: {
        saveData() {
            this.form.post(route('task.store', {
                
            }))
        }
    }
};

</script>

<template>
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
                        <input class="w-full rounded-md" v-model="form.name" type="text" name="" id="">
                    </div>
                    <div>
                        <label for="">Task Date</label>
                    </div>
                    <div>
                        <input class="w-full rounded-md" v-model="form.date" type="date" name="" id="">
                    </div>
                    <div>
                        <label for="">Task Description</label>
                    </div>
                    <div>
                        <textarea class="w-full rounded-md" v-model="form.description" type="text" name="" id="">

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
</template>