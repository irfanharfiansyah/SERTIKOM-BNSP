<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-primary border-right" id="sidebar-wrapper">
       
      <div class="sidebar-heading mb-2">
          <img src="https://lsptrainerindonesia.id/wp-content/uploads/2019/07/Logo-LSP-TI-png.png" alt="tungguu" width="100">
        </div>
      <div class="list-group ">
        <a href="/" class="list-group-item list-group-item-action bg-primary text-light"><i class="fas fa-cog"></i> Arsip </a>
        <a href="/About" class="list-group-item list-group-item-action bg-primary text-light"><i class="fas fa-cog"></i> About</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" >
      <div class="container-fluid mt-5">
       @yield('content-tite')
      <div class="container-fluid mt-5">
        @yield('body')
      </div>
    </div>
  </div>
  

</body>
</html>
