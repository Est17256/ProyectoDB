<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Creaciones Varias</h1>
    <br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <v-data-table :headers="headersMar" :items="marca" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.nombre }}</td>
              </template>
            </v-data-table>
          </b-col>
          <b-col>
            <v-data-table :headers="headersCat" :items="categoria" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.nombre }}</td>
              </template>
            </v-data-table>
          </b-col>
          <b-col>
            <v-data-table :headers="headersCli" :items="cliente" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.nombre }}</td>
              </template>
            </v-data-table>
          </b-col>
        </b-row>
      </b-container>
    </div>
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
    this.$http.get("http://localhost:8000/categorias").then(response => {
      this.categoria = response.data.categorias;
    });
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marca = response.data.marcas;
    });
    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.cliente = response.data.clientes;
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
      marca: [],
      cliente: [],
      categoria: [],
      headersMar: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "Marca", align: "center",sortable: false, value: "Marca" }
      ],
      headersCat: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "Categoria", align: "center",sortable: false, value: "Categoria" }
      ],
      headersCli: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "Cliente", align: "center",sortable: false, value: "Cliente" }
      ]
    };
  },
  methods:{
    refreshUsers(){
      this.$http.get("http://localhost:8000/categorias").then(response => {
      this.categoria = response.data.categorias;
    });
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marca = response.data.marcas;
    });
    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.cliente = response.data.clientes;
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
        this.refreshUsers();
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