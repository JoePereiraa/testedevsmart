<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\User;
use SmartSolucoes\Libs\Helper;

class UserController
{

    private $table = 'user';
    private $baseView = 'admin/user';
    private $urlIndex = 'usuario';

    public function index()
    {
        $model = new User();
        $response = $model->allUsers($this->table, 'id DESC');
        Helper::view($this->baseView . '/index', $response);
    }

    public function viewNew()
    {
        $model = new User();
        $response = $model->all($this->table, 'nome DESC');
        Helper::view($this->baseView . '/edit', $response);
    }

    public function viewEdit($param)
    {
        $model = new User();
        $response = $model->find($this->table, $param['id']);
        $response = $model->all($this->table, 'nome DESC');
        Helper::view($this->baseView . '/edit', $response);
    }

    public function create()
    {
        $model = new User();
        // if ($_POST['senha']) $_POST['senha'] = md5($_POST['senha']);
        // else unset($_POST['senha']);
        // $_POST['acesso'] = 'Empresa';
        // if (@$_SESSION['acesso'] == 'Empresa') $_POST['id_loja'] = $_SESSION['id_loja'];
        $id = $model->create($this->table, $_POST, ['id', 'image']);
        if ($id) {
            // foreach ($_POST['permissoes'] as $permissao) {
            //     $model->create('user_permissao', ['id_user' => $id, 'id_permissao' => $permissao]);
            // }
            $caminho = 'files/user/';
            $nome_imagem = $id . '_' . time();
            $formato = 'jpg';
            if (Helper::upload($_FILES['imagem'], $nome_imagem, $caminho, $formato, 200, 200)) {
                $model->save($this->table, ['id' => $id, 'imagem' => $caminho . $nome_imagem . '.' . $formato]);
            }
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView . '/edit', $_POST);
        }
    }

    public function update()
    {
        $model = new User();
        if ($_POST['senha']) $_POST['senha'] = md5($_POST['senha']);
        else unset($_POST['senha']);
        if (@$_SESSION['acesso'] == 'Empresa') $_POST['id_loja'] = $_SESSION['id_loja'];
        if ($model->save($this->table, $_POST, ['image', 'permissoes'])) {
            $id = $_POST['id'];
            $model->delete('user_permissao', 'id_user', $id, 'all');
            foreach ($_POST['permissoes'] as $permissao) {
                $model->create('user_permissao', ['id_user' => $id, 'id_permissao' => $permissao]);
            }
            $caminho = 'files/user/';
            $nome_imagem = $_POST['id'] . '_' . time();
            $formato = 'jpg';
            if (Helper::upload($_FILES['imagem'], $nome_imagem, $caminho, $formato, 200, 200)) {
                $model->save($this->table, ['id' => $id, 'imagem' => $caminho . $nome_imagem . '.' . $formato]);
            }
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView . '/edit/' . $_POST['id']);
        }
    }

    public function delete($param)
    {
        $model = new User();
        $model->delete($this->table, 'id', $param['id']);
        header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
    }
}
