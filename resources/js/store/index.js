import Category from '../components/admin/models/Category';
import Post from '../components/admin/models/Post';

export default {
    state: {
        categories: [],
        posts: [],
        latest_posts: [],
        post: []
    },

    getters: {
        getCategory(state) {
            return state.categories;
        },

        getPost(state) {
            return state.posts;
        },

        getLatestPost(state) {
            return state.latest_posts;
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

        latestPosts(context) {
            Post.all(context, 'latest');
        },

        getPostById(context, id) {
            Post.get(context, id, 'singlePost');
        },

        getPostByCategory(context, id) {
            Post.getByCat(context, id, 'getPostByCategoryId');
        },

        searchPost(context, keywords) {
            Post.search(context, keywords, 'getPostBySearch')
        },
    },

    mutations: {
        category(state, payload) {
            return state.categories = payload;
        },

        post(state, payload) {
            return state.posts = payload;
        },

        latest(state, payload) {
            return state.latest_posts = payload;
        },

        singlePost(state, payload) {
            return state.post = payload;
        },

        getPostByCategoryId(state, payload) {
            return state.posts = payload;
        },

        getPostBySearch(state, payload) {
            return state.posts = payload;
        }
    },
}
