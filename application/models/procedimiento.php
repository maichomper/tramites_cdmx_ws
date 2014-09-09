<?php
class Procedimiento extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getProcedimiento($id){
		$query = $this->db->get_where('procedimiento_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'paso' 					=> $row->paso,
		    	'accion' 				=> $row->accion,
		    	'actor' 				=> $row->id_actor
		    	);
		}
		return $res;
	}
}