@extends('admin.layout')

@section('header')
<h1>
  Permisos
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="/home"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Permisos</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
  {{-- <div class="box-header">
    <h3 class="box-title">Lista de permisos</h3>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Permiso</a>
  </div> --}}

  <div class="box-body">
    <table id="posts-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Opciones</th>
      </tr>
      </thead>
      <tbody>
        @foreach($permissions as $permission)
        <tr>
          <td>{{ $permission->id }}</td>
          <td>{{ $permission->name }}</td>
          <td>{{ $permission->display_name }}</td>
          <td>
            @can('update', $permission)
              <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
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
