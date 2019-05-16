<template lang="">
  <div class="grey--text text--darken-2">
    <h1 class="text-center">Creaciones Varias</h1>
    <br>
    <div>
      <b-container class="bv-example-row2">
        <b-row class="justify-content-md-center">
          <b-col>
            <v-data-table :headers="headersFac" :items="factura" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.fecha }}</td>
                <td class="text-xs-center">{{ props.item.hora }}</td>
                <td class="text-xs-center">{{ props.item.id_clientes }}</td>
                <td class="text-xs-center">{{ props.item.total }}</td>
              </template>
            </v-data-table>
            <br></br><br></br>
            <v-data-table :headers="headersLin" :items="linea" class="elevation-1">
              <template v-slot:items="props">
                <td class="text-xs-center">{{ props.item.id }}</td>
                <td class="text-xs-center">{{ props.item.id_facturas }}</td>
                <td class="text-xs-center">{{ props.item.id_productos }}</td>
                <td class="text-xs-center">{{ props.item.cantidad }}</td>
                <td class="text-xs-center">{{ props.item.precio }}</td>
              </template>
            </v-data-table>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>


<script>
export default {
  mounted() {
    this.$http.get("http://localhost:8000/lineas").then(response => {
      this.linea = response.data.lineas;
    });
    this.$http.get("http://localhost:8000/facturas2").then(response => {
      this.factura = response.data.facturas;
    });
    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.cliente = response.data.clientes;
    });
  },
  data() {
    return {
      picked: "",
      id:'',
      nombre:'',
      email:'',
      password:'',
      selected:'',
      user: [],
      marca: [],
      factura: [],
      linea: [],
      cliente: [],
      categoria: [],
      headersFac: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "Fecha", align: "center",sortable: false, value: "Fecha" },
        { text: "Hora", align: "center",sortable: false, value: "Hora" },
        { text: "IDCliente", align: "center",sortable: false, value: "IDCliente" },
        { text: "Total", align: "center",sortable: false, value: "Total" }
      ],
      headersLin: [
        { text: "ID", align: "center",sortable: false, value: "ID" },
        { text: "IDFactura", align: "center",sortable: false, value: "IDFactura" },
        { text: "IDProducto", align: "center",sortable: false, value: "IDProducto" },
        { text: "Cantidad", align: "center",sortable: false, value: "Cantidad" },
        { text: "Precio", align: "center",sortable: false, value: "Precio" }
      ]
    };
  },
  methods:{
    refreshUsers(){
      this.$http.get("http://localhost:8000/categorias").then(response => {
      this.categoria = response.data.categorias;
      console.log(this.categorias);
    });
    console.log(this.categoria);
    this.$http.get("http://localhost:8000/marcas").then(response => {
      this.marca = response.data.marcas;
    });
    this.$http.get("http://localhost:8000/clientes").then(response => {
      this.cliente = response.data.clientes;
    });
    },
    Crear(){
      if (this.selected=="Categoria") {
        this.$http.post(`http://localhost:8000/categorias/create?nombre=${this.nombre}`).then(response=>{
        this.refreshUsers();
        this.id = '';
        this.nombre = '';
        });
      }
      if (this.selected=="Marca") {
        this.$http.post(`http://localhost:8000/marcas/create?nombre=${this.nombre}`).then(response=>{
        this.refreshUsers();
        this.id = '';
        this.nombre = '';
        });
      }
      if (this.selected=="Cliente") {
        this.$http.post(`http://localhost:8000/clientes/create?id=${this.id}&nombre=${this.nombre}`).then(response=>{
        this.refreshUsers();
        this.id = '';
        this.nombre = '';
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