<template id="">
  <div class="">
    <article class="post container">
      <div class="content-post">

        <post-header :post="post"></post-header>

        <div class="divider"></div>
        <div class="image-w-text" v-html="post.body"></div>

        <footer class="container-flex space-between">
          <social-links :description="post.title"></social-links>
          <div class="tags container-flex">
            <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
              <tag-link :tag="tag" />
            </span>
          </div>
        </footer>
        <div class="comments">
          <div class="divider"></div>
          <disqus-comments></disqus-comments>

        </div>
        <!-- .comments -->
      </div>
    </article>
  </div>
</template>

<script>
  export default {
    props: ['url'],
    data() {
      return {
        post: {
          owner: {},
          category: {}
        }
      }
    },
    mounted(){
      axios.get('/api/blog/' + this.url)
      .then(res => {
        this.post = res.data;
      })
      .catch(err => {
        console.log(err);
      })
    }
  }
</script>
