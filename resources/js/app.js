import './bootstrap';
import routes from './routes';
import ExampleComponent from './components/ExampleComponent';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', ExampleComponent);



let app = new Vue({
    el: '#app',

    router: new VueRouter(routes)
});
