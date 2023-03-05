<template>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Creer
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Creer Niveau Scolaire</h5>
                    <button type="button" class="close" @click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="soumettre" id="CreateForm">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" required class="form-control" id="nom" v-model="nomNiveauScolaire"
                                :class="{ 'is-invalid': nomEror != '' }">
                            <div class="invalid-feedback">
                                {{ nomEror }}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal">Fermer</button>
                    <button form="CreateForm" type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>

import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'



const nomNiveauScolaire = ref('')
const nomEror = ref('')
let createModal = ""

onMounted(() => {
    createModal = $('#exampleModal')
})

const closeModal = () => {
    createModal.modal('hide')
    nomNiveauScolaire.value = ''
}

const soumettre = () => {
    const nom = nomNiveauScolaire.value
    const url = route('niveauscolaire.store')
    Inertia.post(url, { nom }, {
        onSuccess: () => {
            closeModal()
        },
        onError: (errors) => {
            nomEror.value = errors.nom
        }
    })

}
</script>






