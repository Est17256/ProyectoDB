<template>
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Generar Datos Falsos</h1>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <label for="nameInput">Fecha</label>
            <input id="nameInput" type="date" v-model="fecha" class="form-control" placeholder="Fecha">
            <br><br><br>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="fecha2">Fecha</button>
          </b-col>
        </b-row>
      </b-container>
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
          this.$http.post(`http://localhost:8000/categoriasFa?fecha=${this.fecha}`).then(response => {
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
