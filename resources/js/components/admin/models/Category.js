class Category {
    static all(then) {
        return axios.get('/categories')
            .then(({data}) => then(data));
    }
}

export default Category;
