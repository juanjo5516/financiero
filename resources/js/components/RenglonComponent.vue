<template>
  <div>
    
    <form v-on:submit.prevent="saveData">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">No. Renglón</label>
        <input
          v-model="form.numero"
          :class="{'is-invalid': form.errors.has('numero')}"
          type="text"
          class="form-control"
          @keydown="form.errors.clear('numero')"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Renglón</label>
        <input
          v-model="form.renglon"
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
          <th scope="col">Renglón</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="renglon in renglones" :key="renglon.id" class="w-100">
          <td>{{renglon.id}}</td>
          <td>{{renglon.numero}}</td>
          <td>{{renglon.renglon}}</td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/'+nombre_form +'/'+ renglon.id)">Eliminar</a></td>
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
      renglones:'',
      form: new Form({
        numero: '',
        renglon:'',
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
    getRenglon(){
      axios.get('/api/renglon').then((res) =>{
        this.renglones = res.data
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
      data.append('renglon',this.form.renglon)
      console.log(data);
      axios.post('/api/renglon',data).then((res)=>{
        this.form.reset()
        this.getRenglon()
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.getRenglon();
    this.nombre_form='renglon';
    console.log("Component mounted.");
  },
};
</script>
