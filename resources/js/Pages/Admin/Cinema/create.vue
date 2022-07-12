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
                        <span v-if="this.route().current('admin.cinema.create')">Creation d'un cinema</span>
                        <span v-if="this.route().current('admin.users.edit')">{{this.users.username}}’s modification</span>
                    </h2>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nom :</label>
                                            <input type="text" v-model="this.formCinema.name" v-bind:class="{ error: this.formCinema.errors.name}" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.name" class="mt-2" />
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Statut :</label>
                                            <div class="flex justify-center">
                                            <div>
                                                <div class="form-check">
                                                <input  v-model="this.formCinema.active" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                                    Active
                                                </label>
                                                </div>
                                            </div>
                                            </div>
                                            <jet-input-error :message="this.formCinema.errors.active" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Owner</label>

                                            <multiselect
                                                   v-model="this.formCinema.user_id"
                                                   v-bind:class="{ error: this.formCinema.errors.user_id}"
                                                   name="roles"

                                                   :options="this.partners"
                                                   valueProp="id"
                                                   :searchable="true"
                                                   trackBy="last_name"
                                                   label="last_name"
                                                   :multiple="false"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            />

                                            <jet-input-error :message="this.formCinema.errors.user_id" class="mt-2" />
                                        </div>

                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Photo :</label>
                                            <input
                                                type="file"
                                                ref="photo"
                                                name="name"
                                                id="name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            >
                                        </div>


                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Adresse</label>
                                            <input type="text" v-model="this.formCinema.address" v-bind:class="{ error: this.formCinema.errors.address}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.address" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-3">
                                            <label for="username" class="block text-sm font-medium text-gray-700">adresse supplémentaire</label>
                                            <input type="text" v-model="this.formCinema.additional_address" v-bind:class="{ error: this.formCinema.errors.additional_address}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.additional_address" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Pays</label>
                                            <input type="text" v-model="this.formCinema.country" v-bind:class="{ error: this.formCinema.errors.country}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.country" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Ville</label>
                                            <input type="text" v-model="this.formCinema.city" v-bind:class="{ error: this.formCinema.errors.city}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.city" class="mt-2" />
                                        </div>


                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="username" class="block text-sm font-medium text-gray-700">Code postale</label>
                                            <input type="text" v-model="this.formCinema.post_code" v-bind:class="{ error: this.formCinema.errors.post_code}" name="username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formCinema.errors.post_code" class="mt-2" />
                                        </div>

                                         <!--  <div class="col-span-2 sm:col-span-2">
                                            <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                                            <input type="date" v-model="this.formUser.birthday" v-bind:class="{ error: this.formUser.errors.birthday}" name="birthday" id="birthday" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formUser.errors.birthday" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                            <input type="email" v-model="this.formUser.email" v-bind:class="{ error: this.formUser.errors.email}" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formUser.errors.email" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-4">
                                            <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                                            <multiselect v-model="this.formUser.roles" v-bind:class="{ error: this.formUser.errors.roles}" name="roles" mode="tags" :options="this.roles" valueProp="id" :searchable="true" trackBy="name" label="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                            <jet-input-error :message="this.formUser.errors.roles" class="mt-2" />
                                        </div>

                                        <div class="col-span-4 sm:col-span-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                            <input type="password" v-model="this.formUser.password" v-bind:class="{ error: this.formUser.errors.password}" name="password" id="password" ref="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            <jet-input-error :message="this.formUser.errors.password" class="mt-2" />
                                        </div>
                                        <div class="col-span-4 sm:col-span-4">
                                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password confirmation</label>
                                            <input type="password" v-model="this.formUser.password_confirmation" v-bind:class="{ error: this.formUser.errors.password}" name="password_confirmation" id="password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div> -->
                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <jet-action-message :on="this.formCinema.recentlySuccessful" class="mr-3">
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
        cinema: {
            type: Object,
            // Object or array defaults must be returned from
            // a factory function
            default() {
                return {
                    name: '',
                    address: '',
                    additional_address: '',
                    post_code:'',
                    city: '',
                    country: '',
                    active: null,
                    user_id: null,
                }
            },
        },
        partners: Object,
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
            formCinema: this.$inertia.form({
                        name: this.cinema.name,
                        address: this.cinema.address,
                        additional_address: this.cinema.additional_address,
                        post_code: this.cinema.post_code,
                        city:  this.cinema.city,
                        country: this.cinema.country,
                        active: this.cinema.active,
                        user_id: this.cinema.user_id,
                        image: null,
                })
        }
    },
    methods:{
        Back() {
            window.history.back();
        },
        //date configuration with moment.js
        configDateTime(date) {
            return moment(date).locale("fr").format("Do MMM YYYY");
        },
        submit() {
            if(this.route().current('admin.cinema.create')){

                if (this.$refs.photo) {
                    this.formCinema.image = this.$refs.photo.files[0];
                }
                this.formCinema.post(this.route('admin.cinema.store'), {
                    preserveScroll: true,
                    onError: () => {
                    },
                    onSuccess: () => {
                    }
                })
            }
            // else if(this.route().current('admin.users.edit')){
            //     var tempBirthday = this.formUser.birthday
            //     this.formUser.birthday = new Date(this.formUser.birthday)
            //     if (!isNaN(this.formUser.birthday)){
            //         this.formUser.birthday = tempBirthday
            //     }
            //     this.formUser.put(this.route('admin.users.update', {id: this.users.id}), {
            //         preserveScroll: true,
            //         onError: () => {
            //             this.formUser.birthday = tempBirthday
            //             if(this.formUser.errors.password){
            //                 this.formUser.password = '';
            //                 this.formUser.password_confirmation = '';
            //                 this.$refs.password.focus()
            //             }
            //         },
            //         onSuccess: () => {
            //             this.formUser.password = '';
            //             this.formUser.password_confirmation = '';
            //         }
            //     })
            // }
        }
    },
}
</script>
<style>
.error{
    border: 1px red solid;
}
</style>
