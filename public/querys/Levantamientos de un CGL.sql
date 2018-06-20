SELECT
	id AS id_levantamiento
FROM
	Sistema_levantamiento
WHERE
	id_unidad_muestreo IN(
		SELECT
			871721 AS id

		UNION ALL

		SELECT
			u.id
		FROM
			Sistema_unidad_muestreo u
		WHERE
			id_unidad_muestreo_padre = 871721

		UNION ALL

		SELECT
			u.id
		FROM
			Sistema_unidad_muestreo u
		WHERE
			id_unidad_muestreo_padre IN(
				SELECT
					u.id
				FROM
					Sistema_unidad_muestreo u
				WHERE
					id_unidad_muestreo_padre = 871721)
		)