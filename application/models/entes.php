<?php
class Entes extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getEntes(){
		$this->db->order_by('descripcion');
		$query = $this->db->get('cat_ente');

		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_cat_institucion' 	=> $row->id_cat_ente,
		    	'institucion' 			=> $row->descripcion,
		    	);
		}
		return $res;
	}
}// class Entes