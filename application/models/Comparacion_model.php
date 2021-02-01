<?php
class Comparacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_contratos($idcontrato)
    {
        return $this->db->get_where('contratos', array('idContratos' => $idcontrato))->row_array();
    }

    function get_all_contratos()
    {
        $this->db->order_by('idContratos', 'asc');
        return $this->db->get('contratos')->result_array();
    }

    function delete_contrato($idcontrato)
    {
        return $this->db->delete('contratos', array('idContratos' => $idcontrato));
    }


    function compara_fechas($fecha)
    {
        $this->load->model('Cliente_model');

        $query  = $this->db->select('*')
            ->from('contratos')
            ->where('Fecha BETWEEN "' . $fecha['fecha1'] . '" and "' . $fecha['fecha2'] . '"')
            ->order_by('idCliente')

            ->get();
        $datos = $query->result_array();
        $nuevo = array();
        $i = 0;
        $j = 0;
        $aux = 0;
        $aux2 = 0;
        $total = 0;
        foreach ($datos as $r) {
            if ($r['idCliente'] != $aux) {
                if ($j != 0) {
                    $data[$aux2]['Contrato'] = $j;
                    $data[$aux2]['Monto'] = $total;
                    $total = 0;
                    $j = 0;
                }
                $aux = $r['idCliente'];
                $aux2 = $aux2 + 1;
                $data[$aux2]['idCliente'] = $this->Cliente_model->get_nombre($r['idCliente'])['ClienteNombre'];
                $datos[$i]['idCliente'] = $this->Cliente_model->get_nombre($r['idCliente'])['ClienteNombre'];
                $total = $total + $r['Monto'];
                $j = $j + 1;
            } else {
                $j = $j + 1;
                $total = $total + $r['Monto'];
            }
            if ($j != 0) {
                $data[$aux2]['Contrato'] = $j;
                $data[$aux2]['Monto'] = $total;
            }
            $i = $i + 1;
        }
        return $data;
    }

    /*$query = $this->db->select('ClienteNombre,Monto')
            ->from('contratos')
            ->join('cliente', 'idCliente')
            ->order_by('idCliente')
            ->get();
        $date = $query->result_array();*/
}
