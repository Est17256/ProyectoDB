import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import BootstrapVue from 'bootstrap-vue'

import App from './App';
import 'vuetify/dist/vuetify.min.css';
import '@fortawesome/fontawesome-free/css/all.css';
import './sass/app.scss';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
window.Vue = Vue;

if (!process.env.IS_WEB) Vue.use(require('vue-electron'));
Vue.http = Vue.prototype.$http = axios;
Vue.config.productionTip = false;

// Vue plugins registration
Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.use(Vuetify, {
  iconfont: 'fa',
  theme: {
    primary: '#324e7b',
    secondary: '#5068a9',
    tercero: '#303841',
    cuarto: '#3A4750',
    quinto: '#00ced1 ', //00ced1 
    sexto: '#EEEEEE',
    accent: '#f8f8f8',
  }
});

const routes = [
  {
    path: '/CreacionesVarias',
    component: Vue.component('CreacionesVarias', require('./components/CreacionesVarias.vue').default)
  },
  {
    path: '/Productos',
    component: Vue.component('Productos', require('./components/Productos.vue').default)
  },
  {
    path: '/Facturas',
    component: Vue.component('Facturas', require('./components/Facturas.vue').default)
  },
  {
    path: '/CampoN',
    component: Vue.component('CampoN', require('./components/CampoN.vue').default)
  },
  {
    path: '/DataFake',
    component: Vue.component('DataFake', require('./components/DataFake.vue').default)
  },
  {
    path: '/VFacturas',
    component: Vue.component('VFacturas', require('./components/VFacturas.vue').default)
  }
];

const router = new VueRouter({
  routes
});

/* eslint-disable no-new */
new Vue({
  router,
  render: h => h(App),
  mounted () {
    this.$router.push('/page-two')
  }
}).$mount('#app');
