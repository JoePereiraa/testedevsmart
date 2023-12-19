<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Home;

class HomeController
{

    public function vazio()
    {
        if(@$_SESSION['acesso'] == 'Administrador' || @$_SESSION['acesso'] == 'Vendedor' || @$_SESSION['acesso'] == 'Financeiro') {
        header('location: ' . URL_ADMIN . '/inicio');
        } else {
            Helper::view('admin/auth/login');
        }

    }

    public function admin()
    {
        Helper::view('admin/home/index');
    }

    public function client()
    {
        Helper::view('admin/home/index');
    }

}
