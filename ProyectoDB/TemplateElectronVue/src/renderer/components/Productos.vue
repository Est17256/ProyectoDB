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
            <label for="nameInput">Categoria</label>
            <input id="nameInput" type="text" v-model="categoria" class="form-control" placeholder="Categoria">
            <v-flex xs12>
              <v-combobox
                v-model="selectCat"
                :items="hola"
                label="Categoria"
              ></v-combobox>
              <br><br><br><br><br><br><br><br><br>
             <div class="auto" id="auto" style="display: none">
                Oculta
              </div>

              <div class="auto" id="auto">
                No Oculta
              </div>
            
              
              <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear">Crear</button>
            </v-flex>
          </b-col>
          <b-col>
            <label for="nameInput">Marca</label>
            <input id="nameInput" type="text" v-model="marca" class="form-control" placeholder="marca">
            <v-flex xs12>
              <v-combobox
                v-model="selectMar"
                :items="hola"
                label="Marca"
              ></v-combobox>
            </v-flex>
          </b-col> 
          <!--b-col>
            <br>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear">Agregar Campo</button>
          </b-col-->
        </b-row>
      </b-container>
    </div>
  </div>
</template>


<script>  
export default {
  mounted() {
    this.$http.get("http://localhost:8000/productos").then(response => {
      this.productos = response.data.productos;
    });
   },
    data () {
      return {
        id:'',
        nombre: '',
        hola:[],
        user:[],
        productos:[],
        select: 'Categoria',
        selectCat:'',
        selectMar:''
      }
  },
  methods:{
    Crear(){
      this.$http.post(`http://localhost:8000/productos/create?id=${this.id}&nombre=${this.nombre}&categoria=${this.categoria}&marca=${this.marca}`).then(response=>{
      this.id = '';
      this.nombre = '';
      this.categoria = '';
      this.marca = '';
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