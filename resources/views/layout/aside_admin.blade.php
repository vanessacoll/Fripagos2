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
           <a href="{{ route('admin.home') }}" class="nav-link  {{ request()->is('*admin/home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('clientes') }}" class="nav-link  {{ request()->is('*admin/clientes*') ? 'active' : '' }}">
              <i class="nav-icon  fas fa-user-alt"></i>
              <p>
               Clientes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.tiendas') }}" class="nav-link  {{ request()->is('*admin/tiendas*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store "></i>
              <p>
               Tiendas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('transacciones') }}" class="nav-link  {{ request()->is('*admin/transacciones*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Transacciones
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('solicitudes.retiro') }}" class="nav-link  {{ request()->is('*admin/solicitudes_r*') ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope-open"></i>
              <p>
               Solicitudes de Retiro
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('solicitudes.eliminacion') }}" class="nav-link  {{ request()->is('*admin/solicitudes_e*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope-open"></i>
              <p>
               Solicitudes de Eliminacion de Cuenta
              </p>
            </a>
          </li>
         

        

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
 
  </aside>

