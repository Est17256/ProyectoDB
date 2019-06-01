<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Agregar nuevos campos</h1>
    <br><br><br><br><br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <label for="nameInput">ID</label>
            <input id="nameInput" type="text" v-model="id" class="form-control" placeholder="ID">
          </b-col>
          <b-col>
            <label for="nameInput">Nuevo Campo</label>
            <input id="nameInput" type="text" v-model="nombre" class="form-control" placeholder="Nuevo Campo">
          </b-col>
          <b-col>
            <br>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear">Crear</button>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>


<script>
export default {
  mounted() {
    //this.$http.get("http://localhost:8000/opcional").then(response => {
    //this.opcional = response.data.opcional;
    //});
  },
  data() {
    return {
      //id:'',
      nombre:'',
      email:'',
      password:'',
      selected:'',
      user: [],
    };
  },
  methods:{
    Crear(){
     // this.$http.post(`http://localhost:8000/opcional/create?nombre=${this.nombre}`).then(response=>{
     // this.nombre = '';

      this.$http.post(`http://localhost:8000/opcional/create?id=${this.id}&nombre=${this.nombre}`).then(response=>{
      this.id = '';
      this.nombre = '';
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