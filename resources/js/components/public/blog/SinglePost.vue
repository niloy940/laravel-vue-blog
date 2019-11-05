<template>
    <span id="singlepost">
        <section id="inner-headline">
          <div class="container">
            <div class="row">
              <div class="span4">
                <div class="inner-heading">
                  <h2>Post right sidebar</h2>
                </div>
              </div>
              <div class="span8">
                <ul class="breadcrumb">
                  <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                  <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                  <li class="active">Blog post right sidebar</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section id="content">
          <div class="container">
            <div class="row">
              <div class="span8">
                <article>
                  <div class="row">
                    <div class="span8">
                      <div class="post-image">
                        <div class="post-heading">
                          <h3><a href="#">{{ singlePost.title }}</a></h3>
                        </div>
                        <img :src="`/upload_img/${ singlePost.photo }`" alt="" />
                      </div>
                      <p>
                        {{ singlePost.description }}
                      </p>

                      <div class="bottom-article">
                        <ul class="meta-post">
                          <li><i class="icon-user"></i><a href="#">{{ singlePost.user.name }}</a></li>
                          <li><i class="icon-folder-open"></i><a href="#">{{ singlePost.category.name }}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </article>
                <!-- author info -->
                <div class="about-author">
                  <a href="#" class="thumbnail align-left"><img src="img/avatar.png" alt="" /></a>
                  <h5><strong><a href="#">{{ singlePost.user.name }}</a></strong></h5>
                  <p>
                    Author information here. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.
                  </p>
                </div>
              </div>

              <BlogSidebar/>

            </div>
          </div>
        </section>
    </span>
</template>

<script>
  import BlogSidebar from './Sidebar'
  import Post from '../../admin/models/Post';
    export default {
        name: 'SinglePost',

        components: {
          BlogSidebar
        },

        mounted() {
          this.getPost();
        },

        computed: {
          singlePost() {
            return this.$store.getters.getSinglePost;
          }
        },

        methods: {
          getPost() {
            this.$store.dispatch('getPostById', this.$route.params.post_id);
          }
        },

        watch: {
          $route(to, from) {
            this.getPost();
          }
        }
    }
</script>

<style scoped>

</style>
