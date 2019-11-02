<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul v-for="category in getAllCategory" class="cat">
                  <li><i class="icon-angle-right"></i><a href="#">{{ category.name }}</a><span> (20)</span></li>
                </ul>
              </div>

              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul v-for="(post, index) in getAllPost" class="recent">
                  <li v-if="index<5">
                    <img :src="`/upload_img/${post.photo}`" class="pull-left" alt="" height="40" width="40" />
                    <h6><a href="#">{{ post.title }}</a></h6>
                    <p>
                      {{ post.description | shortLength(100, '...') }}
                    </p>
                  </li>
                </ul>
              </div>
            </aside>
        </div>
    </span>
</template>

<script>
    export default {
        name: 'Sidebar',

        mounted() {
          this.$store.dispatch('allCategory');
          this.$store.dispatch('allPost');
        },

        computed: {
          getAllCategory() {
            return this.$store.getters.getCategory;
          },

          getAllPost() {
            return this.$store.getters.getPost;
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

</style>
