class Post {
    static all(context, mutation) {
        return axios.get('/posts')
            .then(response => {
                let payload = response.data
                context.commit(mutation, payload)
            })
            .catch(error => console.log(error))
    }

    static get(context, id, mutation) {
        return axios.get('/posts/' + id)
            .then(response => {
                let payload = response.data
                context.commit(mutation, payload)
            })
            .catch(error => console.log(error))
    }

    static getByCat(context, id, mutation) {
        return axios.get('/categorypost/' + id)
            .then(response => {
                let payload = response.data
                context.commit(mutation, payload)
            })
            .catch(error => console.log(error))
    }

    static search(context, keywords, mutation) {
        return axios.get('/search?s=' + keywords)
            .then(response => {
                let payload = response.data
                context.commit(mutation, payload)
            })
            .catch(error => console.log(error))
    }

    static find(id) {
        return axios.get('/posts/' + id);
    }
}

export default Post;
