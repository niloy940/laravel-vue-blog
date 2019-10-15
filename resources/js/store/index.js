import Category from '../components/admin/models/Category'

export default {
    state: {
        categories: [],
    },

    getters: {
        getCategory(state) {
            return state.categories;
        }
    },

    actions: {
        allCategory(context) {
            Category.all(context);
        }
    },

    mutations: {
        category(state, payload) {
            return state.categories = payload;
        }
    },
}
