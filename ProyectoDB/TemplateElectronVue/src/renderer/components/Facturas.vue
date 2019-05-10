<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Crear Factura</h1>
    <br><br><br><br><br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <label for="nameInput">ID</label>
            <input id="nameInput" type="text" v-model="id" class="form-control" placeholder="ID">
          </b-col> 
          <b-col>
            <label for="nameInput">Fecha</label>
            <input id="nameInput" type="text" v-model="fecha" class="form-control" placeholder="Fecha">
          </b-col>
          <b-col>
            <label for="nameInput">Hora</label>
            <input id="nameInput" type="text" v-model="hora" class="form-control" placeholder="Hora">
          </b-col> 
          <b-col>
            <label for="nameInput">Total</label>
            <input id="nameInput" type="text" v-model="total" class="form-control" placeholder="Total">
          </b-col> 
          <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="selectClie"
                :items="hola"
                label="Categoria"
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
    });
  },
  data() {
    return {
      picked: "",
      nombre:'',
      id:'',
      name:'',
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
      this.$http.get("http://localhost:8000/users").then(response => {
      this.user = response.data.users;
    });
    },
    eliminar(){
      this.errorName = false;
      this.errorDPI = false;
      this.errorEmail = false;
      this.errorPassword = false;
      this.errorTipoUsuario = false;

      if(this.id === ''){
        this.errorDPI = true;
      }else{
        this.errorDPI = false;
      }
      if(this.id != ''){
      this.$http.delete(`http://localhost:8000/users/destroy?id=${this.id}`).then(response=>{
        this.refreshUsers();
        this.name = '';
        this.id = '';
        this.email = '';
        this.password = '';
        this.selected = null;
      });
      }
    },
    crear(){
      this.errorName = false;
      this.errorDPI = false;
      this.errorEmail = false;
      this.errorPassword = false;
      this.errorTipoUsuario = false;
      this.errorFormato = false;
      this.errorLargo = false;

      if(this.name === ''){
        this.errorName = true;
      }else{
        this.errorName = false;
      }

      if(this.id === ''){
        this.errorDPI = true;
      }else{
        this.errorDPI = false;
      }

      if(this.email === ''){
        this.errorEmail = true;
      }else{
        this.errorEmail = false;
      }

      if(this.password === ''){
        this.errorPassword = true;
      }else{
        this.errorPassword = false;
      }

      if(this.selected == null){
        this.errorTipoUsuario = true;
      }else{
        this.errorTipoUsuario = false;
      }

      if(this.name != '' && this.id != '' && this.password != '' && this.email != '' && this.selected != null){
        this.$http.post(`http://localhost:8000/users/create?id=${this.id}&name=${this.name}&email=${this.email}&password=${this.password}`).then(response=>{
          this.refreshUsers();
          this.name = '';
          this.id = '';
          this.email = '';
          this.password = '';
          this.selected = null;
        }).catch(error => {
          if (error.response.data.email === undefined){
            this.errorFormato = false;
          }else{
            this.errorFormato = true;
          }

          if (error.response.data.password === undefined){
            this.errorLargo = false;
          }else{
            this.errorLargo = true;
          }
        });
      }
    },
    modificar(){
      this.errorName = false;
      this.errorDPI = false;
      this.errorEmail = false;
      this.errorPassword = false;
      this.errorTipoUsuario = false;
      this.errorFormato = false;
      this.errorLargo = false;

      if(this.name === ''){
        this.errorName = true;
      }else{
        this.errorName = false;
      }

      if(this.id === ''){
        this.errorDPI = true;
      }else{
        this.errorDPI = false;
      }

      if(this.email === ''){
        this.errorEmail = true;
      }else{
        this.errorEmail = false;
      }

      if(this.password === ''){
        this.errorPassword = true;
      }else{
        this.errorPassword = false;
      }

      if(this.selected == null){
        this.errorTipoUsuario = true;
      }else{
        this.errorTipoUsuario = false;
      }

      if(this.name != '' && this.id != '' && this.password != '' && this.email != '' && this.selected != null){
        this.$http.put(`http://localhost:8000/users/update?id=${this.id}&name=${this.name}&email=${this.email}&password=${this.password}`).then(response=>{
          this.refreshUsers();
          this.name = '';
          this.id = '';
          this.email = '';
          this.password = '';
          this.selected = null;
        }).catch(error => {
          if (error.response.data.email === undefined){
            this.errorFormato = false;
          }else{
            this.errorFormato = true;
          }

          if (error.response.data.password === undefined){
            this.errorLargo = false;
          }else{
            this.errorLargo = true;
          }
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