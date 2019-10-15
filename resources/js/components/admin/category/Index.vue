<template>
    <div>
        <section class="content">
          <div class="row justify-content-around">
            <div class="col-8 back">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>

                  <div class="card-tools">
                      <span class="btn btn-primary">
                          <router-link to="/add-category" class="tc">Add Category</router-link>
                      </span>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Category Name</th>
                          <th>Date</th>
                          <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(category, index) in getAllCategory">
                          <td v-text="index+1"></td>
                          <td v-text="category.name"></td>
                          <td>{{ category.created_at | ago }}</td>
                          <td>
                            <form @submit.prevent="deleteCategory(category.id)">
                              <router-link class="btn btn-primary rounded-circle" :to="`/edit-category/${category.id}`">Edit</router-link>
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
  import moment from 'moment';
  import create from './Create';

  export default{
    name: 'Index',

/*    data() {
        return {
          categories: []
        };
    },

    created() {
        Category.all(categories => this.categories = categories);
    }*/

    data() {
      return {
        form: new Form()
      };
    },

    // using vuex for displaying all category
    mounted() {
      this.$store.dispatch('allCategory');
    },

    computed: {
      getAllCategory() {
        return this.$store.getters.getCategory;
      }
    },

    methods: {
      deleteCategory(id) {
        this.form
          .delete('/categories/' + id)
          .then(()=> {
            this.$store.dispatch('allCategory');

            Toast.fire({
              type: 'success',
              title: 'Category deleted successfully!'
            });
          });
      }
    },

    filters:{
      ago(date) {
        return moment(date).format('MMM Do YY');
      }
    },
  }
</script>

<style scoped>
  .fixed{
    position: fixed;
    width: auto;
    border: 3px solid #73AD21;
  }
  .tc{
    color: #fff;
    text-decoration: none;
  }
</style>
