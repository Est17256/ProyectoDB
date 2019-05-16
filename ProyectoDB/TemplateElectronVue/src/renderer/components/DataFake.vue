<template>
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Generar Datos Falsos</h1>
    <div>
      <label for="nameInput">ID</label>
      <input id="nameInput" type="date" v-model="id" class="form-control" placeholder="ID">
    <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="fecha2">Fecha</button>
    </b-col>
    </div>
  </div>
</template>


<script>
export default {
    data () {
      return {
        id:'',
        fecha:'',
        hola:[],
        categoria: [],
        user:[],
        select: 'Programming',
      }
    },
    methods: {
        fecha2(){
          this.$http.get("http://localhost:8000/categoriasF2").then(response => {
            this.categoria = response.data.categorias;
            console.log(this.categoria);
          });
        }
      }     
};
</script>
<style>
div#Tabla {
  float: right;
  align-items: center;
}
</style>
