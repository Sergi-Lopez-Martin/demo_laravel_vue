@extends('admin.layout')

@section('header')
<h1>
  Posts
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Inicio</a></li>
  <li class="active">Crear</li>
</ol>
@stop

@section('content')
  @if($post->photos->count())
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
            @foreach($post->photos as $photo)
              <form class="" action="{{ route('admin.photos.destroy', $photo) }}" method="post">
                {{ method_field('DELETE') }} {{ csrf_field() }}
                <div class="col-md-2">
                  <button class="btn btn-danger btn-xs" style="position:absolute;"> <i class="fa fa-remove"></i> </button>
                  <img src="/storage/{{ $photo->url }}" class="img-responsive">
                </div>
              </form>
            @endforeach
        </div>
      </div>
    </div>
  @endif
<div class="row">
  <form action="{{ route('admin.posts.update', $post) }}" method="post">
    {{ csrf_field() }} {{ method_field('PUT') }}
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Crear Post</h3>
        </div>
        <div class="box-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            <label for="body">Contenido</label>
            <textarea id="editor" name="body" rows="12" cols="80" class="form-control">{{ old('body', $post->body) }}</textarea>
            {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
          </div>

          <div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
            <label for="iframe">Contenido Incrustado (Iframe)</label>
            <textarea name="iframe" rows="2" cols="80" class="form-control">{{ old('iframe', $post->iframe) }}</textarea>
            {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-body">
          <div class="form-group">
            <label>Fecha de publicación:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
            <label for="category_id">Categorías</label>
            <select class="form-control select2" name="category_id">
              <option value="">Selecciona una categoría</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
            {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group">
            <label>Etiquetas</label>
            <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
              @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
            <label for="excerpt">Extracto</label>
            <textarea name="excerpt" rows="8" cols="80" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
            {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
          </div>
          <div class="form-group">
            <div class="dropzone"></div>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary btn-block">Guardar</button>
          </div>

        </div>
      </div>
    </div>
  </form>

</div>
@stop

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<!-- Select2 -->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $('#datepicker').datepicker({
    autoclose: true
  })
  CKEDITOR.replace('editor')
  CKEDITOR.config.height = 315;
  //Initialize Select2 Elements
  $('.select2').select2({
    'tags' : true
  })

  var myDropzone = new Dropzone('.dropzone', {
    url: '/admin/posts/{{ $post->url }}/photos',
    paramName: 'photo',
    aceptedFiles: 'image/*',
    maxFilesize: 2,
    maxFiles: 50,
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
  })

  myDropzone.on('error', function(file, res){
    var msg = res.errors.photo[0];
    $('.dz-error-message:last > span').text(msg);
  });

  Dropzone.autoDiscover = false;
</script>
@endpush
