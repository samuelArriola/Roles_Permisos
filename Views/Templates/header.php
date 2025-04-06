
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url;?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url;?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url;?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/bootstrap/css/dataTables.bootstrap5.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url;?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 

<!-- Template Main CSS File -->
  <link href="<?php echo base_url;?>assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url;?>Inicio" class="logo d-flex align-items-center">
        <img src="<?php echo base_url;?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!--<div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       <!-- <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li> End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url;?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo  $_SESSION['Nombre'] ." ". $_SESSION['Apellido'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo  $_SESSION['Nombre'] ." ". $_SESSION['Apellido'] ." ".  $_SESSION['Apellido2'] ;?></h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url?>Usuario/salir">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Session</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <!-- Generales
      <li class="nav-item">
        <a href="" class="nav-link collapsed" data-bs-target="#generales-nav" data-bs-toggle="collapse">
          <i class="bi bi-gear"></i>
          <span>Generales</span> <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="generales-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><small>Módulo</small>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Operaciones</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url ?>Rol">
              <i class="bi bi-circle"></i><span>Rol</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url ?>Usuario/Permiso">
              <i class="bi bi-circle"></i><span>Permiso</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url ?>Usuario">
              <i class="bi bi-circle"></i><span>Usuarios</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url ?>Cliente">
              <i class="bi bi-circle"></i><span>Cliente</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url ?>Producto">
              <i class="bi bi-circle"></i><span>Producto</span>
            </a>
          </li>
        </ul>
      </li>
      
      Tablero
       <li class="nav-item">
        <a href="" class="nav-link collapsed" data-bs-target="#tablero-nav" data-bs-toggle="collapse">
          <i class="bi bi-bar-chart"></i><samp>Tableros</samp><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tablero-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav"> 
          <li>
            <a href="">
              <i class="bi bi-circle"></i><small>Deterioro de cartera</small>
            </a>
          </li>
        </ul>
       </li>

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>End Dashboard Nav -->


    <!-- menu dinamico
     <li class="nav-item">
          <a class="nav-link " href="index.html">
            <i class="<?php echo $Menu['icono'];?>"></i>
            <span> <?php echo $Menu['permiso'];?></span>
          </a>
        </li> 
    -->


    <?php 
    foreach ($_SESSION['Menu'] as $Menu) { 
        // Verificar si el menú es un contenedor de submenús
        if ($Menu['ruta'] === '#') { ?>
            <li class="nav-item">
                <a href="#" class="nav-link collapsed" data-bs-target="#<?php echo $Menu['id'];?>" data-bs-toggle="collapse">
                    <i class="<?php echo $Menu['icono'];?>"></i>
                    <span><?php echo $Menu['permiso'];?></span> 
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="<?php echo $Menu['id'];?>" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <?php 
                    foreach ($_SESSION['SubMenu'] as $SubMenu) { 
                        if ($SubMenu['menu_id'] === $Menu['id']) { // Solo incluir submenús del menú actual
                    ?>
                        <li>
                            <a href="<?php echo base_url . $SubMenu['ruta']; ?>">
                                <i class="bi bi-circle"></i><small><?php echo $SubMenu['permiso']; ?></small>
                            </a>
                        </li>
                    <?php 
                        } 
                    } 
                    ?>
                </ul>
            </li>
        <?php 
        } else { ?>
            <li class="nav-item">
                <a href="<?php echo base_url . $Menu['ruta']; ?>" class="nav-link">
                    <i class="<?php echo $Menu['icono']; ?>"></i>
                    <span><?php echo $Menu['permiso']; ?></span>
                </a>
            </li>
        <?php 
        } 
    } 
    ?>

    </ul>

  </aside><!-- End Sidebar-->

 

