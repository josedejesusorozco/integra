SELECT
	--t.id,
	--l.id AS id_levantamiento,
	l2.id_levantamiento,
	t.id_coordenada,
	t.id_condicion_acceso,
	t.paraje,
	t.conglomerado,
	t.sitio,
	t.id_anterior
	--, l2.*
FROM
	infys.Satelites_caracteristica_punto_control t
INNER JOIN
	infys.Sistema_levantamiento l ON (l.id = t.id_levantamiento)
INNER JOIN
	infys.Sistema_unidad_muestreo u ON(u.id = l.id_unidad_muestreo)
LEFT JOIN
	(
	SELECT
		l.id AS id_levantamiento
		, l.id_anterior AS id_levantamiento_anterior
		, l.id_unidad_muestreo
	FROM
		main.Sistema_levantamiento l
	INNER JOIN
		main.Sistema_unidad_muestreo u ON(u.id = l.id_unidad_muestreo)
	) l2
	ON(l2.id_levantamiento_anterior = l.id AND l2.id_unidad_muestreo = u.id)