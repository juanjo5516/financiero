<template>
<div>
    <div class="modal fade" id="modal_eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar este Registro?
                <span>{{url}}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button class="btn btn-primary" v-on:click="borrar">Si</button>
            </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: ['url','nombre_form'],
    methods: {
        borrar() {
            axios.delete(this.url)
            .then(response => {
                location.href="/catalogos/llenado"
            })
            .cath(error => {
                console.log(error)
                alert('ocurrió un error.')
            })
        }
    }
}
</script>