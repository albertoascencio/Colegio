        <link href="<?php echo base_url();?>resources/layouts2/dist/css/style.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>">Inicio</a>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <!--- Contenido --->
                    </ul>
                    <ul class="navbar-nav my-lg-10">
                        <li class="nav-item dropdown">
                            <div class="btn dropleft">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" ><i class="fas fa-user-circle"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" >Perfil</a>
                                    <a class="dropdown-item" href="Salir" >Cerrar sesión</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span style="size: 30px" >Menú</span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" ><i class="fa fa-bars"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" ><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if ($this->session->userdata('rol') == 1) { ?>
                            <li><a class="waves-effect waves-dark" href="<?php echo base_url('/Estudiantes'); ?>" aria-expanded="false"><i class="fa fa-user-graduate"></i><span class="hide-menu">Estudiantes</span></a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata('rol') == 1) { ?>
                            <li><a class="waves-effect waves-dark" href="<?php echo base_url('/Docentes'); ?>" aria-expanded="false"><i class="fas fa-user-tie"></i></i><span class="hide-menu">Docentes</span></a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata('rol') == 2 || $this->session->userdata('rol') == 3) { ?>
                            <li><a class="waves-effect waves-dark" href="<?php echo base_url('/Notas'); ?>" aria-expanded="false"><i class="fas fa-book"></i></i></i><span class="hide-menu">Notas</span></a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata('rol') == 1) { ?>
                            <li><a class="waves-effect waves-dark" href="<?php echo base_url('Seccion'); ?>" aria-expanded="false"><i class="fas fa-users"></i></i><span class="hide-menu">Secciones</span></a></li>
                        <?php } ?>
                        <li><a class="waves-effect waves-dark" href="<?php echo base_url('Horario'); ?>" aria-expanded="false"><i class="far fa-calendar-alt"></i></i><span class="hide-menu">Horarios</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>