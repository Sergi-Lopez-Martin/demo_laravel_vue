@extends('admin.layout')

@section('header')
<h1>
  Posts
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Posts</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Lista de Posts</h3>
    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear Post</button>
  </div>

  <div class="box-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>

            <a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-default" target="_BLANK"><i class="fa fa-eye"></i></a>

            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>

            <form action="{{ route('admin.posts.destroy', $post) }}" method="post" style="display:inline;">
              {{ csrf_field() }} {{ method_field('DELETE') }}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer borrar este elemento?')"><i class="fa fa-times"></i></button>
            </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
  <!-- DataTables -->
  <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#posts-table').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin.posts.store') }}" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Título del post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
              <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
              {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Crear Post</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endpush
