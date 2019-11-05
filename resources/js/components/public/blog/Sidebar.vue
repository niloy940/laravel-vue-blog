<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keydown="instantSearch" v-model="keyword" placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" @click.prevent="instantSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul v-for="category in getAllCategory" class="cat">
                  <li><i class="icon-angle-right"></i><router-link :to="`/categories/${category.id}`">{{ category.name }}</router-link><span> (20)</span></li>
                </ul>
              </div>

              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul v-for="(post, index) in getAllPost" class="recent">
                  <li v-if="index<5">
                    <img :src="`/upload_img/${post.photo}`" class="pull-left" alt="" height="40" width="40" />
                    <h6><router-link :to="`/post/${post.id}`">{{ post.title }}</router-link></h6>
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

        data() {
          return {
            keyword: ''
          };
        },

        mounted() {
          this.$store.dispatch('allCategory');
          this.$store.dispatch('latestPosts');
        },

        computed: {
          getAllCategory() {
            return this.$store.getters.getCategory;
          },

          getAllPost() {
            return this.$store.getters.getLatestPost;
          }
        },

        methods: {
          instantSearch:_.debounce(function () {
            this.$store.dispatch('searchPost', this.keyword);
          }, 1000)

          // instantSearch() {
          //     this.$store.dispatch('searchPost', this.keyword);
          // }
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
