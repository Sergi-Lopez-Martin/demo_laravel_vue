@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header width-border">
        <h3 class="box-title">Datos personales</h3>
      </div>
      <div class="box-body">
        @include('partials.error-messages')
          <form action="{{ route('admin.users.update', $user) }}" method="post">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirmar Contraseña:</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
            </div>
            <button class="btn btn-primary btn-block">Actualizar usuario</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Roles</h3>
      </div>
      <div class="box-body">
        @role('Admin')
          <form action="{{ route('admin.users.roles.update', $user) }}" method="POST">
            {{ csrf_field() }} {{ method_field('PUT') }}

            @include('admin.roles.checkboxes')

            <button class="btn btn-primary btn-block">Actualizar roles</button>
          </form>
        @else
          <ul class="list-group">
            @forelse ($user->roles as $role)
            <li class="list-group-item">{{ $role->name }}</li>
            @empty
              <li class="list-group-item">No tiene roles</li>
            @endforelse
          </ul>
        @endrole
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Permisos Adicionales</h3>
      </div>
      <div class="box-body">
        @role('Admin')
          <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
            {{ csrf_field() }} {{ method_field('PUT') }}

            @include('admin.permissions.checkboxes', ['model' => $user])

            <button class="btn btn-primary btn-block">Actualizar permisos</button>
          </form>
        @else
          <ul class="list-group">
            @forelse ($user->permissions as $permission)
              <li class="list-group-item">{{ $permission->name }}</li>
            @empty
              <li class="list-group-item">No tiene permisos</li>
            @endforelse
          </ul>
        @endrole
      </div>
    </div>
  </div>
</div>
@endsection
