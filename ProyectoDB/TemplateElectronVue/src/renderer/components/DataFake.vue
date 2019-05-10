<template>
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Gestión de Pacientes</h1>
    <div>
      <v-flex xs12>
        <v-combobox
          v-model="select"
          :items="hola"
          label="Select a favorite activity or create a new one"
        ></v-combobox>
      </v-flex>
    <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Users">Crear</button>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="crear">CrearF</button>
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
        hola:[],
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
