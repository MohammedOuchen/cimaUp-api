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
                        <span v-if="this.route().current('admin.room.create')">Creation d'un acteur ou réalisateur</span>
                        <span v-if="this.route().current('admin.room.edit')">Modifier {{this.room.name}}</span>
                    </h2>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom :</label>
                                            <input type="text" v-model="this.formParticipant.first_name" v-bind:class="{ error: this.formParticipant.errors.first_name}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formParticipant.errors.first_name" class="mt-2" />
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nom :</label>
                                            <input type="text" v-model="this.formParticipant.last_name" v-bind:class="{ error: this.formParticipant.errors.last_name}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formParticipant.errors.last_name" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Role :</label>
                                            <multiselect
                                                   v-model="this.formParticipant.type"
                                                   v-bind:class="{ error: this.formParticipant.type}"
                                                   name="roles"
                                                   :options="this.roles"
                                                   valueProp="name"
                                                   :searchable="true"
                                                   trackBy="name"
                                                   label="name"
                                                   :multiple="false"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <jet-input-error :message="this.formParticipant.errors.type" class="mt-2" />
                                        </div>

                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <jet-action-message :on="this.formParticipant.recentlySuccessful" class="mr-3">
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
        participant: {
            type: Object,
            // Object or array defaults must be returned from
            // a factory function
            default() {
                return {
                    first_name: '',
                    last_name: '',
                    type: 0,
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
            formParticipant: this.$inertia.form({
                        first_name: this.participant.first_name,
                        last_name: this.participant.last_name,
                        type: this.participant.type

            }),
            roles: [
                {
                    "name": "actor",
                },
                {
                    "name": "director"
                }
            ]
        }
    },
    methods:{

        Back() {
            window.history.back();
        },

        submit() {
            if(this.route().current('admin.participant.create')){
                this.formParticipant.post(this.route('admin.participant.store'), {
                    preserveScroll: true,
                    onError: () => {
                    },
                    onSuccess: () => {
                    }
                })
            }else{
                this.formParticipant.put(this.route('admin.participant.update', this.participant.id), {
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
