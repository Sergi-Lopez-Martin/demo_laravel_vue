@extends('admin.layout')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header width-border">
          <h3 class="box-title">Actualizar rol</h3>
        </div>
        <div class="box-body">
          @include('partials.error-messages')
          <form action="{{ route('admin.roles.update', $role) }}" method="post">
            {{ method_field('PUT') }}

            @include('admin.roles.form')

            <br>
            <button class="btn btn-primary btn-block">Actualizar rol</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
