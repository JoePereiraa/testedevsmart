<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

define('ROOT', getcwd() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

require ROOT . 'vendor/autoload.php';
require ROOT . 'application/libs/Helper.php';
require ROOT . 'application/libs/Upload.php';
require APP . 'config/config.php';

$url = \SmartSolucoes\Libs\Helper::splitUrl();

session_cache_expire(300);
session_start();

use SmartSolucoes\Core\Route;

$Route = new Route($url);

$Route->view('', 'admin/auth/login');

// FIM DAS ROTAS DO SITE //

$Route->post('login', 'AuthController@login');
$Route->get('logout', 'AuthController@logout');

$Route->view('forgot', 'admin/auth/forgot');
$Route->post('forgot', 'AuthController@forgot');
$Route->get('remember', 'AuthController@remember', 'session');
$Route->post('newpassword', 'AuthController@newpassword');

// TODO: ############
$Route->group2('ajax', function () {
    \SmartSolucoes\Libs\Helper::ajax($_POST['controller'], $_POST['action'], $_POST['param']);
    exit();
});


$Route->group('admin', function ($Route) {

    if (@$_SESSION['acesso'] == 'Administrador' || @$_SESSION['acesso'] == 'Vendedor' || @$_SESSION['acesso'] == 'Financeiro') {

        $Route->get('', 'HomeController@vazio'); // Mudar no Controller caso tenha acessos diferentes
        $Route->get('inicio', 'HomeController@admin');

        $Route->group('account', function ($Route) {
            $Route->get('', 'AuthController@account');
            $Route->post('save', 'AuthController@update');
        });

        $Route->group('compromisso', function ($Route) {
            $Route->crud('appointment');
        });

        $Route->group('usuario', function ($Route) {
            $Route->crud('user');
        });

        $Route->group('configuracoes', function ($Route) {
            $Route->crud('configuracao');
        });
    } else {
        \SmartSolucoes\Libs\Helper::view('admin/auth/login');
    }
});

if (@$_SESSION['acesso'] == 'Administrador' || @$_SESSION['acesso'] == 'Vendedor' || @$_SESSION['acesso'] == 'Financeiro') {
} else {
    \SmartSolucoes\Libs\Helper::view('site/home/404');
}
