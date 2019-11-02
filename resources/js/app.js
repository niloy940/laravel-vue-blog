import './bootstrap';
import routes from './routes';
import storeData from './store/index';
import AdminMaster from './components/admin/AdminMaster';
import PublicMaster from './components/public/PublicMaster';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('admin-main', AdminMaster);
Vue.component('public-main', PublicMaster);


const store = new Vuex.Store(
    storeData
);

let app = new Vue({
    el: '#app',

    router: new VueRouter(routes),

    store,
});
