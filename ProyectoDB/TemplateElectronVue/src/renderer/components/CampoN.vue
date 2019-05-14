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
            <input id="nameInput" type="text" v-model="campoN" class="form-control" placeholder="Nuevo Campo">
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
    this.$http.get("http://localhost:8000/users").then(response => {
      this.user = response.data.users;
    });
  },
  data() {
    return {
      id:'',
      campoN:'',
      name:'',
      email:'',
      password:'',
      selected:'',
      user: [],
    };
  },
  methods:{
    refreshUsers(){
      this.$http.get("http://localhost:8000/users").then(response => {
      this.user = response.data.users;
    });
    },
    Crear(){
      this.$http.post(`http://localhost:8000/productos/create?id=${this.id}&nombre=${this.nombre}&categoria=${this.categoria}&marca=${this.marca}`).then(response=>{
      this.id = '';
      this.nombre = '';
      this.categoria = '';
      this.marca = '';
      });
    },
  }
};
</script>
<style>
div#Tabla {
  float: right;
  align-items: center;
}
</style>