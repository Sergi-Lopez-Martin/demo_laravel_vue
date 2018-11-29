@extends('layout')

@section('content')
<section class="posts container">
  @if(isset($title))
    <h3>{{ $title }}</h3>
  @endif
  @forelse($posts as $post)
    <article class="post">

      @include( $post->viewType('home') )

      <div class="content-post">
        <header class="container-flex space-between">
          <div class="date">
            <span class="c-gray-1">{{$post->published_at->format('M d - Y')}} | {{ $post->owner->name }}</span>
          </div>
          <div class="post-category">
            <span class="category text-capitalize">
              <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
            </span>
          </div>
        </header>
        <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <p>{{$post->excerpt}}</p>
        <footer class="container-flex space-between">
          <div class="read-more">
            <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más</a>
          </div>

          @include('posts.tags')

        </footer>
      </div>
    </article>
  @empty
    <article class="post">
      <div class="content-post">
        <h1>No hay publicaciones</h1>
      </div>
    </article>
  @endforelse

</section>
<!-- fin del div.posts.container -->
  {{ $posts->appends(request()->all())->render("pagination::default") }}



@stop
