<!DOCTYPE html>
<html lang="en">

<!-- head-->
@include('layout.head')


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  <!-- Navbar -->
  @include('layout.navbar')
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layout.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Content Header (Page header) -->
    <section class="content-header">
   @yield('content-header')
    </section>

    <!-- Main content -->
    <section class="content">


    @yield('contenido')

    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


  <!-- footer -->

 @include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('layout.jquery')

</body>
</html>
