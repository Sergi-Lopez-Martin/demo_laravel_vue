@component('mail::message')
# Tus datos de acceso a {{ config('app.name') }}

Utiliza estas credenciales para acceder al sistema.

@component('mail::table')
  | Nombre de usuario | Contraseña |
  |:----------|:------------|
  | {{ $user->email }} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
