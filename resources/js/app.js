import './bootstrap';
import routes from './routes';
import AdminMaster from './components/admin/AdminMaster';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('admin-main', AdminMaster);


let app = new Vue({
    el: '#app',

    router: new VueRouter(routes)
});
