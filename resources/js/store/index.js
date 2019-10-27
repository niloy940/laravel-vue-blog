import Category from '../components/admin/models/Category';
import Post from '../components/admin/models/Post';

export default {
    state: {
        categories: [],
        posts: [],
    },

    getters: {
        getCategory(state) {
            return state.categories;
        },

        getPost(state) {
            return state.posts;
        }
    },

    actions: {
        allCategory(context) {
            Category.all(context);
        },

        allPost(context) {
            Post.all(context);
        },
    },

    mutations: {
        category(state, payload) {
            return state.categories = payload;
        },

        post(state, payload) {
            return state.posts = payload;
        }
    },
}
