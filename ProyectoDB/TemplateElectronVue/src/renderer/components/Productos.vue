<template lang="">
  <div class="grey--text text--darken-2">
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
                <td v-for="op in dict3[props.item.id]" class="text-xs-center">{{ op }}</td>

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
            <br>
            <br>
            <h1 class="text-center">Crear Producto</h1>
            <br>
            <br>
          </b-col>
        </b-row>

        <b-row class="justify-content-md-center">

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

          <b-col>
          <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear">Crear</button>
          </b-col>

        </b-row>

        <b-row class="justify-content-md-center">

          <b-col>
            <br>
            <br>
            <h1 class="text-center">Agregar Extra</h1>
            <br>
            <br>
          </b-col>
        </b-row>

        <b-row class="justify-content-md-center">

          <b-col>
          </b-col>

          <b-col>
            <br>
            <v-flex xs12>
              <v-combobox
                v-model="id"
                :items="hola5"
                label="ID Producto"
              ></v-combobox>
            </v-flex>
          </b-col>
          
          <b-col>
            <br>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="Crear2">Agregar opcional</button>
          </b-col>
          
          

          <b-col>
          </b-col>
        </b-row>
          
           <b-row class="justify-content-md-center">
          <b-col v-for = "a in contadorOp">
            <label> {{nombre_campo[a]}} </label>
            <input type = "text" class = "form-control" v-model="valor[a]">
          </b-col>
          <b-col>
          </b-col>
          <b-col>
          </b-col>
          <b-col>
          </b-col>
          
          
        </b-row>
      </b-container>
    </div>
  </div>
</template>


<script>
export default {
  mounted() {
    this.$http.get("http://localhost:8000/productos").then(response => {
    this.temporal1 = response.data.productos;
    this.temporal1.forEach(a=>this.hola5.push(a.id))
    });

    this.$http.get("http://localhost:8000/productos2").then(response => {
      this.productos2 = response.data.productos;
      this.productos2.forEach(a=>this.hola5.push(a.id))

    });

    this.$http.get("http://localhost:8000/valoropcional").then(response => {
      this.valores = response.data.valoropcional;
      this.valores.forEach(a=>this.dict3[a.id]=[])
      this.valores.forEach(a=>this.dict3[a.id].push(a.valor))
    });
    this.$http.get("http://localhost:8000/categorias").then(response => {
      this.categorias = response.data.categorias;
      this.categorias.forEach(a=>this.hola3.push(a.nombre))
      this.categorias.forEach(a=>this.dict1[a.nombre]=a.id)
      this.categorias.forEach(a=>this.dict4[a.id]=a.nombre)

    });
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marcas = response.data.marcas;
      this.marcas.forEach(a=>this.hola4.push(a.nombre))
      this.marcas.forEach(a=>this.dict2[a.nombre]=a.id)
      this.marcas.forEach(a=>this.dict5[a.id]=a.nombre)
      
    });
    this.$http.get("http://localhost:8000/opcional").then(response => {
      this.cantidad = response.data.opcional;
      this.cantidad.forEach(a=>this.headersPro.push( { text: a.nombre, align: "center",sortable: false, value: a.nombre }))
      var i;
      this.cantidad.forEach(a=>this.id_campo.push(a.id))
      for (i = 0; i < this.cantidad.length; i++){
        this.contadorOp.push(i);
        this.valor.push('');

      }
      this.cantidad.forEach(a=>this.nombre_campo.push(a.nombre));
      console.log(this.headersPro);
    });
   },


    data () {

      return {
        id:0,
        nombre: '',
        extra: '',
        temporal1:[],
        hola1:[],
        hola3:[],
        hola4:[],
        hola5:[],
        user:[],
        valores:[],
        productos:[],
        productos2:[],
        categorias:[],
        dict1:[],
        dict2:[],
        dict3:[],
        dict4:[],
        dict5:[],
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
     refreshUsers(){
      this.$http.get("http://localhost:8000/productos").then(response => {
      this.temporal1 = response.data.productos;
      this.temporal1.forEach(a=>this.hola5.push(a.id))
    });
    
    },
    Crear(){
      
      this.$http.post(`http://localhost:8000/productos/create?nombre=${this.nombre}&categoria=${this.dict1[this.categoria]}&marca=${this.dict2[this.marca]}`).then(response=>{
      //this.id = '';
      //this.refreshUsers();
      this.nombre = '';
      this.categoria = '';
      this.marca = '';
      this.refreshUsers();
      });
    },
    Crear2(){
      
      for (var i = 0; i < this.valor.length; i++){
        var id_pro = this.id;
        console.log("id del producto");
        console.log(id_pro);
        console.log("id del campo");
        console.log(this.id_campo[i]);
        console.log("nombre del campo");
        console.log(this.nombre_campo[i]);
        console.log("valor del campo");
        console.log(this.valor[i]);

        this.$http.post(`http://localhost:8000/valoropcional/create?id=${id_pro}&id_campo=${this.id_campo[i]}&nombre_campo=${this.nombre_campo[i]}&valor=${this.valor[i]}`).then(response=>{
        
        console.log(response.data.hola);
        
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
