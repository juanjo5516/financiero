<template>
  <div>
    
    <form v-on:submit.prevent="">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Programa</label>
        <select class="form-control" v-model="programa">
            <option 
                v-for="fila in filasPrograma"
                v-bind:value="fila.programa"
                v-bind:key="fila.id"
            >
            {{ fila.programa }}
            </option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Actividad</label>
        <select class="form-control" v-model="actividad">
            <option 
                v-for="fila in filasActividad"
                v-bind:value="fila.actividad"
                v-bind:key="fila.id"
            >
            {{ fila.actividad }}
            </option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <span class="text-danger pt-3"></span>
    </form>
    <modal-component></modal-component>
    <table class="table mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Número</th>
          <th scope="col">Actividad</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr class="w-100">
          <td></td>
          <td></td>
          <td></td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar"></a></td>
        </tr>
      </tbody>
    </table>
    
  </div>
</template>

<script>
import ModalComponent from './ModalComponent.vue';
export default {
  data() {
    return {
        programa:'',
        actividad:'',
        filasPrograma:[],
        filasActividad:[]

    }
  },
  components: {
    ModalComponent
  },
    methods:{
        getFilasPrograma(tabla){
            this.filasPrograma='',
            axios.get(`/api/${tabla}`).then((res) =>{
            this.filasPrograma = res.data
            }).catch((error)=>{
            console.log(error)
            })
        },
        getFilasActividad(tabla){
            this.filasActividad='',
            axios.get(`/api/${tabla}`).then((res) =>{
            this.filasActividad = res.data
            }).catch((error)=>{
            console.log(error)
            })
        }
    },
    created() {
        this.getFilasPrograma('programa')
        this.getFilasActividad('actividad')
        console.log('Created')
    },

  
  
};
</script>
