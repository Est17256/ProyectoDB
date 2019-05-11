<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Creaciones Varias</h1>
    <br><br><br><br><br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <label for="levelInput">Tipo de usuario</label>
                <b-form-select id="levelInput" v-model="selected" class="mb-3">
                  <option value="Marca">Marca</option>
                  <option value="Categoria">Categoria</option>
                  <option value="Cliente">Cliente</option>
                </b-form-select>
          </b-col>
          <b-col>
            <label for="nameInput">ID</label>
            <input id="nameInput" type="text" v-model="id" class="form-control" placeholder="ID">
          </b-col> 
          <b-col>
            <label for="nameInput">Nombre</label>
            <input id="nameInput" type="text" v-model="nombre" class="form-control" placeholder="Nombre">
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
    this.$http.get("http://localhost:8000/datosVarios").then(response => {
      this.user = response.data.users;
    });
  },
  data() {
    return {
      picked: "",
      id:'',
      nombre:'',
      email:'',
      password:'',
      selected:'',
      user: [],
      headers: [
        { text: "ID", align: "center", value: "ID" },
        { text: "Nombre", align: "center", value: "Nombre" },
        { text: "Correo", align: "center", value: "Correo" },
        { text: "DPI", align: "center", value: "DPI" }
      ]
    };
  },
  methods:{
    refreshUsers(){
      this.$http.get("http://localhost:8000/datosVarios").then(response => {
        this.user = response.data.users;
      });
    },
    Crear(){
      if (this.selected=="Categoria") {
        this.$http.post(`http://localhost:8000/categorias/create?id=${this.id}&nombre=${this.nombre}`).then(response=>{
        this.refreshUsers();
        this.id = '';
        this.nombre = '';
        });
      }
      if (this.selected=="Marca") {
        this.$http.post(`http://localhost:8000/marcas/create?id=${this.id}&nombre=${this.nombre}`).then(response=>{
        this.refreshUsers();
        this.id = '';
        this.nombre = '';
        });
      }
      if (this.selected=="Cliente") {
        this.$http.post(`http://localhost:8000/clientes/create?id=${this.id}&nombre=${this.nombre}`).then(response=>{
        //this.refreshUsers();
        this.id = '';
        this.nombre = '';
        });
      }
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