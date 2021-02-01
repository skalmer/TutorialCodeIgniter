<?php


class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_cliente($idCliente)
    {
        return $this->db->get_where('cliente', array('idCliente' => $idCliente))->row_array();
    }

    function get_nombre($idCliente)
    {
        $query  = $this->db->select('ClienteNombre')
            ->from('cliente')
            ->where('idCliente', $idCliente)
            ->get();
        return $query->row_array();
    }

    function get_all_clientes()
    {
        $this->db->order_by('idCliente', 'asc');
        return $this->db->get('cliente')->result_array();
    }
}
