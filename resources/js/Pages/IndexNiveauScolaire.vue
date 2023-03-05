
import EditNiveau from './EditNiveau.vue';

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste Niveau Scolaire</h1>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des Niveau Scolaire</h3>
                        <br>
                        <div>
                            <CreateNiveauScolaire />
                        </div>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">

                                <li class="page-item" v-for="link in props.niveauScolaires.links">
                                    <Link class="page-link" :href="link.url">{{ link.label }}</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="niveauScolaire in props.niveauScolaires.data">
                                    <td>{{ niveauScolaire.nom }}</td>
                                    <td>
                                        <button @click=openEditModal(niveauScolaire.id) class="btn btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                        &nbsp;
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <EditNiveau :niveau-scolaire-id="editElementId" :show="showModal" @modal-closed="modalClosed" />
</template>

<script setup>

import CreateNiveauScolaire from './CreateNiveau.vue'
import EditNiveau from './EditNiveau.vue'
import { ref } from 'vue'
const props = defineProps({
    niveauScolaires: Object
})
const editElementId = ref(0)
const showModal = ref(false)
const modalClosed = () => {
    editElementId.value = 0,
        showModal.value = false

}
const openEditModal = (id) => {
    editElementId.value = id,
        showModal.value = true
}
</script>

