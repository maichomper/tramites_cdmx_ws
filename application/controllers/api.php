<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller
{
    function info_tramite_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getInfoTramite( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // info_tramite_get
    
    function nombres_ts_get()
    {
        $this->load->model('info_ts');
 
        $nombres_ts = $this->info_ts->getNombreTS();
         
        if($nombres_ts)
        {
            $this->response($nombres_ts, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // nombres_ts_get

    function tramites_servicios_get()
    {
        $this->load->model('info_ts');
        $tramites_servicios = $this->info_ts->getTramitesServicios();
         
        if($tramites_servicios)
        {
            $this->response($tramites_servicios, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // tramite_get

    function requisitos_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getRequisitos( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // requisitos_get

    function requisitos_esp_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $tramite = $this->info_ts->getRequisitosEsp( $this->get('id') );
         
        if($tramite)
        {
            $this->response($tramite, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // requisitos_esp_get

    function formatos_get(){
        $this->load->model('formato_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $formato = $this->formato_ts->getFormato( $this->get('id') );
         
        if($formato)
        {
            $this->response($formato, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // formatos_get

    function area_atencion_get(){
        $this->load->model('area_atencion');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getAreaAtencion( $this->get('id') );
         
        if($area_atencion)
        {
            $this->response($area_atencion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // area_atencion_get

    function documento_get(){
        $this->load->model('documento');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $documento = $this->documento->getDocumentoBeneficio( $this->get('id') );
         
        if($documento)
        {
            $this->response($documento, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // documento_get

    function temas_get(){
        $this->load->model('materias');
 
        $materias = $this->materias->getMaterias();
         
        if($materias)
        {
            $this->response($materias, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // documento_get

    function ts_tema_get(){
        $this->load->model('ts_materia');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $ts_tema = $this->ts_materia->getTemaTS( $this->get('id') );
         
        if($ts_tema)
        {
            $this->response($ts_tema, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // ts_tema_get

    function ts_institucion_get(){
        $this->load->model('ts_ente');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $ts_institucion = $this->ts_ente->getEnteTS( $this->get('id') );
         
        if($ts_institucion)
        {
            $this->response($ts_institucion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // ts_institucion_get

    function instituciones_get(){
        $this->load->model('entes');
 
        $entes = $this->entes->getEntes();
         
        if($entes)
        {
            $this->response($entes, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // instituciones_get

    function costo_get(){
        $this->load->model('costo');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $costo = $this->costo->getCosto( $this->get('id') );
         
        if($costo)
        {
            $this->response($costo, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // costo_get

    function procedimiento_get(){
        $this->load->model('procedimiento');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $procedimiento = $this->procedimiento->getProcedimiento( $this->get('id') );
         
        if($procedimiento)
        {
            $this->response($procedimiento, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // procedimiento_get

} // class Api
?>