 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

     <a href="/home" class="brand-link" >
       <img src="/adminlte/dist/img/logo.png" alt="Logo" class="brand-image" >
       <span class="brand-text font-weight-light">Fri<b>Pagos</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
     
   

      <!-- SidebarSearch Form 

        PODEMOS USARLO DESPUES
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <!-- Sidebar user (optional) -->

 

          <li class="nav-header">MENU</li>
            <li class="nav-item" >
           <a href="{{ route('home') }}" class="nav-link  {{ request()->is('*home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
@can('tiendas')
          <li class="nav-item">
            <a href="{{ route('tiendas') }}" class="nav-link {{ request()->is('*tiendas*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store"></i>
              <p>
               Mi tienda
              </p>
            </a>
          </li>
@endcan

          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fas fa-cash-register"></i>
              <p>
               Cajas
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>

<ul class="nav nav-treeview">
@can('registrar_cajas')
<li class="nav-item">
<a href="{{ route('cajas') }}" class="nav-link {{ request()->is('*cajas*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Registrar Cajas</p>
</a>
</li>
@endcan
<li class="nav-item">
<a href="{{ route('apertura') }}" class="nav-link {{ request()->is('*apertura*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Apertura de Cajas</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link {{ request()->is('*cierre*') ? 'active' : '' }}" onclick="openModal()">
<i class="far fa-circle nav-icon"></i>
<p>Cierre de Cajas</p>
</a>
</li>

<li class="nav-item">
<a href="{{ route('historico') }}" class="nav-link {{ request()->is('*historico*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Historico de Pagos</p>
</a>
</li>
</ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('*vender*') ? 'active' : '' }}" onclick="showModal()" >
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Vender
              </p>
            </a>
          </li>
@can('fondos')
          <li class="nav-item">
            <a href="{{ route('fondos') }}" class="nav-link {{ request()->is('*fondos*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Fondos
              </p>
            </a>
          </li>
@endcan
@can('registrar_cajeros')
          <li class="nav-item">
            <a href="{{ route('usuarios') }}" class="nav-link {{ request()->is('*usuarios*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Usuarios
              </p>
            </a>
          </li>
@endcan
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
               Reportes
               <i class="fas fa-angle-left right"></i>
              </p>
            </a>

<ul class="nav nav-treeview">
<li class="nav-item">
<a href="{{ route('listado.transacciones') }}" class="nav-link {{ request()->is('*listado_transacciones*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Listado de Transacciones</p>
</a>
</li>


<li class="nav-item">
<a href="{{ route('listado.cierre') }}" class="nav-link {{ request()->is('*listado_cierre*') ? 'active' : '' }}">
<i class="far fa-circle nav-icon"></i>
<p>Cierres de Cajas</p>
</a>
</li>

</ul>
          </li>
         

          <li class="nav-header">OTROS</li>
            <li class="nav-item" >
           <a href="{{ route('contacto') }}" class="nav-link {{ request()->is('*contacto*') ? 'active' : '' }}">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Contacto
              </p>
            </a>
          </li>
         
          <li class="nav-item">
           <a href="{{ route('fqa') }}" class="nav-link {{ request()->is('*fqa*') ? 'active' : '' }}">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Ayuda
              </p>
            </a>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
 
  </aside>

