<template>
  <div>
    
    <form v-on:submit.prevent="saveData">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">No. programa</label>
        <input
          v-model="form.numero"
          :class="{'is-invalid': form.errors.has('numero')}"
          type="text"
          class="form-control"
          @keydown="form.errors.clear('numero')"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Programa</label>
        <input
          v-model="form.programa"
          type="text"
          class="form-control"
        />
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <span class="text-danger pt-3" v-if="form.errors.has('numero')" v-text="form.errors.get('numero')"></span>
    </form>
    <modal-component v-bind:url="url"></modal-component>
    <table class="table mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Número</th>
          <th scope="col">Programa</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="programa in programas" :key="programa.id" class="w-100">
          <td>{{programa.id}}</td>
          <td>{{programa.numero}}</td>
          <td>{{programa.programa}}</td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/programa/'+ programa.id)">Eliminar</a></td>
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
      programas:'',
      form: new Form({
        numero: '',
        programa:'',
        id_eliminar:''
      }),
      url: ''
    }
  },
  components: {
    ModalComponent
  },
  methods:{
    setUrl(url) {
      this.url = url
    },
    getPrograma(){
      axios.get('/api/programa').then((res) =>{
        this.programas = res.data
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
      data.append('programa',this.form.programa)
      console.log(data);
      axios.post('/api/programa',data).then((res)=>{
        this.form.reset()
        this.getPrograma()
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.getPrograma();
    console.log("Component mounted.");
  },
};
</script>
