<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= APP_TITLE . $title ?></title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/font-awesome/css/all.css" rel="stylesheet">

    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">

    <link href="/assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

    <!-- <link href="/assets/admin/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="/assets/admin/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'> -->

    <?php
    foreach ($css as $file) {
        if (file_exists($file)) {
            echo '<link href="/' . $file . '" rel="stylesheet">';
        }
    }
    ?>

    <script src="/assets/admin/js/jquery-3.1.1.min.js"></script>
    <?php
    foreach ($script as $file) {
        if (file_exists($file)) {
            echo '<script src="/' . $file . '"></script>';
        }
    }
    ?>


    <link rel="shortcut icon" href="/assets/img/favicon.png">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="/<?= $_SESSION['imagem'] ?>" style="width:40%;">
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $_SESSION['nome'] ?></strong>
                                    </span> <span class="text-muted text-xs block"> <?= $_SESSION['acesso'] ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?= URL_ADMIN ?>/account">Meus Dados</a></li>
                                <li><a href="<?= URL_ADMIN ?>/logout">Sair</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'inicio') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>/inicio"><i class="fas fa-home"></i> <span class="nav-label">Inicio</span></a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'compromisso') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>/compromisso"><i class="fas fa-calendar"></i> <span class="nav-label">Compromissos</span></a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'configuracoes') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>/configuracoes"><i class="fal fa-cogs"></i> <span class="nav-label">Configurações do Sistema</span> </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?= URL_ADMIN ?>/logout">
                                <i class="fa fa-sign-out"></i> Sair
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>