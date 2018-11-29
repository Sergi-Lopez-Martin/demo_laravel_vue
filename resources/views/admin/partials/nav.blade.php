<ul class="sidebar-menu" data-widget="tree">
  <li class="header">NAVEGACIÓN</li>
  <li class="{{ setActiveRoute('dashboard') }}">
    <a href="{{ route('dashboard') }}">
      <i class="fa fa-home"></i> <span>Inicio</span>
    </a>
  </li>


  <li class="treeview {{ setActiveRoute('admin.posts.index') }}">
    <a href="#">
      <i class="fa fa-bicycle"></i> <span>Posts</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      @can('create', new App\User)
        <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Crear Post</a></li>
      @endcan
      <li {{ setActiveRoute('admin.posts.index') }}><a href="{{ route('admin.posts.index') }}"><i class="fa fa-eye"></i> Lista de Posts</a></li>
    </ul>
  </li>

  @can('view', new App\User)
    <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
      <a href="#">
        <i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ setActiveRoute('admin.users.create') }}"><a href="{{ route('admin.users.create') }}"><i class="fa fa-pencil"></i> Crear Usuario</a></li>
        <li class="{{ setActiveRoute('admin.users.index') }}"><a href="{{ route('admin.users.index') }}"><i class="fa fa-eye"></i> Lista de Usuarios</a></li>
      </ul>
    </li>
  @else
    <li class="{{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
      <a href="{{ route('admin.users.show', auth()->user()) }}">
        <i class="fa fa-pencil"></i> <span>Perfil</span>
      </a>
    </li>
  @endcan

  @can('view', new \Spatie\Permission\Models\Role)
    <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
      <a href="{{ route('admin.roles.index') }}">
        <i class="fa fa-pencil"></i> <span>Roles</span>
      </a>
    </li>
  @endcan

  @can('view', new \Spatie\Permission\Models\Permission)
    <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
      <a href="{{ route('admin.permissions.index') }}">
        <i class="fa fa-pencil"></i> <span>Permisos</span>
      </a>
    </li>
  @endcan

</ul>
