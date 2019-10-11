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
                            <h3 class="card-title">Add New Category</h3>
                          </div>
                          <!-- /.card-header -->

                          <!-- form start -->
                          <form @submit.prevent="addCategory" @keydown="form.errors.clear()" role="form">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">New Category</label>
                                <input v-model="form.name" type="text" class="form-control" id="categoryId" placeholder="category name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <!-- <span v-if="form.errors.has('name')" v-text="form.errors.get('name')" class="danger"></span> -->
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

  export default {
    data() {
        return {
            form: new Form({ name: '' })
        };
    },

    methods: {
      addCategory() {
        this.form
          .post('/categories')
          .then(response => this.$router.push('/category-list'))

          // this.form.reset();
      }
    }
  }
</script>
