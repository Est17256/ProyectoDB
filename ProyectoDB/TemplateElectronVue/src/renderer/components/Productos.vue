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
                v-model="categoria"
                :items="hola3"
                label="Categoria"
              ></v-combobox>
              <br><br><br><br><br><br><br><br><br>
              <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear">Crear</button>
            </v-flex>
          </b-col>
          <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="marca"
                :items="hola4"
                label="Marca"
              ></v-combobox>
            </v-flex>
          </b-col>
          <b-col v-for = "a in contadorOp">
            <label> {{nombre_campo[a]}} </label>
            <input type = "text" class = "form-control" v-model="valor[a]">
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
      this.categorias = response.data.categorias;
      this.categorias.forEach(a=>this.hola1.push(a.id))
      this.categorias.forEach(a=>this.hola3.push(a.nombre))

    });
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marcas = response.data.marcas;
      this.marcas.forEach(a=>this.hola2.push(a.id))
      this.marcas.forEach(a=>this.hola4.push(a.nombre))
    });
    this.$http.get("http://localhost:8000/opcional").then(response => {
      this.cantidad = response.data.opcional;
      var i;
      this.cantidad.forEach(a=>this.id_campo.push(a.id))
      for (i = 0; i < this.cantidad.length; i++){
        this.contadorOp.push(i);
        this.valor.push('');

      }
      this.cantidad.forEach(a=>this.nombre_campo.push(a.nombre));
      console.log(this.nombre_campo);
      console.log(this.id_campo);
      console.log(this.valor);
    });
   },


    data () {

      return {
        id:0,
        nombre: '',
        extra: '',
        hola1:[],
        hola2:[],
        hola3:[],
        hola4:[],
        user:[],
        productos:[],
        categorias:[],
        contadorOp:[],
        cantidad:[],
        nombre_campo:[],
        valor:[],
        id_campo:[],
        select: 'Categoria',
        marca:'',
        categoria:'',
        counter: 0,
      }
  },
  methods:{
    
    Crear(){
      
      this.$http.post(`http://localhost:8000/productos/create?id=${this.id}&nombre=${this.nombre}&categoria=${this.categoria}&marca=${this.marca}`).then(response=>{
      //this.id = '';
      this.nombre = '';
      this.categoria = '';
      this.marca = '';
      });
      /*const data = {
        id_producto: this.id,
        id_campo: this.id_campo,
        nombre: this.nombre,

        
      }*/
      for (var i = 0; i < this.valor.length; i++){
        this.$http.post(`http://localhost:8000/valoropcional/create?id=${this.id}&id_campo=${this.id_campo[i]}&nombre_campo=${this.nombre_campo[i]}&valor=${this.valor[i]}`).then(response=>{
        
        console.log(response.data.hola);
        
      });
      }
      //for (var i = 0; i < this.valorOpcional.length; i++){
      //  this.valorOpcional[i] = '';   
      //}
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
