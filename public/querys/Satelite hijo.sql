SELECT
	l.id_unidad_muestreo
	, nuevo.id_tabla_relacion
	, t.id AS id_tabla_relacion_anterior
	, hijo.id
FROM
	infys.Satelites_caracteristica_danio_individuo hijo
INNER JOIN
	infys.Satelites_caracteristica_arbolado t ON(t.id = hijo.id_tabla_relacion)
INNER JOIN
	infys.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
LEFT JOIN (
	SELECT
		t.id AS id_tabla_relacion,
		l.id_unidad_muestreo,
		t.id_anterior AS id_tabla_relacion_anterior
	FROM
		main.Satelites_caracteristica_arbolado t
	INNER JOIN
		main.Sistema_levantamiento l ON(l.id = t.id_levantamiento)
	) AS nuevo ON(nuevo.id_unidad_muestreo = l.id_unidad_muestreo AND nuevo.id_tabla_relacion_anterior = t.id)
	
	
	
	
INSERT INTO main.Satelites_caracteristica_danio_individuo (
	id_tabla_relacion,
	tabla_relacion,
	id_danio,
	id_severidad,
	porcentaje_danio,
	id_anterior
) SELECT
	nuevo.id_tabla_relacion,
	t.tabla_relacion,
	t.id_danio,
	t.id_severidad,
	t.porcentaje_danio,
	hijo.id
FROM
	infys.Satelites_caracteristica_danio_individuo hijo
INNER JOIN infys.Satelites_caracteristica_arbolado t ON (
	t.id = hijo.id_tabla_relacion
)
INNER JOIN infys.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
LEFT JOIN (
	SELECT
		t.id AS id_tabla_relacion,
		l.id_unidad_muestreo,
		t.id_anterior AS id_tabla_relacion_anterior
	FROM
		main.Satelites_caracteristica_arbolado t
	INNER JOIN main.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
) AS nuevo ON (
	nuevo.id_unidad_muestreo = l.id_unidad_muestreo
	AND nuevo.id_tabla_relacion_anterior = t.id
)