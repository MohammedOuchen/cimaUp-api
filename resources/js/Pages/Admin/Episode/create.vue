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
                        <span v-if="this.route().current('admin.episode.create')">Creation d'un épisode</span>
                        <span v-if="this.route().current('admin.room.edit')">Modifier {{this.episode.title}}</span>
                    </h2>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                         <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Titre :</label>
                                            <input type="text" v-model="this.formEpisode.title" v-bind:class="{ error: this.formEpisode.errors.title}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.title" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Type :</label>
                                            <multiselect
                                                    v-model="this.formEpisode.type"
                                                    v-bind:class="{ error: this.formEpisode.type}"
                                                    name="roles"
                                                    :options="this.types"
                                                    valueProp="name"
                                                    :searchable="true"
                                                    trackBy="name"
                                                    label="name"
                                                    :multiple="false"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />
                                            <jet-input-error :message="this.formEpisode.errors.type" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Description :</label>
                                            <textarea  v-model="this.formEpisode.description" v-bind:class="{ error: this.formEpisode.errors.description}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" ></textarea>
                                            <jet-input-error :message="this.formEpisode.errors.description" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Categories :</label>
                                            <input type="text" v-model="this.formEpisode.categories" v-bind:class="{ error: this.formEpisode.errors.categories}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.categories" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Durée :</label>
                                            <input type="time" v-model="this.formEpisode.duration" v-bind:class="{ error: this.formEpisode.errors.duration}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.duration" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Évolution :</label>
                                            <input type="number" max="5" min="0" v-model="this.formEpisode.evaluation" v-bind:class="{ error: this.formEpisode.errors.evaluation}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.evaluation" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Numéro de série :</label>
                                            <input type="number" max="5" min="0" v-model="this.formEpisode.serial_number" v-bind:class="{ error: this.formEpisode.errors.serial_number}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.serial_number" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Numéro saison :</label>
                                            <input type="number" max="5" min="0" v-model="this.formEpisode.season_number" v-bind:class="{ error: this.formEpisode.errors.season_number}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formEpisode.errors.season_number" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Photo :</label>
                                            <input
                                                type="file"
                                                ref="photo"
                                                v-bind:class="{ error: this.formEpisode.errors.season_number}"
                                                name="name"
                                                id="name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            >
                                            <jet-input-error :message="this.formEpisode.errors.season_number" class="mt-2" />
                                        </div>


                                        <!--
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">Description :</label>
                                                <input type="text" v-model="this.formEpisode.description" v-bind:class="{ error: this.formEpisode.errors.description}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <jet-input-error :message="this.formEpisode.errors.description" class="mt-2" />
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">Nom :</label>
                                                <input type="text" v-model="this.formParticipant.last_name" v-bind:class="{ error: this.formParticipant.errors.last_name}" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <jet-input-error :message="this.formParticipant.errors.last_name" class="mt-2" />
                                            </div>
                                        -->

                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <jet-action-message :on="this.formEpisode.recentlySuccessful" class="mr-3">
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
        episode: {
            type: Object,
            // Object or array defaults must be returned from
            // a factory function
            default() {
                return {
                    title: '',
                    type: '',
                    subtitle: '',
                    description: '',
                    categories: '',
                    duration: 0,
                    evaluation: 0,
                    serial_number: 0,
                    season_number: 0,
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
            formEpisode: this.$inertia.form({
                    title: this.episode.title,
                    type: this.episode.type,
                    subtitle: this.episode.subtitle,
                    description: this.episode.description,
                    categories: this.episode.categories,
                    duration: this.episode.duration,
                    evaluation: this.episode.evaluation,
                    serial_number: this.episode.serial_number,
                    season_number: this.episode.season_number,
                    image: null,
            }),
            types: [
                {
                    "name": "movies"
                },
                {
                    "name": "series"
                },
            ]
        }
    },
    methods:{

        Back() {
            window.history.back();
        },

        submit() {
            if(this.route().current('admin.episode.create')){

            if (this.$refs.photo) {
                this.formEpisode.image = this.$refs.photo.files[0];
            }

            this.formEpisode.post(this.route('admin.episode.store'), {
                preserveScroll: true,
                onError: () => {
                },
                onSuccess: () => {
                }
            })
            }else{
                // this.formEpisode.put(this.route('admin.episode.update', this.participant.id), {
                //     preserveScroll: true,
                //     onError: () => {
                //     },
                //     onSuccess: () => {
                //     }
                // })
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
