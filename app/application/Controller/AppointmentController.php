<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Appointment;
use SmartSolucoes\Libs\Helper;

class AppointmentController
{

    private $table = 'appointment';
    private $baseView = 'admin/compromisso';
    private $urlIndex = 'compromisso';

    public function index()
    {
        $model = new Appointment();
        $response = $model->allAppointments($this->table, 'title DESC');
        Helper::view($this->baseView . '/index', $response);
    }

    public function create()
    {
        $model = new Appointment();
        $id = $model->create($this->table, $_POST, ['id']);

        if ($id) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView . '/index', $_POST);
        }
    }

    public function update()
    {
        $model = new Appointment();

        if ($model->save($this->table, $_POST, ['id, title, start_date, end_date, status'])) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView . '/index' . $_POST['id']);
        }
    }

    public function delete($param)
    {
        $model = new Appointment();
        $model->delete($this->table, 'id', $param['id']);
        header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
    }
}
