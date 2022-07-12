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
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">title :</label>
                                            <input type="text" v-model="this.formOffers.title" v-bind:class="{ error: this.formOffers.errors.title}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formOffers.errors.title" class="mt-2" />
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prix (euros):</label>
                                            <input type="number" v-model="this.formOffers.price_in_cent" v-bind:class="{ error: this.formOffers.errors.price_in_cent}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formOffers.errors.price_in_cent" class="mt-2" />
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Jour :</label>
                                            <input type="date" v-model="this.formOffers.date" v-bind:class="{ error: this.formOffers.errors.date}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formOffers.errors.date" class="mt-2" />
                                        </div>
                                             <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Time :</label>
                                            <input type="time" v-model="this.formOffers.day" v-bind:class="{ error: this.formOffers.errors.day}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formOffers.errors.day" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Rooms</label>
                                            <multiselect
                                                   v-model="this.formOffers.room_id"
                                                   v-bind:class="{ error: this.formOffers.room_id}"
                                                   name="roles"
                                                   :options="this.rooms"
                                                   valueProp="id"
                                                   :searchable="true"
                                                   trackBy="name"
                                                   label="name"
                                                   :multiple="false"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <jet-input-error :message="this.formOffers.errors.room_id" class="mt-2" />
                                        </div>


                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Episodes</label>
                                            <multiselect
                                                   v-model="this.formOffers.episode_id"
                                                   v-bind:class="{ error: this.formOffers.episode_id}"
                                                   name="roles"
                                                   :options="this.episodes"
                                                   valueProp="id"
                                                   :searchable="true"
                                                   trackBy="title"
                                                   label="title"
                                                   :multiple="false"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <jet-input-error :message="this.formOffers.errors.room_id" class="mt-2" />
                                        </div>

                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <jet-action-message :on="this.formOffers.recentlySuccessful" class="mr-3">
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
        offer: {
            type: Object,
            // Object or array defaults must be returned from
            // a factory function
            default() {
                return {
                    title: '',
                    date: '',
                    day: '',
                    price_in_cent: '',
                    room_id: 0,
                    episode_id: 0,
                }
            },
        },
         rooms: Object,
         episodes: Object,
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
            formOffers: this.$inertia.form({
                        title: this.offer.title,
                        day: this.offer.day,
                        date: this.offer.date,
                        price_in_cent: this.offer.price_in_cent,
                        room_id: this.offer.room_id,
                        episode_id: this.offer.episode_id,
            }),
        }
    },
    methods:{

        Back() {
            window.history.back();
        },

        submit() {
            if(this.route().current('admin.offer.create')){
                this.formOffers.post(this.route('admin.offer.store'), {
                    preserveScroll: true,
                    onError: () => {
                    },
                    onSuccess: () => {
                    }
                })
            }else{
                this.formOffers.put(this.route('admin.offer.update', this.participant.id), {
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
