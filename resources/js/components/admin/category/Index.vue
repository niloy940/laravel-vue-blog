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
                          <th>Id</th>
                          <th>Category Name</th>
                          <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="category in categories">
                          <td v-text="category.id"></td>
                          <td v-text="category.name"></td>
                          <td>
                              <a class="btn btn-primary rounded-circle" href="#">Edit</a>
                              <a class="btn btn-danger rounded-circle" href="#">Delete</a>
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
  import Category from '../models/Category';
  import create from './Create';

  export default{
    data() {
        return {
          categories: []
        };
    },

    created() {
        Category.all(categories => this.categories = categories);
    }
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
