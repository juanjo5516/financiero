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
    <div class="w-25">
      <div v-for="programa in programas" :key="programa.id" class="w-100">
        {{programa.numero}}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      programas:'',
      form: new Form({
        numero: '',
        programa:''
      })
    }
  },
  methods:{
    getPrograma(){
      axios.get('/api/programa').then((res) =>{
        this.programas = res.data
      }).catch((error)=>{
        console.log(error)
      })
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
