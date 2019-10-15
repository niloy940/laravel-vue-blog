class Category {
    static all(context) {
        return axios.get('/categories')
            // .then(({data}) => then(data));
            .then(response => {
                let payload = response.data
                context.commit('category', payload)
            })
            .catch(error => console.log(error))
    }

    static find(id) {
        return axios.get('/categories/' + id);
    }
}

export default Category;
