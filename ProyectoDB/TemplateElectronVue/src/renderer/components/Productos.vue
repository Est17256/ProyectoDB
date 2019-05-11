<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Crear Producto</h1>
    <br><br><br><br><br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <label for="nameInput">ID</label>
            <input id="nameInput" type="text" v-model="id" class="form-control" placeholder="ID">
          </b-col>
          <b-col>
            <label for="nameInput">Nombre</label>
            <input id="nameInput" type="text" v-model="nombre" class="form-control" placeholder="Nombre">
          </b-col> 
          <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="selectCat"
                :items="hola"
                label="Categoria"
              ></v-combobox>
            </v-flex>
          </b-col>
          <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="selectMar"
                :items="hola"
                label="Marca"
              ></v-combobox>
            </v-flex>
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
      this.user.forEach(a=>this.hola.push(a.name))
      console.log(this.hola)
    });
   },
    data () {
      return {
        id:'',
        hola:[],
        user:[],
        select: 'Categoria',
      }
  },
  methods:{
    refreshUsers(){
      this.$http.get("http://localhost:8000/users").then(response => {
        this.user = response.data.users;
        this.user.forEach(a=>this.hola.push(a.name))
        console.log(this.hola)
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