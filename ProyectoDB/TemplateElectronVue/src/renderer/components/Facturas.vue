<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Crear Factura</h1>
    <br><br><br><br><br>
    <div>
    <b-container class="bv-example-row">
          <b-row class="justify-content-md-center">
            <b-col>
            <label for="nameInput">ID</label>
            <input id="nameInput" type="text" v-model="id" class="form-control" >
            </b-col>

            <b-col>
            <label for="nameInput">Fecha</label>
            <input id="nameInput" type="date" v-model="fecha" class="form-control" >
            </b-col>

            <b-col>
            <label for="nameInput">Hora</label>
            <input id="nameInput" type="time" v-model="hora" class="form-control" >
            </b-col>

            <b-col>
            <label for="nameInput">Total</label>
            <input id="nameInput" type="text" v-model="total" class="form-control" >
            </b-col>

            <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="cliente"
                :items="hola2"
                label="Cliente"
              ></v-combobox>
            </v-flex>
            </b-col>

            <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block"  v-on:click="CrearF">Crear Factura</button>
            </b-col>
             <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block"  v-on:click="CrearL">Agregar Lineas</button>
            </b-col>
          </b-row>
            <br>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="agregar">Linea Nueva</button>
    </b-container>
    <div v-for="line in lines">
    <b-container class="bv-example-row2">
          <b-row class="justify-content-md-center">
            <b-col>
            <label for="nameInput">ID Linea</label>
            <input id="nameInput" type="text" v-model="line.id_line" class="form-control" >
            </b-col>

            <b-col>
            <v-flex xs12>
              <v-combobox
                v-model="line.producto"
                :items="hola1"
                label="Producto"
              ></v-combobox>
            </v-flex>
            </b-col>

            <b-col>
            <label for="nameInput">Cantidad</label>
            <input id="nameInput" type="text"  v-model="line.cantidad" class="form-control" >
            </b-col>

            <b-col>
            <label for="nameInput">Precio</label>
            <input id="nameInput" type="text"   v-model="line.precio" class="form-control" >
            </b-col>

            <b-col>

            </b-col>

            <b-col>

            </b-col>
          </b-row>

    </b-container>
    </div>
    </div>
  </div>
</template>


<script>
export default {
  mounted() {

    this.$http.get("http://localhost:8000/productos").then(response => {

      this.temporal1 = response.data.productos;
      this.temporal1.forEach(a=>this.dict1[a.nombre]=a.id)
      this.temporal1.forEach(a=>this.hola1.push(a.nombre))

    });

    this.$http.get("http://localhost:8000/clientes").then(response => {

    this.temporal2 = response.data.clientes;
    this.temporal2.forEach(a=>this.dict2[a.nombre]=a.id)
    this.temporal2.forEach(a=>this.hola2.push(a.nombre))

    });

    //this.agregar();
  },
  data() {
    return {
      contador: 1,
      picked: "",
      cliente: '',
      productosItem:[],
      productos:[],
      clientes:[],
      hola1:[],
      hola2:[],
      dict1:[],
      dict2:[],
      fecha:'',
      hora:'',
      total:0,
      lines:[],
      nombre:'',
      id:'',
      name:'',
      selected:'',
      temporal1:[],
      temporal2:[]
    };
  },
  methods:{
    agregar(){
      this.contador
      this.lines.push({
        id_line : this.contador,
        producto : null,
        cantidad : null,
        precio : null

      });

      this.contador = this.contador + 1;
    },
    CrearL(){
       //Variables de linea de factura
       var cant = this.lines.length;
      for (var i = 0; i < this.lines.length; i++){
        var id = this.lines[i].id_line;
      //  console.log(id);
        var cantidad = this.lines[i].cantidad;
       // console.log(cantidad);
        var precio = this.lines[i].precio;
        //console.log(precio);
        var id_facturas = this.id;
        //console.log(id_facturas);
        var id_productos = this.lines[i].producto;
        //console.log(this.lines[0].producto);
        //console.log(this.dict1);
        //console.log(this.dict1['Mercurial']);
        //console.log(this.lines[i].id_productos);
        //console.log(id_productos);
        //Crear linea de factura
        this.$http.post(`http://localhost:8000/linea_factura/create?id=${id}&cantidad=${cantidad}&precio=${precio}&id_facturas=${id_facturas}&id_productos=${this.dict1[id_productos]}`).then(response=>{        
        });
      }
      for (var i = 0; i < cant; i++){
        this.lines.pop();
      }
      this.contador = 1;
    },
    CrearF(){
    this.total = 0;
      for (var i = 0; i < this.lines.length; i++){
        this.total = this.total + (this.lines[i].cantidad * this.lines[i].precio);
      }
      //Variables de factura
      var cant = this.lines.length;
      var id = this.id;
      var fecha = this.fecha;
      var hora = this.hora;
      var total = this.total;
      var id_clientes = this.cliente
      
      //Crear factura
      this.$http.post(`http://localhost:8000/facturas/create?fecha=${this.fecha}&hora=${this.hora}&total=${this.total}&id_clientes=${this.dict2[id_clientes]}`).then(response=>{
      //this.id = '';
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
