<?php
class Comporacion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comparacion_model');
    }

    function index()
    {
        $data['_view'] = 'contratos/fechas';
        $this->load->view('layouts/main', $data);
    }
    function compara()
    {
        $params = array(
            'fecha1' => $this->input->post('fecha1'),
            'fecha2' => $this->input->post('fecha2'),
        );
        $data['contratos'] = $this->Comparacion_model->compara_fechas($params);
        $data['fecha'] = $params;
        $data['_view'] = 'contratos/resultado';
        $this->load->view('layouts/main', $data);
    }
}
