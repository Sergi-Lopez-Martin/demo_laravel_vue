@extends('admin.layout')

@section('content')
  <section class="pages container">
    <div class="page page-about">
      <h1 class="text-capitalize">Acción no autorizada</h1>
      <span style="color:red">{{ $exception->getMessage() }}</span>
      <p>Volver <a href="{{ url()->previous() }}">Atrás</a></p>
    </div>
  </section>
@endsection
