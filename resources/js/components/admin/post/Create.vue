<template>
  <div>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form
                @submit.prevent="addPost"
                @keydown="form.errors.clear()"
                role="form"
                enctype="multipart/form-date"
              >
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input
                      v-model="form.title"
                      type="text"
                      class="form-control"
                      id="categoryId"
                      :class="{ 'is-invalid': form.errors.has('title') }"
                    />

                    <has-error :form="form" field="title"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>

                    <editor
                      class="form-control"
                      v-model="form.description"
                      :class="{ 'is-invalid': form.errors.has('description') }"
                    />

                    <div
                      v-if="form.errors.has('description')"
                      v-text="form.errors.get('description')"
                      class="invalid-feedback"
                    ></div>
                  </div>

                  <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select
                      v-model="form.category_id"
                      :class="{ 'is-invalid': form.errors.has('category_id') }"
                      class="form-control"
                      @click="form.errors.clear()"
                    >
                      <option disabled value>Select One</option>
                      <option
                        :value="category.id"
                        v-for="category in getAllCategory"
                      >{{ category.name }}</option>
                    </select>

                    <has-error :form="form" field="category_id"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="photo">Insert Photo</label>

                    <img v-if="called" :src="form.photo" :class="{ 'photoSize' : called }" />

                    <input
                      @change="changePhoto($event)"
                      name="photo"
                      type="file"
                      id="photo"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('photo') }"
                    />

                    <div
                      v-if="form.errors.has('photo')"
                      v-text="form.errors.get('photo')"
                      class="invalid-feedback"
                    ></div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button :disabled="form.errors.any() || disable" type="submit" class="btn btn-primary">Save</button>
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
import { Editor } from "@toast-ui/vue-editor";

export default {
  components: {
    editor: Editor
  },

  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        category_id: "",
        photo: "",
        user_id: ""
      }),

      called: false,
      disable: false
    };
  },

  mounted() {
    this.$store.dispatch("allCategory");
  },

  computed: {
    getAllCategory() {
      return this.$store.getters.getCategory;
    }
  },

  methods: {
    addPost() {
      this.form
        .post("/posts")
        .then(response => {
          this.$router.push("/post-list");

          Toast.fire({
            type: "success",
            title: "Post has been added successfully!"
          });
        })
        .catch(errors => console.log(errors));

      // this.form.reset();
    },

    changePhoto(event) {
      this.form.errors.clear();

      let file = event.target.files[0];
      // console.log(file);
      if ((file.size > 1000000) || (!file.type.includes('image'))) {
        Swal.fire({
          type: "error",
          title: "Opps...",
          text: "Please choose a Photo & size <= 1MB!"
        });

        this.called = false;
        this.disable = true;
        file.name = '';

      } else {
        this.called = true;
        this.disable = false

        let reader = new FileReader();
        reader.onload = event => {
          this.form.photo = event.target.result;
        };

        reader.readAsDataURL(file);
      }
    }
  }
};
</script>

<style>
.photoSize {
  padding-bottom: 10px;
  width: 100px;
  height: 100px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
