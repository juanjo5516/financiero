<template>
<div>
    <div class="modal fade" id="modal_subproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suproductos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Subproductos de:
                <table class="table mt-5">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="fila in filas" :key="fila.id" class="w-100">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>
                        <a href="" type="button" class="btn btn-outline-danger">Eliminar</a>
                        
                    </td>
                    </tr>
                </tbody>
                </table>
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
    data() {
        return {
        tabla:'subproducto',
        filas:'1'
        }
    },
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
        },
        getFilas(tabla){
        
        axios.get(`/api/${tabla}`).then((res) =>{
            this.filas = res.data
        }).catch((error)=>{
            console.log(error)
        })
        }
    },
    mounted (){
        console.log('Hola'+this.tabla);
        this.getFilas(this.tabla);
    },
    
}
</script>