import Category from '../components/admin/models/Category';
import Post from '../components/admin/models/Post';

export default {
    state: {
        categories: [],
        posts: [],
        post: []
    },

    getters: {
        getCategory(state) {
            return state.categories;
        },

        getPost(state) {
            return state.posts;
        },

        getSinglePost(state) {
            return state.post;
        }
    },

    actions: {
        allCategory(context) {
            Category.all(context, 'category');
        },

        allPost(context) {
            Post.all(context, 'post');
        },

        getPostById(context, id) {
            Post.get(context, id, 'singlePost');
        },
    },

    mutations: {
        category(state, payload) {
            return state.categories = payload;
        },

        post(state, payload) {
            return state.posts = payload;
        },

        singlePost(state, payload) {
            return state.post = payload;
        }
    },
}
