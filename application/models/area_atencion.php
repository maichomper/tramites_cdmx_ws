<?php
class Area_atencion extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Descripción: Busca areas de atención por trámite/servicio
	 * @param integer $id_tramite_servicio
	 * @return 
	 */
	public function getAreaAtencion($id){
		$query = $this->db->get_where('v_areas_atencion', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'id_cat_ente' 			=> $row->id_cat_ente,
		    	'nombre' 				=> $row->nombre,
		    	'calle_numero' 			=> $row->calle_numero,
		    	'delegacion' 			=> $row->delegacion,
		    	'colonia' 				=> $row->colonia,
		    	'cp' 					=> $row->cp,
		    	'telefono_1' 			=> $row->telefono_1,
		    	'ext_1' 				=> $row->ext_1,
		    	'telefono_2' 			=> $row->telefono_2,
		    	'ext_2' 				=> $row->ext_2,
		    	'url_ubicacion'			=> $row->url_ubicacion,
		    	);
		}
		return $res;
	}// getAreaAtencion

	/**
	 * Descripción: Busca delegaciones de areas de atención por trámite/servicio
	 * @param integer $id_tramite_servicio
	 * @return 
	 */
	public function getDelegacionAreaAtencion($id){
		$this->db->select('delegacion');
		$this->db->group_by('delegacion');
		$query = $this->db->get_where('v_areas_atencion', array('id_tramite_servicio' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'delegacion' 			=> $row->delegacion,
		    	);
		}
		return $res;
	}// getAreaAtencion

	/**
	 * Descripción: Busca areas de atención por trámite/servicio y delegación
	 * @param integer $id_tramite_servicio, string $delegacion
	 * @return 
	 */
	public function getAreaAtencionPorDelegacion($id, $delegacion){
		$area_atencion_data = array(
			'id_tramite_servicio' 	=> $id,
			'delegacion'			=> $delegacion
			);
		$query = $this->db->get_where('v_areas_atencion', $area_atencion_data);
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'id_cat_ente' 			=> $row->id_cat_ente,
		    	'nombre' 				=> $row->nombre,
		    	'calle_numero' 			=> $row->calle_numero,
		    	'delegacion' 			=> $row->delegacion,
		    	'colonia' 				=> $row->colonia,
		    	'cp' 					=> $row->cp,
		    	'telefono_1' 			=> $row->telefono_1,
		    	'ext_1' 				=> $row->ext_1,
		    	'telefono_2' 			=> $row->telefono_2,
		    	'ext_2' 				=> $row->ext_2,
		    	'url_ubicacion'			=> $row->url_ubicacion,
		    	);
		}
		return $res;
	}// getAreaAtencion

	/**
	 * Descripción: Busca oficinas por institución
	 * @param integer $id_institucion
	 * @return 
	 */
	public function getOficinas($id){
		$query = $this->db->get_where('v_areas_atencion', array('id_cat_ente' => $id));
		$res = array();

		foreach ($query->result() as $key=>$row)
		{
		    $res[$key] = array(
		    	'id_tramite_servicio' 	=> $row->id_tramite_servicio,
		    	'id_cat_ente' 			=> $row->id_cat_ente,
		    	'nombre' 				=> $row->nombre,
		    	'calle_numero' 			=> $row->calle_numero,
		    	'delegacion' 			=> $row->delegacion,
		    	'colonia' 				=> $row->colonia,
		    	'cp' 					=> $row->cp,
		    	'telefono_1' 			=> $row->telefono_1,
		    	'ext_1' 				=> $row->ext_1,
		    	'telefono_2' 			=> $row->telefono_2,
		    	'ext_2' 				=> $row->ext_2,
		    	'url_ubicacion'			=> $row->url_ubicacion,
		    	);
		}
		return $res;
	}
}