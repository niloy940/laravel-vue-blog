<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                          </div>
                          <!-- /.card-header -->

                          <!-- form start -->
                          <form @submit.prevent="updateCategory" @keydown="form.errors.clear()" role="form">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Edit Category</label>
                                <input v-model="form.name" type="text" class="form-control" id="categoryId" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button :disabled="form.errors.any()" type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Category from '../models/Category';

  export default {
    name: 'Edit',

    data() {
        return {
            form: new Form({ name: '' })
        };
    },

    methods: {
      updateCategory(id) {
        this.form
          .patch('/categories/' + this.$route.params.category_id)
          .then(response => {
            this.$router.push('/category-list');

            Toast.fire({
              type: 'success',
              title: 'Category updated successfully!'
            })
          });
      }
    },

    mounted() {
      Category.find(this.$route.params.category_id)
                .then(({data}) => this.form.fill(data));
    }
  }
</script>
