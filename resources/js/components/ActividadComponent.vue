<template>
  <div>
    
    <form v-on:submit.prevent="saveData">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">No. Actividad</label>
        <input
          v-model="form.numero"
          :class="{'is-invalid': form.errors.has('numero')}"
          type="text"
          class="form-control"
          @keydown="form.errors.clear('numero')"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Actividad</label>
        <input
          v-model="form.actividad"
          type="text"
          class="form-control"
        />
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <span class="text-danger pt-3" v-if="form.errors.has('numero')" v-text="form.errors.get('numero')"></span>
    </form>
    <modal-component v-bind:url="url" v-bind:nombre_form="nombre_form"></modal-component>
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
        <tr v-for="actividad in actividades" :key="actividad.id" class="w-100">
          <td>{{actividad.id}}</td>
          <td>{{actividad.numero}}</td>
          <td>{{actividad.actividad}}</td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/'+nombre_form +'/'+ actividad.id)">Eliminar</a></td>
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
      actividades:'',
      form: new Form({
        numero: '',
        actividad:'',
        id_eliminar:''
      }),
      url: '',
      nombre_form:''
    }
  },
  components: {
    ModalComponent
  },
  methods:{
    setUrl(url) {
      this.url = url
    },
    getActividad(){
      axios.get('/api/actividad').then((res) =>{
        this.actividades = res.data
      }).catch((error)=>{
        console.log(error)
      })
    },
    eliminarData(){
        
    },
    saveData(){
      console.log("Listo.");
      let data = new FormData();
      data.append('numero',this.form.numero)
      data.append('actividad',this.form.actividad)
      console.log(data);
      axios.post('/api/actividad',data).then((res)=>{
        this.form.reset()
        this.getActividad()
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.getActividad();
    this.nombre_form='actividad';
    console.log("Component mounted.");
  },
};
</script>
