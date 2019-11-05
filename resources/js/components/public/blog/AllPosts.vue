<template>
    <span>
        <section id="inner-headline">
          <div class="container">
            <div class="row">
              <div class="span4">
                <div class="inner-heading">
                  <h2>Blog Posts</h2>
                </div>
              </div>
              <div class="span8">
                <ul class="breadcrumb">
                  <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                  <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                  <li class="active">Blog with right sidebar</li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section id="content">
          <div class="container">
            <div class="row">
              <div class="span8">
                <article v-for="post in getAllPost">
                  <div class="row">
                    <div class="span8">
                      <div class="post-image">
                        <div class="post-heading">
                          <h3><a href="#">{{ post.title }}</a></h3>
                        </div>
                        <img :src="imgPath(post.photo)" alt="post image"/>
                      </div>
                      <p>{{ post.description | shortLength(400, "...") }}</p>
                      <div class="bottom-article">
                        <ul class="meta-post">
                          <li><i class="icon-calendar"></i><a href="#">{{ post.created_at | date }}</a></li>
                          <li><i class="icon-user"></i><a href="#">{{ post.user.name }}</a></li>
                          <li><i class="icon-folder-open"></i><a href="#">{{ post.category.name }}</a></li>
                          <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                        </ul>
                        <router-link :to="`/post/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                      </div>
                    </div>
                  </div>
                </article>

                <div id="pagination">
                  <span class="all">Page 1 of 3</span>
                  <span class="current">1</span>
                  <a href="#" class="inactive">2</a>
                  <a href="#" class="inactive">3</a>
                </div>
              </div>

              <BlogSidebar/>

            </div>
          </div>
        </section>
    </span>
</template>

<script>
    import moment from 'moment';
    import BlogSidebar from './Sidebar';

    export default {
        name: 'AllPosts',

        components: {
            BlogSidebar
        },

        mounted() {
            // this.getCategoryPost();
            this.$store.dispatch('allPost');
        },

        computed: {
            getAllPost() {
                return this.$store.getters.getPost;
            }
        },

        methods: {
            imgPath(image) {
                return "upload_img/" + image;
            },

            getCategoryPost() {
              if (this.$route.params.category_id != null) {
                this.$store.dispatch('getPostByCategory', this.$route.params.category_id);
              } else {
                this.$store.dispatch('allPost');
              }
            }
        },

        watch: {
          $route(to, from) {
            this.getCategoryPost();
          }
        },

        filters: {
            shortLength(text, length, suffix) {
                return text.substring(0, length) + suffix;
            },

            date(date) {
              return moment(date).format('MMM Do YY');
            }
        }
    }
</script>

<style scoped>

</style>
