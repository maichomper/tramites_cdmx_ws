-- VISTA INFO TRÁMITES Y SERVICIOS
CREATE VIEW v_info_ts
AS
SELECT CatTS.id_cat_tramite_servicio, CatTS.descripcion AS nombre_tramite, TS.descripcion AS descripcion_ts, TS.id_tramite_servicio, CatEnte.descripcion AS ente, TS.tiempo_respuesta, TS.beneficiario, CatMat.id_cat_materia, CatMat.descripcion AS materia, TS.is_tramite, CatMat.tramite_servicio, url_nvl_automatizacion, nvl_automatizacion, formasolicitud, tel_presentacion, ext_presentacion, observaciones, negativa_ficta, afirmativa_ficta
FROM cat_tramite_servicio CatTS 
INNER JOIN tramite_servicio TS ON TS.id_cat_tramite_servicio = CatTS.id_cat_tramite_servicio
INNER JOIN cat_ente CatEnte ON CatEnte.id_cat_ente = TS.id_ente_responsable
INNER JOIN cat_materia CatMat ON CatMat.id_cat_materia = CatTS.id_cat_materia
WHERE id_cat_estatus = 16;

-- VISTA TRAMITE SERVICIO POR MATERIA
CREATE VIEW v_ts_materia
AS
SELECT id_tramite_servicio, CatTS.id_cat_materia, CatTS.descripcion AS tramite_servicio, CatMat.descripcion AS materia
FROM tramite_servicio TS 
INNER JOIN cat_tramite_servicio CatTS ON TS.id_cat_tramite_servicio = CatTS.id_cat_tramite_servicio
INNER JOIN cat_materia CatMat ON CatMat.id_cat_materia = CatTS.id_cat_materia
WHERE id_cat_estatus = 16
ORDER BY tramite_servicio;

-- VISTA TRAMITE SERVICIO POR ENTE
CREATE VIEW v_ts_ente
AS
SELECT TS.id_tramite_servicio, CatTS.descripcion AS tramite_servicio, id_cat_ente_norma, Ente.descripcion AS ente, ente_padre
FROM cat_tramite_servicio CatTS
INNER JOIN tramite_servicio TS ON CatTS.id_cat_tramite_servicio = TS.id_cat_tramite_servicio
INNER JOIN cat_ente Ente ON Ente.id_cat_ente = CatTS.id_cat_ente_norma
WHERE id_cat_estatus = 16
ORDER BY tramite_servicio;

-- VISTA NOMBRE TRÁMITES
CREATE VIEW v_nombre_ts
AS
SELECT TS.id_tramite_servicio, CatTS.descripcion AS nombre_tramite
FROM cat_tramite_servicio CatTS 
INNER JOIN tramite_servicio TS ON TS.id_cat_tramite_servicio = CatTS.id_cat_tramite_servicio
WHERE id_cat_estatus = 16
ORDER BY TS.id_tramite_servicio;

-- VISTA REQUISITOS
CREATE VIEW v_requisito_ts
AS
SELECT ReqTS.id_requisito_ts, CatReq.id_cat_requisito, id_tramite_servicio, CatCatReq.descripcion AS documento_oficial, CatReq.descripcion AS documento_acreditacion, conjuncion, original_copia, num_copias
FROM requisito_ts ReqTS 
INNER JOIN cat_requisito CatReq ON CatReq.id_cat_requisito = ReqTS.id_cat_requisito
INNER JOIN cat_categoria_requisito CatCatReq ON CatCatReq.id_cat_categoria_requisito = CatReq.categoria
WHERE eliminado = 1 AND CatReq.descripcion <> 'No se requiere'
ORDER BY id_tramite_servicio, categoria; 

-- VISTA REQUISITOS ESPECÍFICOS
CREATE VIEW v_requisito_esp_ts
AS
SELECT id_requisito_especifico_ts, ReqEspTS.descripcion AS requisito_especifico, TS.id_tramite_servicio
FROM requisito_especifico_ts ReqEspTS
INNER JOIN tramite_servicio TS ON TS.id_tramite_servicio = ReqEspTS.id_tramite_servicio
WHERE eliminado = 1
AND id_cat_estatus = 16;

-- VISTA DOCUMENTOS
CREATE VIEW v_documento_ts
AS
SELECT CatDoc.id_cat_documento, id_documento_ts, id_tramite_servicio, descripcion, vigencia FROM 
cat_documento CatDoc 
INNER JOIN documento_ts Doc ON CatDoc.id_cat_documento = Doc.id_cat_documento;

-- VISTA AREAS DE ATENCIÓN POR TS
CREATE VIEW v_areas_atencion
AS
SELECT id_tramite_servicio, id_cat_ente, nombre, calle_numero,Del.descripcion AS delegacion, Col.colonia AS colonia, cp, telefono_1, ext_1, telefono_2, ext_2, url_ubicacion, area_atencion_ts.id_area_atencion_ts 
FROM tramite_area_atencion
INNER JOIN area_atencion_ts ON area_atencion_ts.id_area_atencion_ts=tramite_area_atencion.id_area_atencion_ts
INNER JOIN cat_delegacion Del ON Del.id_cat_delegacion = area_atencion_ts.id_delegacion
INNER JOIN cat_colonias_cp Col ON Col.id_colonia = area_atencion_ts.id_colonia
WHERE tramite_area_atencion.eliminado = 1 AND area_atencion_ts.eliminado = 1;

-- VISTA AREAS DE ATENCIÓN PARA DIRECTORIO
CREATE VIEW v_areas_atencion_dir
AS
SELECT area_atencion_ts.id_cat_ente,
    area_atencion_ts.nombre,
    area_atencion_ts.calle_numero,
    del.descripcion AS delegacion,
    col.colonia,
    area_atencion_ts.cp,
    area_atencion_ts.telefono_1,
    area_atencion_ts.ext_1,
    area_atencion_ts.telefono_2,
    area_atencion_ts.ext_2,
    area_atencion_ts.url_ubicacion,
    area_atencion_ts.id_area_atencion_ts
   FROM (((area_atencion_ts
     JOIN cat_delegacion del ON ((del.id_cat_delegacion = area_atencion_ts.id_delegacion)))
     JOIN cat_colonias_cp col ON ((col.id_colonia = area_atencion_ts.id_colonia)))
     JOIN horario_atencion hor_aten ON ((hor_aten.id_area_atencion_ts = area_atencion_ts.id_area_atencion_ts)))
  WHERE (area_atencion_ts.eliminado = 1 AND hor_aten.eliminado = 1)
  GROUP BY area_atencion_ts.id_cat_ente,
    area_atencion_ts.nombre,
    area_atencion_ts.calle_numero,
    delegacion,
    col.colonia,
    area_atencion_ts.cp,
    area_atencion_ts.telefono_1,
    area_atencion_ts.ext_1,
    area_atencion_ts.telefono_2,
    area_atencion_ts.ext_2,
    area_atencion_ts.url_ubicacion,
    area_atencion_ts.id_area_atencion_ts
  ORDER BY delegacion, id_area_atencion_ts; 


