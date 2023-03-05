<template>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"> Edit Niveau Scolaire " {{ editNomScolaire.nom }}" </h5>
                    <button type="button" class="close" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="editForm" @submit.prevent="soumettre">

                        <div class="form-group">
                            <label for="nom">Nom</label>

                            <input type="text" class="form-control" id="nom" v-model="editNomScolaire.nom"
                                :class="{ 'is-invalid': editNomScolaire.nomEror != '' }">
                        </div>
                        <div class="invalid-feedback">
                            {{ editNomScolaire.nomEror }}
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal">Fermer</button>
                    <button form="editForm" type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>

import { Inertia } from '@inertiajs/inertia';
import { reactive, watch } from 'vue'

const emit = defineEmits(['modalClosed'])

const props = defineProps({
    niveauScolaireId: {
        type: Number,
        required: true
    },
    show: {
        type: Boolean,
        required: false
    }

})


const editNomScolaire = reactive({
    id: '',
    nom: '',
    nomEror: '',
})

const soumettre = () => {
    Inertia.put(route('niveauscolaire.update', { niveauScolaire: props.niveauScolaireId }),
        {
            nom: editNomScolaire.nom,
        },
        {
            onSuccess: () => {
                alert('success')
                closeModal()
            },
            onError: (error) => {
                editNomScolaire.nomEror = error.nom
            }

        }

    )

}



const openModal = () => {

    $('#editModal').modal('show')
    getNiveauScolaireById()

}

const closeModal = () => {
    $('#editModal').modal('hide')
    emit('modalClosed')
}

const getNiveauScolaireById = () => {
    axios.get(route('niveauscolaire.edit', { niveauScolaire: props.niveauScolaireId }))
        .then((response) => {
            editNomScolaire.id = response.data.niveauScolaire.id
            editNomScolaire.nom = response.data.niveauScolaire.nom
        })
        .catch((error) => {

        })

}

watch(() => props.show, (newVal, oldVal) => {
    if (newVal) {
        openModal()

    } else {
        closeModal()
    }
})



</script>
