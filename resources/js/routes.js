import AdminHome from './components/admin/AdminHome';
import CategoryList from './components/admin/category/Index';
import AddCategory from './components/admin/category/Create';

export default {
    mode: 'history',

    routes: [
        {
            path: '/home',
            component: AdminHome
        },

        {
            path: '/category-list',
            component: CategoryList
        },

        {
            path: '/add-category',
            component: AddCategory
        },
    ]
}
