<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const name = ref('');
const date = ref('');
const description = ref('');

const form = useForm({
    name: '',
    date: '',
    description: ''
})

const props = defineProps({
    title: {
        type: String,
        default: 'Add Task'
    },

    btn_name: {
        type: String,
        default: 'Add Task'
    },

    InputName: String,

    date: {
        type: Date,
    },
    description: {
        type: String,
    }

})

const emits = defineEmits([
    'update:name'
])

const saveData = () => {

    form.name = name.value
    form.date = date.value
    form.description = description.value

    form.post(route('task.store', {

    }));
};

</script>

<template>
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
                        <input class="w-full rounded-md" v-model="name" type="text" name="" id="">
                    </div>
                    <div>
                        <label for="">Task Date</label>
                    </div>
                    <div>
                        <input class="w-full rounded-md" v-model="date" type="date" name="" id="">
                    </div>
                    <div>
                        <label for="">Task Description</label>
                    </div>
                    <div>
                        <textarea class="w-full rounded-md" v-model="description" type="text" name="" id="">

                        </textarea>
                    </div>

                    <div>
                        <button class="w-full bg-purple-300 p-2 rounded-lg" type="submit"
                            @click="saveData">{{ btn_name }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>