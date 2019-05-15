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
            <input id="nameInput" type="text"  class="form-control" placeholder="ID Linea">
            </b-col>

            <b-col>
            <v-flex xs12>
              <v-combobox
              
                :items="productos"
                label="Producto"
              ></v-combobox>
            </v-flex>
            </b-col>

            <b-col>
            <label for="nameInput">Cantidad</label>
            <input id="nameInput" type="text"  class="form-control" placeholder="Cantidad">
            </b-col>

            <b-col>
            <label for="nameInput">Precio</label>
            <input id="nameInput" type="text"  class="form-control" placeholder="Precio">
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
    this.$http.get("http://localhost:8000/users").then(response => {
      this.user = response.data.users;
    });

    this.$http.get("http://localhost:8000/categorias").then(response => {
      this.temporal = response.data.clientes;
      this.temporal.forEach(a=>this.clientes.push(a.nombre))

    });

    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.temporal = response.data.clientes;
      this.temporal.forEach(a=>this.clientes.push(a.nombre))

    });

    this.agregar();
  },
  data() {
    return {
      picked: "",
      productos:[],
      clientes:[],
      fecha:'',
      hora:'',
      total:'',
      lines:[1,2,3],
      nombre:'',
      id:'',
      name:'',
      email:'',
      password:'',
      selected:'',
      temporal:[],
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
      this.lines.push(1);
      console.log(this.lines);
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
