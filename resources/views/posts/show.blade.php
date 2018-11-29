@extends('layout')

@section('meta-title', $post->title)
@section('meta-desc', $post->excerpt)


@section('content')
<article class="post container">
    @include( $post->viewType() )
  <div class="content-post">

    @include('posts.header')
    
    <h1>{{ $post->title }}</h1>
    <div class="divider"></div>
    <div class="image-w-text">
      {!! $post->body !!}
    </div>

    <footer class="container-flex space-between">
      @include('partials.social-links', ['description' => $post->title])
      @include('posts.tags')
    </footer>
    <div class="comments">
      <div class="divider"></div>
      <div id="disqus_thread"></div>
      @include('partials.disqus')

    </div>
    <!-- .comments -->
  </div>
</article>
@endsection

@push('scripts')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush
