<template>
  <div>
    
    <form v-on:submit.prevent="saveData()">
        <div class="col-md-4 mb-3">
            <span>Seleccione Tabla:</span>
            <select class="form-control" v-model="nombre_tabla">
                <option 
                    v-for="tabla in tablas"
                    v-bind:value="tabla.nombre_tabla"
                    v-bind:key="tabla.titulo"
                >
                {{ tabla.titulo}}
                </option>
            </select>
        </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Código</label>
        <input
          v-model="form.numero"
          :class="{'is-invalid': form.errors.has('numero')}"
          type="text"
          class="form-control"
          @keydown="form.errors.clear('numero')"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre</label>
        <input
          v-model="form.programa"
          type="text"
          class="form-control"
        />
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <span class="text-danger pt-3" v-if="form.errors.has('numero')" v-text="form.errors.get('numero')"></span>
    </form>

    <modal-component v-bind:url="url" v-bind:nombre_form="nombre_form"></modal-component>
    <modal-subproducto-component></modal-subproducto-component>
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
          <td>{{fila.id}}</td>
          <td>{{fila.numero}}</td>
          <td>{{imprimirColumn(fila)}}</td>
          <td>
            <a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/'+nombre_tabla+'/'+ fila.id)">Eliminar</a>
            <a v-if="nombre_tabla==='producto'" href="" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal_subproducto">Categorías</a>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
</template>

<script>
import ModalComponent from './ModalComponent.vue';
import ModalSubproductoComponent from './ModalSubproductoComponent.vue';
export default {
  data() {
    return {
      programas:'',
      form: new Form({
        numero: '',
        programa:'',
        id_eliminar:''
      }),
      url: '',
      nombre_tabla:'',
      filas:'',
      nombre_columna:'',
      nombre_form:'',
      tablas:[
          {titulo:'Entidad',nombre_tabla: 'entidad'},
          {titulo:'Unidad Ejecutora',nombre_tabla: 'unidad_ejecutora'},
          {titulo:'Programa',nombre_tabla: 'programa'},
          {titulo:'Actividad',nombre_tabla: 'actividad'},
          {titulo:'Centro de Costo',nombre_tabla: 'centro_costo'},
          {titulo:'Producto',nombre_tabla: 'producto'},
          {titulo:'Fuente',nombre_tabla: 'fuente'},
          {titulo:'Renglón',nombre_tabla: 'renglon'},
      ]
    }
  },
  components: {
    ModalComponent,
    ModalSubproductoComponent
  },
  watch:{
      nombre_tabla (){
          this.getFilas(this.nombre_tabla);
      }
  },
  methods:{
      imprimirColumn(fila) {
          if(this.nombre_tabla == 'programa') {
              return fila.programa
          }
          if(this.nombre_tabla == 'actividad') {
              return fila.actividad
          }
          if(this.nombre_tabla == 'entidad') {
              return fila.entidad
          }
          if(this.nombre_tabla == 'unidad_ejecutora') {
              return fila.unidad_ejecutora
          }
          if(this.nombre_tabla == 'centro_costo') {
              return fila.centro_costo
          }
          if(this.nombre_tabla == 'fuente') {
              return fila.fuente
          }
          if(this.nombre_tabla == 'renglon') {
              return fila.renglon
          }
          if(this.nombre_tabla == 'producto') {
              return fila.producto
          }
      },
    setUrl(url) {
      this.url = url
    },
    getFilas(tabla){
        this.filas='',
      axios.get(`/api/${tabla}`).then((res) =>{
        this.filas = res.data
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
      data.append(this.nombre_tabla,this.form.programa)
      console.log(data);
      axios.post(`/api/${this.nombre_tabla}`,data).then((res)=>{
        this.form.reset()
        this.getFilas(this.nombre_tabla)
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.nombre_form=this.nombre_tabla;
    console.log("Component mounted.");
  },
};
</script>
