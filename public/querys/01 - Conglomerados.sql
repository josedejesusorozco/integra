SELECT
	u.*
FROM
	Sistema_unidad_muestreo AS u
INNER JOIN
	Sistema_levantamiento AS l ON(l.id_unidad_muestreo = u.id)
INNER JOIN
	Satelites_caracteristica_condicion_levantamiento AS cl ON(cl.id_levantamiento = l.id)
WHERE
	u.id_unidad_muestreo_padre = 0