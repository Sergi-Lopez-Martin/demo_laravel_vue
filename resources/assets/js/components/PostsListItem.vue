<template id="">
<article class="post">

  <!--
      @include( $post->viewType('home') ) -->
  <header class="container-flex space-between">
    <div class="date">
      <!-- <span class="c-gris">{{ optional($post->published_at)->format('M d y') }}</span> -->
    </div>
    <!-- @if($post->category) -->
    <div class="post-category">
      <!-- <span class="category"><a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a></span> -->
      <!-- <span class="category"><a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a></span> -->
    </div>
    <!-- @endif -->
  </header>
  <div class="content-post">
    <post-header :post="post"></post-header>
    <p v-html="post.excerpt"></p>
    <footer class="container-flex space-between">
      <div class="read-more">
        <post-link :post="post" class="text-uppercase c-green">Leer más</post-link>
      </div>
      <div class="tags container-flex">
        <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
          <tag-link :tag="tag" />
        </span>
      </div>
    </footer>
  </div>
</article>
</template>
<script>
export default {
  props: ['post']
}
</script>
