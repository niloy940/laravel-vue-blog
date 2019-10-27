<template>
    <div>
        <section class="content">
          <div class="row justify-content-around">
            <div class="col-12 back">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Post List</h3>

                  <div class="card-tools">
                      <span class="btn btn-primary">
                          <router-link to="/add-post" class="tc">Add Post</router-link>
                      </span>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>Sl</th>
                          <th>User</th>
                          <th>Category</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Photo</th>
                          <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(post, index) in getAllPost">
                          <td v-text="index+1"></td>
                          <td v-if="post.user">{{ post.user.name }}</td>
                          <td v-if="post.category">{{ post.category.name }}</td>
                          <td>{{ post.title | shortLength(20, "...")}}</td>
                          <td>{{ post.description | shortLength(30, "...") }}</td>
                          <td><img class="imgsize" :src="post.photo"></td>
                          <td>
                            <form @submit.prevent="deletePost(post.id)">
                              <a class="btn btn-primary rounded-circle" href="#">Edit</a>
                              <button type="submit" class="btn btn-danger rounded-circle">Delete</button>
                            </form>
                          </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>
    </section>
    </div>
</template>

<script>
    export default {
        name: 'List',

        data() {
          return {
            form: new Form()
          };
        },

        mounted() {
            this.$store.dispatch('allPost');
        },

        computed: {
            getAllPost() {
                return this.$store.getters.getPost;
            }
        },

        methods: {
          deletePost(id) {
            this.form
              .delete('/posts/' + id)
              .then(()=> {
                this.$store.dispatch('allPost');

                Toast.fire({
                  type: 'success',
                  title: 'Post deleted successfully!'
                });
              });
          }
        },

        filters: {
          shortLength(text, length, suffix) {
            return text.substring(0, length) + suffix;
          }
        }
    }
</script>

<style scoped>
  .tc{
    color: #fff;
    text-decoration: none;
  }

  .imgsize{
    width: 50px;
    height: 60px;
  }
</style>
