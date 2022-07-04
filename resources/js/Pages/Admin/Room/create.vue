<template>
    <admin-layout>
        <div class="h-screen w-full flex overflow-hidden">
            <main class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto">
                <div class="mx-10 my-2">
                    <h2 class="my-4 flex flex-row text-4xl font-semibold dark:text-gray-400">
                        <a href="#" class="pr-3 flex content-center" @click="Back">
                            <svg viewBox="0 0 64 64" class="w-7 fill-current" xmlns="http://www.w3.org/2000/svg" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke="#202020" fill="none" d="M3 46h44a15 15 0 0 0 15-15 15 15 0 0 0-15-15H2" data-name="layer2" stroke-linejoin="round"></path>
                                <path d="M16 34L3 46l13 12" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke="#202020" fill="none" data-name="layer1" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <span v-if="this.route().current('admin.room.create')">Creation d'une salles</span>
                        <span v-if="this.route().current('admin.room.edit')">Modifier {{this.room.name}}</span>
                    </h2>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nom :</label>
                                            <input type="text" v-model="this.formRoom.name" v-bind:class="{ error: this.formRoom.errors.name}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formRoom.errors.name" class="mt-2" />
                                        </div>


                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Cinema</label>
                                            <multiselect
                                                   v-model="this.formRoom.cinema_id"
                                                   v-bind:class="{ error: this.formRoom.cinema_id}"
                                                   name="roles"
                                                   :options="this.cinemas"
                                                   valueProp="id"
                                                   :searchable="true"
                                                   trackBy="name"
                                                   label="name"
                                                   :multiple="false"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <jet-input-error :message="this.formRoom.errors.cinema_id" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Nombre maximum des places</label>
                                            <input type="number" v-model="this.formRoom.nb_max_of_person" v-bind:class="{ error: this.formRoom.errors.nb_max_of_person}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formRoom.errors.nb_max_of_person" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Description</label>
                                            <input type="text" v-model="this.formRoom.description" v-bind:class="{ error: this.formRoom.errors.description}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formRoom.errors.description" class="mt-2" />
                                        </div>

                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <jet-action-message :on="this.formRoom.recentlySuccessful" class="mr-3">
                                        Saved.
                                    </jet-action-message>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
	        </main>
        </div>
    </admin-layout>
</template>
<style src="@vueform/multiselect/themes/default.css"></style>

<script>
import JetActionMessage from './../../../Jetstream/ActionMessage'
import JetInputError from './../../../Jetstream/InputError'
import Multiselect from '@vueform/multiselect'
import AdminLayout from '@/Layouts/AdminLayout'
import moment from 'moment'
import Input from '../../../Jetstream/Input.vue'

export default {
    props: {
        room: {
            type: Object,
            // Object or array defaults must be returned from
            // a factory function
            default() {
                return {
                    name: '',
                    nb_max_of_person: 0,
                    description: '',
                    cinema_id: null,
                }
            },
        },
        cinemas: Object,
    },
    components: {
        JetActionMessage,
        JetInputError,
        AdminLayout,
        Multiselect,
        Input
    },
    data () {
        return {
            formRoom: this.$inertia.form({
                        name: this.room.name,
                        nb_max_of_person: this.room.nb_max_of_person,
                        description: this.room.description,
                        cinema_id: this.room.cinema_id,
            })
        }
    },
    methods:{

        Back() {
            window.history.back();
        },

        submit() {
            if(this.route().current('admin.room.create')){
                this.formRoom.post(this.route('admin.room.store'), {
                    preserveScroll: true,
                    onError: () => {
                    },
                    onSuccess: () => {
                    }
                })
            }else{
                this.formRoom.put(this.route('admin.room.update', this.room.id), {
                    preserveScroll: true,
                    onError: () => {
                    },
                    onSuccess: () => {
                    }
                })
            }
        }
    },
}
</script>
<style>
.error{
    border: 1px red solid;
}
</style>
