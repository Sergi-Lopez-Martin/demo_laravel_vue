<template id="">
  <section class="posts container">
    <!--
      @if(isset($title))
      <h3>{{ $title }}</h3>
      @endif
      @forelse($posts as $post) -->
      <posts-list-item v-for="post in items" :post="post" :key="post.id"></posts-list-item>

    <!--
      @empty -->
    <article class="post" v-if="!items.length">
      <div class="content-post">
        <h1>No hay publicaciones</h1>
      </div>
    </article>
    <!--
      @endforelse -->

  </section>
  <!-- fin del div.posts.container -->
  <!-- {{ $posts->appends(request()->all())->render("pagination::default") }} -->
</template>
<script>
  export default {
    props: ['items']
  }
</script>
