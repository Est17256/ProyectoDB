<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Crear Producto</h1>
    <br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <v-data-table :headers="headersPro" :items="productos2" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.nombre }}</td>
                <td class="text-xs-center">{{ props.item.id_categorias }}</td>
                <td class="text-xs-center">{{ props.item.id_marcas }}</td>
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
              <br><br><br><br><br><br><br>
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
    this.$http.get("http://localhost:8000/productos2").then(response => {
      this.productos2 = response.data.productos;
    });
    this.$http.get("http://localhost:8000/categorias").then(response => {
      this.categorias = response.data.categorias;
      this.categorias.forEach(a=>this.hola3.push(a.nombre))
      this.categorias.forEach(a=>this.dict1[a.nombre]=a.id)

    });
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marcas = response.data.marcas;
      this.marcas.forEach(a=>this.hola4.push(a.nombre))
      this.marcas.forEach(a=>this.dict2[a.nombre]=a.id)
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
      console.log(this.dict);
    });
   },


    data () {

      return {
        id:0,
        nombre: '',
        extra: '',
        hola1:[],
        hola3:[],
        hola4:[],
        user:[],
        productos:[],
        productos2:[],
        categorias:[],
        dict1:[],
        dict2:[],
        contadorOp:[],
        cantidad:[],
        nombre_campo:[],
        valor:[],
        headersPro: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "Nombre", align: "center",sortable: false, value: "Fecha" },
        { text: "ID Categoria", align: "center",sortable: false, value: "ID Categoria" },
        { text: "ID Marca", align: "center",sortable: false, value: "ID Marca" }
        ],
        id_campo:[],
        select: 'Categoria',
        marca:'',
        categoria:'',
        counter: 0,
      }
  },
  methods:{
    
    Crear(){
      
      this.$http.post(`http://localhost:8000/productos/create?id=${this.id}&nombre=${this.nombre}&categoria=${this.dict1[this.categoria]}&marca=${this.dict2[this.marca]}`).then(response=>{
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
