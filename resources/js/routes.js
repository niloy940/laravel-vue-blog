import AdminHome from './components/admin/AdminHome';
import CategoryList from './components/admin/category/Index';
import AddCategory from './components/admin/category/Create';
import EditCategory from './components/admin/category/Edit';
import PostList from './components/admin/post/List';
import AddPost from './components/admin/post/Create';
import EditPost from './components/admin/post/Edit';

export default {
    mode: 'hash',

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

        {
            path: '/edit-category/:category_id',
            component: EditCategory
        },

        //post
        {
            path: '/post-list',
            component: PostList
        },

        {
            path: '/add-post',
            component: AddPost
        },

        {
            path: '/edit-post/:post_id',
            component: EditPost
        },
    ]
}
