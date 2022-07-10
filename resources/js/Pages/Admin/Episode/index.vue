<template lang="">
    <admin-layout>
        <div class="h-screen w-full flex overflow-hidden">
            <main class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition duration-500 ease-in-out overflow-y-auto">
                <div class="mx-10 my-2">
                    <h2 class="my-4 text-4xl font-semibold dark:text-gray-400">

                        <span>La liste des films et séries</span>
                    </h2>
                    <div class="pb-2 flex items-center justify-between text-gray-600 dark:text-gray-400 border-b dark:border-gray-600">
                        <!-- Header -->
                        <div>
                        </div>
                        <div>
                            <input type="search" v-model="search" placeholder="Search a user.." class="inline-flex items-center px-3 py-2 my-2 mx-1 rounded-md font-semibold text-xs"/>
                            <button id="add" @click="Add" class="inline-flex items-center px-3 py-2 my-2 mx-1 ml-10 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                Créer un acteur ou réalisateur
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 flex px-4 justify-between text-gray-600 dark:text-gray-400 capitalize">
                    </div>
                <table class="table border w-full">
                <thead>
                    <tr>
                        <th class="border p-3">id</th>
                        <th class="border p-3">titre</th>
                        <th class="border p-3">type</th>
                        <th class="border p-3">categories</th>
                        <th class="border p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="episode in this.episodes" :key="episode.id">
                        <td class="border p-3">
                             <img :src="episode.firstMediaUrl" width="150" height="150" />
                        </td>
                        <td class="border p-3">
                            {{ episode.title }}
                        </td>
                        <td class="border p-3">
                            {{ episode.type }}
                        </td>
                           <td class="border p-3">
                            {{ episode.categories }}
                        </td>
                        <td class="border p-3">
                            <div class="flex space-between">
                                <!-- <span @click="Edit(episode)" class="w-7 bg-yellow-500 text-gray-200 rounded hover:bg-yellow-400 px-1 py-1 focus:outline-none mx-1 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 64 64">
                                        <path data-name="layer1" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M56 2.4l-26.1 26-4 9.7 9.7-4.1 26-26L56 2.4z" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path data-name="layer2" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M34.4 11.6h-32v50h50v-32" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path data-name="layer1" fill="none" stroke="#202020" stroke-miterlimit="10" stroke-width="2" d="M50.8 7.6l5.6 5.6" stroke-linejoin="round" stroke-linecap="round"></path>
                                    </svg>
                                </span> -->
                                <span @click="Delete(episode)" class="w-7 bg-red-500 text-gray-200 rounded hover:bg-red-400 px-1 py-1 focus:outline-none mx-1 cursor-pointer">
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
                </div>
	        </main>
        </div>

    <jet-dialog-modal :show="this.ConfirmDeletion" @close="this.ConfirmDeletion = false">
        <template #title>
           Supprimer une salle
        </template>

        <template #content>
          Voulez-vous vraiment supprimer cette episode? Une fois supprimé, toutes ses ressources et données seront définitivement supprimées.
        </template>

        <template #footer>
            <jet-secondary-button @click="ConfirmDeletion = false">
               Annuler
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="deleteParticipant" :class="{ 'opacity-25': '' }">
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
    props:['episodes'],
    data(){
        return {
                ConfirmDeletion:false,
                participant_id: null,
                formDeleteParticipant: this.$inertia.form({
                    '_method': 'DELETE',
                },{
                    bag: 'deleteUser'
                })
        }
    },
    methods:{
        Add(){
            this.$inertia.visit(route('admin.episode.create'))
        },
        Delete(data){
           this.ConfirmDeletion = true
           this.participant_id = data.id;
        },
        Edit(data){
             this.$inertia.visit(route('admin.participant.edit', data.id))
        },
        deleteParticipant(){

                this.formDeleteParticipant.post(route('admin.episode.destroy', {id: this.participant_id}), {
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
