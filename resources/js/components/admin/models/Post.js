class Post {
    static all(context) {
        return axios.get('/posts')
            .then(response => {
                let payload = response.data
                context.commit('post', payload)
            })
            .catch(error => console.log(error))
    }
}

export default Post;
