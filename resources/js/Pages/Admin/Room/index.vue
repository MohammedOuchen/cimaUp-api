<template lang="">
    <admin-layout>
        <div class="h-screen w-full flex overflow-hidden">
            <main class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto">
                <div class="mx-10 my-2">
                    <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">

                        <span>La liste des Salles</span>
                    </h2>
                    <div class="pb-2 flex items-center justify-between text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">
                        <!-- Header -->
                        <div>
                            <!-- <span v-if="route().params['roles'] != 'Mangaka'  && route().params['roles'] != 'Reader'" class="pr-5">
                                <span class="text-red-500 dark:text-red-200">
                                    {{this.users.length}}
                                </span>
                                Total Users
                            </span>
                            <span v-if="route().params['roles'] != 'Reader'" class="pr-5">
                                <span class="text-red-500 dark:text-red-200">
                                    {{this.users.filter(user => user.roles.find(role => role.name == "Mangaka")).length}}
                                </span>
                                Mangakas
                            </span>
                            <span v-if="route().params['roles'] != 'Mangaka'" class="pr-5">
                                <span class="text-red-500 dark:text-red-200">
                                    {{this.users.filter(user => user.roles.find(role => role.name == "Reader")).length}}
                                </span>
                                Readers
                            </span> -->
                        </div>
                        <div>
                            <input type="search" v-model="search" placeholder="Search a user.." class="inline-flex items-center px-3 py-2 my-2 mx-1 rounded-md font-semibold text-xs"/>
                            <button id="add" @click="Add" class="inline-flex items-center px-3 py-2 my-2 mx-1 ml-10 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Créer une salle
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 flex px-4 justify-between text-gray-600 dark:text-gray-400 capitalize">
                        <!-- List sorting -->
                        <!-- <div @click="this.sort == 'asc.id' ? Sort('desc.id') : Sort('asc.id')" class="w-20 flex items-center">
                            <span>id</span>
                            <svg v-if="this.sort == 'asc.id'" class="ml-1 h-5 w-5 fill-current text-red-500 dark:text-red-200" viewBox="0 0 24 24">
                                <path d="M18 21l-4-4h3V7l2 0v10h3M 2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                            </svg>
                            <svg v-else-if="this.sort == 'desc.id'" class="ml-1 h-5 w-5 fill-current text-red-500 dark:text-red-200" viewBox="0 0 24 24">
                                <path d="M17 17V7h-3l4-4l4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>

                            </svg>
                            <svg v-else class="ml-1 h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2 19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
                            </svg>
                        </div> -->
                    </div>
                <table class="table border w-full">
                <thead>
                    <tr>
                        <th class="border p-3">id</th>
                        <th class="border p-3">Nom</th>
                        <th class="border p-3">Cinema</th>
                        <th class="border p-3">Nombre maximum des places</th>
                        <th class="border p-3">Description</th>
                        <th class="border p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="room in this.rooms" :key="room.id">
                        <td class="border p-3">
                             {{ room.id }}
                        </td>
                        <td class="border p-3">
                            {{ room.name }}
                        </td>
                        <td class="border p-3">
                            {{ room.cinema.name }}
                        </td>
                           <td class="border p-3">
                            {{ room.nb_max_of_person }}
                        </td>
                        <td class="border p-3">
                             {{ room.description }}
                        </td>
                        <td class="border p-3">
                            <div class="flex space-between">
                                <span @click="Edit(room)" class="w-7 bg-yellow-500 text-gray-200 rounded hover:bg-yellow-400 px-1 py-1 focus:outline-none mx-1 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 64 64">
                                        <path data-name="layer1" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M56 2.4l-26.1 26-4 9.7 9.7-4.1 26-26L56 2.4z" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path data-name="layer2" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M34.4 11.6h-32v50h50v-32" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path data-name="layer1" fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" d="M50.8 7.6l5.6 5.6" stroke-linejoin="round" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                                <span @click="Delete(room)" class="w-7 bg-red-500 text-gray-200 rounded hover:bg-red-400 px-1 py-1 focus:outline-none mx-1 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 64 64">
                                        <path data-name="layer2" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M6 10h52m-36 0V5.9A3.9 3.9 0 0 1 25.9 2h12.2A3.9 3.9 0 0 1 42 5.9V10m10.5 0l-2.9 47.1a5 5 0 0 1-4.9 4.9H19.3a5 5 0 0 1-4.9-4.9L11.5 10" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path data-name="layer1" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M32 18v36M22 18l2 36m18-36l-2 36" stroke-linejoin="round" stroke-linecap="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <p>{{ categories.to }} | {{ categories.total }}</p>
            <Pagination class="mt-6" :links="categories.links" /> -->

                    <!-- <user-card v-for="user in this.UserList" v-bind:key="user.id" v-bind:user="user"/>
                    <p v-if="this.UserList.length == 0" class="w-auto m-auto text-center">No user to display</p> -->
                </div>
	        </main>
        </div>

    <jet-dialog-modal :show="this.ConfirmDeletion" @close="this.ConfirmDeletion = false">
        <template #title>
           Supprimer une salle
        </template>

        <template #content>
          Voulez-vous vraiment supprimer cette salle? Une fois supprimé, toutes ses ressources et données seront définitivement supprimées.
        </template>

        <template #footer>
            <jet-secondary-button @click="ConfirmDeletion = false">
               Annuler
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="deleteCinema" :class="{ 'opacity-25': '' }">
                Supprimer
            </jet-danger-button>
        </template>
    </jet-dialog-modal>
    </admin-layout>
</template>
<script>

import AdminLayout from '@/Layouts/AdminLayout'
import JetDialogModal from './../../../Jetstream/DialogModal'
import JetDangerButton from './../../../Jetstream/DangerButton'
import JetSecondaryButton from './../../../Jetstream/SecondaryButton'

export default {
    components:{
        AdminLayout,
        JetDialogModal,
        JetSecondaryButton,
        JetDangerButton
    },
    props:['rooms'],
    data(){
        return {
                ConfirmDeletion:false,
                room_id: null,
                deleteRoom: this.$inertia.form({
                    '_method': 'DELETE',
                },{
                    bag: 'deleteUser'
                })
        }
    },
    methods:{
        Add(){
            this.$inertia.visit(route('admin.room.create'))
        },
        Delete(data){
           this.ConfirmDeletion = true
           this.room_id = data.id;
        },
        Edit(data){
             this.$inertia.visit(route('admin.room.edit', data.id))
        },
        deleteCinema(){
                this.deleteRoom.post(route('admin.room.destroy', {id: this.room_id}), {
                        preserveScroll: true,
                        onError: (error) => {
                        },
                        onSuccess: () => {
                            this.ConfirmDeletion = false
                        }
                })
        }
    },
    mounted()
    {

    },

}
</script>
<style lang="">

</style>
