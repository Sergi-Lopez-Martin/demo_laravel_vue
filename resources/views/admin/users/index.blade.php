@extends('admin.layout')

@section('header')
<h1>
  Usuarios
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Usuarios</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Lista de Usuarios</h3>
    @can('create', $users->first())
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Usuario</a>
    @endcan
  </div>

  <div class="box-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->getRoleNames()->implode(', ') }}</td>
          <td>
            @can('view', $user)
              <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
            @endcan
            @can('update', $user)
              <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
            @endcan
            @can('delete', $user)
              <form action="{{ route('admin.users.destroy', $user) }}" method="post" style="display:inline;">
                {{ csrf_field() }} {{ method_field('DELETE') }}
                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer borrar este elemento?')"><i class="fa fa-times"></i></button>
              </form>
            @endcan
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
    <form action="{{ route('admin.users.store') }}" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nombre del usuario</h5>
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
            <button class="btn btn-primary">Crear Usuario</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endpush
