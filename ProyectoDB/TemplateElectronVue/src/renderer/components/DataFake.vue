<template>
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Generar Datos Falsos</h1>
    <div>
      <label for="nameInput">ID</label>
      <input id="nameInput" type="date" v-model="id" class="form-control" placeholder="ID">
    <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Users">Users</button>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="crear">crear</button>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="fecha2">Fecha</button>
    </b-col>
    </div>
  </div>
</template>


<script>
export default {
  mounted() {
    this.$http.get("http://localhost:8000/users/Faker").then(response => {
      this.user = response.data.users;
      this.user.forEach(a=>this.hola.push(a.name))
      console.log(this.hola)
    });
  },
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
        refreshUsers(){
         this.$http.get("http://localhost:8000/users/Faker").then(response => {
          this.user = response.data.users;
          this.user.forEach(a=>this.hola.push(a.name))
          console.log(this.hola)
          });
        },
        Users(){
          this.$http.get("http://localhost:8000/users/Faker").then(response => {
            this.user = response.data.users;
            this.user.forEach(a=>this.hola.push(a.name))
            console.log(this.hola)});
          },
        crear(){
           this.$http.post("http://localhost:8000/users/createFaker").then(response => {
           this.refreshUsers();
           console.log(this.id)});
          },
        fecha2(){
          this.$http.get("http://localhost:8000/categoriasF").then(response => {
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
