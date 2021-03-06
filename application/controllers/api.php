<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller
{
    /** 
     * Descripción: Regresa información de trámite/servicio 
     * @param 
     * @return 
     */ 
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
    
    /**
     * Descripción: Regresa nombres de trámites/servicios
     * @param 
     * @return 
     */
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

    /**
     * Descripción: Regresa nombres de trámites/servicios mas comunes
     * @param 
     * @return 
     */
    function nombres_ts_comunes_get()
    {
        $this->load->model('info_ts');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $id_str = explode('-', $this->get('id'));
        $id_array = array();
        foreach ($id_str as $value) {
            array_push($id_array, $value);
        }

        $nombres_ts = $this->info_ts->getNombreTSComunes( $id_array );
         
        if($nombres_ts)
        {
            $this->response($nombres_ts, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // nombres_ts_comunes_get

    /**
     * Descripción: Regresa trámites/servicios que se pueden realizar en línea
     * @param 
     * @return 
     */
    function ts_en_linea_get()
    {
        $this->load->model('info_ts');
 
        $ts_en_linea = $this->info_ts->getTSEnLinea();
         
        if($ts_en_linea)
        {
            $this->response($ts_en_linea, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // ts_en_linea_get

    /** 
     * Descripción: Regresa información de trámite/servicio 
     * @param 
     * @return 
     */ 
    function buscar_get() 
    {

        $this->load->model('info_ts');
        if(!$this->get('term'))
        {
            $this->response(NULL, 400);
        }
        
        $term = urldecode($this->get('term'));
        $tramites = $this->info_ts->busquedaTS( $term );

         
        if($tramites)
        {
            $this->response($tramites, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // buscar_get

    /**
     * Descripción: Regresa requisitos generales de trámites/servicios 
     * @param 
     * @return 
     */
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

    /**
     * Descripción: Regresa requisitos especificos de trámites/servicios 
     * @param 
     * @return 
     */
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
    
    /**
     * Descripción: Regresa formatos de un trámite/servicio 
     * @param 
     * @return 
     */
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

    /**
     * Descripción: Regresa formatos de un trámite/servicio 
     * @param 
     * @return 
     */
    function delegaciones_get(){
        $this->load->model('delegacion');
        
        $delegacion = $this->delegacion->getDelegaciones();
         
        if($delegacion)
        {
            $this->response($delegacion, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(NULL, 404);
        }
    } // delegaciones_get

    /**
     * Descripción: Regresa formatos de un trámite/servicio 
     * @param 
     * @return 
     */
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

    /**
     * Descripción: Regresa area de atencion por delegacion de un trámite/servicio 
     * @param 
     * @return 
     */
    function area_atencion_tramite_delegacion_get(){
        //header('Access-Control-Allow-Origin: *');
        $this->load->model('area_atencion');
        if(!$this->get('id') || !$this->get('del'))
        {
           $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getAreaAtencionPorTramiteDelegacion( $this->get('del'), $this->get('id') );
         
        if($area_atencion)
        {
            $this->response($area_atencion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // area_atencion_tramite_delegacion_get

    /**
     * Descripción: Regresa area de atencion por delegacion de un trámite/servicio 
     * @param 
     * @return 
     */
    function horario_area_atencion_get(){

        $this->load->model('area_atencion');
        if(!$this->get('id'))
        {
           $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getHorarioAreaAtencion( $this->get('id') );
         
        if($area_atencion)
        {
            $this->response($area_atencion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // horario_area_atencion_get

    /**
     * Descripción: Regresa area de atencion por delegacion 
     * @param 
     * @return 
     */
    function area_atencion_delegacion_get(){

        $this->load->model('area_atencion');
        if(!$this->get('del'))
        {
           $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getAreaAtencionPorDelegacion( $this->get('del') );
         
        if($area_atencion)
        {
            $this->response($area_atencion, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // area_atencion_delegacion_get

    /**
     * Descripción: Regresa areas de atención por delegación para un trámite
     * @param 
     * @return 
     */
    function delegacion_area_atencion_get(){

        $this->load->model('area_atencion');
        if(!$this->get('id'))
        {
           $this->response(NULL, 400);
        }
 
        $delegaciones = $this->area_atencion->getDelegacionAreaAtencion( $this->get('id') );
         
        if($delegaciones)
        {
            $this->response($delegaciones, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // area_atencion_delegacion_get

    function oficinas_get(){
        $this->load->model('area_atencion');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $area_atencion = $this->area_atencion->getOficinas( $this->get('id') );
         
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

    function institucion_get(){
        $this->load->model('ts_ente');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $ts_institucion = $this->ts_ente->getEnte( $this->get('id') );
         
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
 
        $entes = $this->entes->getEntesPadre();
         
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

    /**
     * Descripción: Regresa áreas de pago para un trámite/servcio
     * @param 
     * @return 
     */
    function area_pago_get()
    {
        $this->load->model('area_pago');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $area_pago = $this->area_pago->getAreaPago( $this->get('id') );
         
        if($area_pago)
        {
            $this->response($area_pago, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // area_pago_get

    /**
     * Descripción: Regresa áreas de pago para un trámite/servcio
     * @param 
     * @return 
     */
    function info_juridica_get()
    {
        $this->load->model('info_juridica');
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $info_juridica = $this->info_juridica->getInfoJuridica( $this->get('id') );
         
        if($info_juridica)
        {
            $this->response($info_juridica, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    } // info_juridica_get

} // class Api
?>