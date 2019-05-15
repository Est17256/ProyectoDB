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

                :items="clientes"
                label="Cliente"
              ></v-combobox>
            </v-flex>
            </b-col>

            <b-col>
            <button type="button" class="btn btn-lg btn-warning btn-block" >Crear</button>
            </b-col>
          </b-row>
            <button type="button" class="btn btn-lg btn-warning btn-block" v-on:click="agregar">Linea Nueva</button>
    </b-container>
    <div v-for="line in lines">
    <b-container class="bv-example-row2">
          <b-row class="justify-content-md-center">
            <b-col>
            <label for="nameInput">ID Linea</label>
            <input id="nameInput" type="text" v-model="line.id_line" class="form-control" placeholder="ID Linea">
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
            <input id="nameInput" type="text"  v-model="line.cantidad" class="form-control" placeholder="Cantidad">
            </b-col>

            <b-col>
            <label for="nameInput">Precio</label>
            <input id="nameInput" type="text"   v-model="line.precio" class="form-control" placeholder="Precio">
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
      this.productos = response.data.productos;
      console.log(this.productos);
      console.log(this.hola1[0]);
      this.productos.forEach(a=>this.hola1.push(a.nombre))
      
    });

    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.temporal2 = response.data.clientes;
      this.temporal2.forEach(a=>this.clientes.push(a.nombre))

    });

    //this.agregar();
  },
  data() {
    return {
      picked: "",
      productosItem:[],
      productos:[],
      clientes:[],
      hola1:[],
      fecha:'',
      hora:'',
      total:'',
      lines:[{
        id_line : 1,
        producto : 'bola',
        cantidad : 5,
        precio : 69.9
      }],
      nombre:'',
      id:'',
      name:'',
      email:'',
      password:'',
      selected:'',
      temporal1:[],
      temporal2:[],
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
    agregar(){
      this.lines.push({
        id_line : null,
        producto : null,
        cantidad : null,
        precio : null

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
