<?php
class Materias extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getMaterias(){
		$query = $this->db->get('cat_materia');
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_cat_materia' 	=> $row->id_cat_materia,
		    	'materia' 			=> $row->descripcion,
		    	);
		}
		return $res;
	}
}// class Materias