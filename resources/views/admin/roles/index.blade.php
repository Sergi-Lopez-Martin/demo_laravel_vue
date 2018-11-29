@extends('admin.layout')

@section('header')
<h1>
  Roles
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Roles</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Lista de roles</h3>
    @can('create', $roles->first())
      <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Usuario</a>
    @endcan
  </div>

  <div class="box-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Permisos</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{ $role->id }}</td>
          <td>{{ $role->display_name }}</td>
          <td>{{ $role->name }}</td>
          <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
          <td>
            @can('update', $role)
              <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
            @endcan
            @can('delete', $role)
              @if ($role->id !== 1)
                <form action="{{ route('admin.roles.destroy', $role) }}" method="post" style="display:inline;">
                  {{ csrf_field() }} {{ method_field('DELETE') }}
                  <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estás seguro de querer borrar este elemento?')"><i class="fa fa-times"></i></button>
                </form>
              @endif
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
    <form action="{{ route('admin.roles.store') }}" method="post">
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
