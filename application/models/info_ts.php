<?php
class Info_ts extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	} // constructor

	public function getInfoTramite($id){
		$query = $this->db->get_where('v_info_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res = array(
		    	'id_cat_tramite_servicio' 	=> $row->id_cat_tramite_servicio,
		    	'nombre_tramite' 			=> $row->nombre_tramite,
		    	'descripcion' 				=> $row->descripcion_ts,
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'ente'	 					=> $row->ente,
		    	'tiempo_respuesta'	 		=> $row->tiempo_respuesta,
		    	'beneficiario'	 			=> $row->beneficiario,
		    	'id_materia'				=> $row->id_cat_materia,
		    	'materia'					=> $row->materia,
		    	'tramite_servicio'    		=> $row->tramite_servicio, 
		    	'is_tramite'				=> $row->is_tramite,
		    	'url_nvl_automatizacion' 	=> $row->url_nvl_automatizacion,
		    	'nvl_automatizacion' 		=> $row->nvl_automatizacion,
		    	'formasolicitud' 			=> $row->formasolicitud,
		    	'tel_presentacion' 			=> $row->tel_presentacion,
		    	);
		}
		return $res;
	} // getInfoTramites

	public function getNombreTS(){
		$query = $this->db->get('v_nombre_ts');
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'nombre_ts' 				=> $row->nombre_tramite,
		    	);
		}
		return $res;
	}

	public function getNombreTSComunes($id_ts){
		$this->db->where_in('id_tramite_servicio', $id_ts);
		$query = $this->db->get('v_nombre_ts');
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'nombre_ts' 				=> $row->nombre_tramite,
		    	);
		}
		return $res;
	}

	public function getTramitesServicios(){
		$this->db->select('*');
		$this->db->from('v_info_ts');
		$this->db->limit(15);
		$this->db->order_by('tramite_servicio', 'asc');
		$query = $this->db->get();

		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'nombre_ts' 				=> $row->nombre_tramite,
		    	'id_tramite_servicio' 		=> $row->id_tramite_servicio,
		    	'tramite_servicio'    		=> $row->tramite_servicio
		    	);
		}
		return $res;
	}

	public function getRequisitos($id){
		$query = $this->db->get_where('v_requisito_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_requisito_ts'	 		=> $row->id_requisito_ts,
		    	'id_cat_requisito' 			=> $row->id_cat_requisito,
		    	'id_tramite_servicio'	 	=> $row->id_tramite_servicio,
		    	'documento_oficial' 		=> $row->documento_oficial,
		    	'documento_acreditacion' 	=> $row->documento_acreditacion,
		    	'conjuncion'	 			=> $row->conjuncion,
		    	);
		}
		return $res;
	}

	public function getRequisitosEsp($id){
		$query = $this->db->get_where('v_requisito_esp_ts', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_requisito_especifico_ts'	=> $row->id_requisito_especifico_ts,
		    	'requisito_especifico' 			=> $row->requisito_especifico,
		    	'id_tramite_servicio'	 		=> $row->id_tramite_servicio,
		    	);
		}
		return $res;
	}
}