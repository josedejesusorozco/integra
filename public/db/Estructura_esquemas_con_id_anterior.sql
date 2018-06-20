USE INFyS2015

--CREATE SCHEMA Catalogos
--CREATE SCHEMA Satelites
--CREATE SCHEMA Sistema
-- ----------------------------
-- Table structure for Catalogos.brigadista
-- ----------------------------
DROP TABLE IF EXISTS Catalogos.brigadista;
CREATE TABLE Catalogos.brigadista (
    id               INTEGER  NOT NULL
                              PRIMARY KEY,
    nombre           NVARCHAR(50) NOT NULL,
    apellido_paterno NVARCHAR(50) NOT NULL,
    apellido_materno NVARCHAR(50),
    fecha_nacimiento DATE,
    profesion        NVARCHAR(50),
    curp             NVARCHAR(25),
    id_empresa       INT,
    activo           BIT      NOT NULL
                              DEFAULT ( (1) ) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Catalogos.empresa
-- ----------------------------
DROP TABLE IF EXISTS Catalogos.empresa;
CREATE TABLE Catalogos.empresa (
    id     INTEGER  NOT NULL
                    PRIMARY KEY,
    nombre NVARCHAR(100) NOT NULL,
    rfc    NVARCHAR(13)
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_agua_fisica_quimica
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_agua_fisica_quimica;
CREATE TABLE Satelites.caracteristica_agua_fisica_quimica (
    id               INTEGER PRIMARY KEY ,
    id_levantamiento INT     NOT NULL,
    tipo             NVARCHAR(100)  NOT NULL,
    salinidad        REAL,
    temperatura      REAL,
    conductividad    REAL,
    ph               REAL,
    potencial_redox  REAL,
    profundidad      INTEGER
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_arbolado
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_arbolado;
CREATE TABLE Satelites.caracteristica_arbolado (
    id                          INTEGER              NOT NULL
                                                     PRIMARY KEY ,
    id_levantamiento            INTEGER              ,
    numero_arbol                INTEGER              ,
    id_coordenada               INTEGER,
    id_especie                  INTEGER              ,
    id_forma_biologica          INTEGER,
    id_forma_fuste              INTEGER,
    id_condicion                INTEGER              ,
    diametro_altura_pecho       FLOAT                ,
    altura_total                FLOAT                ,
    altura_fuste_limpio         FLOAT                ,
    altura_comercial            FLOAT                ,
    diametro_copa               FLOAT                ,
    posicion_copa               NVARCHAR(200),
    proporcion_copa_viva        FLOAT,
    exposicion_luz              NVARCHAR(200),
    densidad_copa               FLOAT,
    transparencia_copa          FLOAT,
    muerte_regresiva            FLOAT,
    descripcion                 TEXT,
    numero_tallo                INTEGER,
    id_vigor                    INTEGER,
    id_vigor_etapa              INTEGER,
    id_forma_biologica_tocon    INTEGER,
    id_especie_cat_tax          INTEGER,
    x                           REAL,
    y                           REAL,
    id_colecta_botanica         INTEGER,
    azimut                      FLOAT,
    distancia                   FLOAT,
    angulo_inclinacion          FLOAT,
    diametro_copa_norte_sur     FLOAT,
    diametro_copa_este_oeste    FLOAT,
    nombre_comun                NVARCHAR(100),
    id_forma_geometrica         INTEGER,
    numero_tallos_pencas        INTEGER,
    id_forma_crecimiento        INTEGER,
    altura_total_maxima         FLOAT,
    altura_total_media          FLOAT,
    altura_total_minima         FLOAT,
    diametro_basal              FLOAT,
    id_grado_putrefaccion_tocon INTEGER,
    id_clase_muerto_pie         INTEGER,
    densidad_follaje_colonia    INTEGER
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_arbolado_uso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_arbolado_uso;
CREATE TABLE Satelites.caracteristica_arbolado_uso (
    id                         INTEGER NOT NULL
                                       PRIMARY KEY ,
    id_caracteristica_arbolado INTEGER NOT NULL,
    id_uso                     INTEGER NOT NULL,
    id_mercado                 INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_brigadista
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_brigadista;
CREATE TABLE Satelites.caracteristica_brigadista (
    id               INTEGER  NOT NULL
                              PRIMARY KEY,
    id_empresa       INT      NOT NULL,
    id_levantamiento INT      NOT NULL,
    id_brigadista    INT      NOT NULL,
    puesto           NVARCHAR(50) NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_cobertura_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_cobertura_suelo;
CREATE TABLE Satelites.caracteristica_cobertura_suelo (
    id                         INTEGER       NOT NULL
                                             PRIMARY KEY ,
    id_levantamiento           INTEGER       NOT NULL,
    id_suelo                   INTEGER       NOT NULL,
    porcentaje_cobertura_suelo FLOAT,
    rango_cobertura            NVARCHAR (50) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_cobertura_transecto
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_cobertura_transecto;
CREATE TABLE Satelites.caracteristica_cobertura_transecto (
    id               INTEGER NOT NULL
                             PRIMARY KEY ,
    id_levantamiento INTEGER NOT NULL,
    numero_transecto INTEGER NOT NULL,
    presencia        BIT     NOT NULL,
    id_medicion      INTEGER NOT NULL,
    numero_punto     INT     NOT NULL,
    id_suelo         INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_colecta_botanica
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_colecta_botanica;
CREATE TABLE [Satelites.caracteristica_colecta_botanica] (
  [id] INTEGER NOT NULL PRIMARY KEY,
  [id_levantamiento] int NOT NULL,
  [iniciales_colector] nvarchar(50) NOT NULL,
  [numero_colecta] int NOT NULL,
  [nomenclatura_colecta] nvarchar(5),
  [identificador_individuo] nvarchar(10),
  [consecutivo_unidad_muestreo] int NOT NULL,
  [clave_colecta] nvarchar(30) NOT NULL,
  [nombre_colector] nvarchar(100),
  [sin_identidad_taxonomica] bit,
  [con_identidad_taxonomica_representatividad] bit,
  [ejemplar1] bit NOT NULL DEFAULT 0,
  [ejemplar2] bit NOT NULL DEFAULT 0,
  [ejemplar3] bit NOT NULL DEFAULT 0,
  [ejemplar4] bit NOT NULL DEFAULT 0,
  [ejemplar5] bit NOT NULL DEFAULT 0,
  [ejemplar6] bit NOT NULL DEFAULT 0,
  [observaciones] text,
  [id_tabla_realcion] INT,
  [tabla_relacion] VARCHAR(100)
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
  );

-- ----------------------------
-- Table structure for Satelites.caracteristica_colecta_botanica_observaciones
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_colecta_botanica_observaciones;
CREATE TABLE [Satelites.caracteristica_colecta_botanica_observaciones](
        [id] [INTEGER]  PRIMARY KEY NOT NULL,
        [id_caracteristica_colecta_botanica] [int] NOT NULL,
        [id_observacion_colecta_botanica] [int] NOT NULL,
        [valor] [nvarchar](50) NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible;
CREATE TABLE Satelites.caracteristica_combustible (
    id                 INTEGER NOT NULL
                               PRIMARY KEY ,
    id_levantamiento   INTEGER NOT NULL,
    id_forma_biologica INTEGER NOT NULL,
    id_medicion        INTEGER NOT NULL,
    numero_transecto   INTEGER NOT NULL,
    valor              FLOAT   NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible_forma_biologica
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible_forma_biologica;
CREATE TABLE Satelites.caracteristica_combustible_forma_biologica (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_levantamiento            INTEGER NOT NULL,
    id_medicion                 INTEGER NOT NULL,
    frecuencia                  REAL  NOT NULL,
    id_forma_biologica          INTEGER NOT NULL,
    id_caracteristica_transecto INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible_lenioso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible_lenioso;
CREATE TABLE Satelites.caracteristica_combustible_lenioso (
    id                    INTEGER NOT NULL
                                  PRIMARY KEY ,
    id_levantamiento      INTEGER NOT NULL,
    id_medicion           INTEGER NOT NULL,
    numero_transecto      INTEGER NOT NULL,
    porcentaje_pendiente  FLOAT   NOT NULL,
    diametro              FLOAT   NOT NULL,
    id_grado_putrefaccion INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible_longitud_interceptada
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible_longitud_interceptada;
CREATE TABLE Satelites.caracteristica_combustible_longitud_interceptada (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_levantamiento            INT     NOT NULL,
    id_cubierta_suelo           INT     NOT NULL,
    id_especie                  INT     ,
    id_medicion                 INT     NOT NULL,
    longitud_segmento           INT,
    id_caracteristica_transecto INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible_mayor
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible_mayor;
CREATE TABLE Satelites.caracteristica_combustible_mayor (
    id                          INTEGER  NOT NULL
                                         PRIMARY KEY ,
    id_levantamiento            INT      NOT NULL,
    diametro                    REAL   NOT NULL,
    id_grado_putrefaccion       INT      NOT NULL,
    nivel_original              SMALLINT,
    id_caracteristica_transecto INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_combustible_menor
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_combustible_menor;
CREATE TABLE Satelites.caracteristica_combustible_menor (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_levantamiento            INT     NOT NULL,
    frecuencia_1_hr             FLOAT   NOT NULL,
    frecuencia_10_hrs           FLOAT   NOT NULL,
    frecuencia_100_hrs          FLOAT   NOT NULL,
    id_caracteristica_transecto INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_condicion_levantamiento
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_condicion_levantamiento;
CREATE TABLE Satelites.caracteristica_condicion_levantamiento (
    id                                [INTEGER]        PRIMARY KEY
                                                       NOT NULL,
    id_levantamiento                  [INT]            NOT NULL,
    id_condicion_levantamiento        [INT]            NOT NULL,
    condicion_levantamiento_otros     [NVARCHAR] (100),
    trazado_evidencia_muestreo        INTEGER,
    id_coordenada_ultimo_punto_acceso INTEGER,
    lugar_justificacion               VARCHAR (250)
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_contacto
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_contacto;
CREATE TABLE Satelites.caracteristica_contacto (
    id               INTEGER  NOT NULL
                              PRIMARY KEY,
    id_levantamiento INT,
    nombre           NVARCHAR(100) NOT NULL,
    forma_contacto   NVARCHAR(50),
    direccion        NVARCHAR(100),
    telefono         NVARCHAR(30),
    tipo_telefono    NVARCHAR(20),
    canal_radio      INT,
    frecuencia_radio FLOAT,
    email            NVARCHAR(100)
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_cubierta_vegetacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_cubierta_vegetacion;
CREATE TABLE Satelites.caracteristica_cubierta_vegetacion (
    id                           INTEGER NOT NULL
                                         PRIMARY KEY ,
    id_levantamiento             INTEGER NOT NULL,
    id_vegetacion                INTEGER NOT NULL,
    porcentaje_cobertura_vegetal FLOAT   NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_cuerpo_agua
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_cuerpo_agua;
CREATE TABLE Satelites.caracteristica_cuerpo_agua (
    id                        INTEGER       NOT NULL
                                            PRIMARY KEY ,
    id_levantamiento          INTEGER       NOT NULL,
    nombre                    NVARCHAR (50) NOT NULL,
    id_tipo_cuerpo_agua       INTEGER       NOT NULL,
    id_coordenada_cuerpo_agua INTEGER       NOT NULL,
    id_nivel_contaminacion    INTEGER       NOT NULL,
    id_nivel_azolve           INTEGER       NOT NULL,
    id_nivel_eutrofizacion    INTEGER       NOT NULL,
    id_nivel_lirio_acuatico   INTEGER       NOT NULL,
    id_uso                    INTEGER       NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_danio_arbolado
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_danio_arbolado;
CREATE TABLE Satelites.caracteristica_danio_arbolado (
    id                         INTEGER NOT NULL
                                       PRIMARY KEY ,
    id_caracteristica_arbolado INTEGER NOT NULL,
    id_danio                   INTEGER NOT NULL,
    id_severidad               INTEGER NOT NULL,
    porcentaje_danio           FLOAT   NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_danio_individuo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_danio_individuo;
CREATE TABLE Satelites.caracteristica_danio_individuo (id INTEGER NOT NULL PRIMARY KEY , id_tabla_relacion INTEGER NOT NULL, tabla_relacion NVARCHAR(50) NOT NULL, id_danio INTEGER, id_severidad INTEGER, porcentaje_danio FLOAT, numero_danio INTEGER);

-- ----------------------------
-- Table structure for Satelites.caracteristica_degradacion_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_degradacion_suelo;
CREATE TABLE Satelites.caracteristica_degradacion_suelo (
    id                    INTEGER  NOT NULL
                                   PRIMARY KEY ,
    id_levantamiento      INTEGER  NOT NULL,
    id_degradacion        INTEGER  NOT NULL,
    numero                SMALLINT NOT NULL,
    id_nivel              INTEGER  NOT NULL,
    porcentaje_afectacion FLOAT    NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_densidad_aparente_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_densidad_aparente_suelo;
CREATE TABLE Satelites.caracteristica_densidad_aparente_suelo (
    id                INTEGER           NOT NULL
                                        PRIMARY KEY ,
    id_levantamiento  INTEGER           NOT NULL,
    metodo            SMALLINT          NOT NULL,
    numero_sitio      SMALLINT          NOT NULL,
    profundidad       FLOAT             NOT NULL,
    diametro_cilindro FLOAT             NOT NULL,
    volumen           FLOAT             NOT NULL,
    peso_total        FLOAT             NOT NULL,
    peso_muestra      FLOAT             NOT NULL,
    observaciones     TEXT ,
    ancho             FLOAT             NOT NULL,
    largo             FLOAT             NOT NULL,
    profundidad_menor FLOAT             NOT NULL,
    profundidad_mayor FLOAT             NOT NULL,
    limitante         TEXT  
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_descriptiva
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_descriptiva;
CREATE TABLE Satelites.caracteristica_descriptiva (
    id                   INTEGER       PRIMARY KEY 
                                       NOT NULL,
    id_levantamiento     INT           NOT NULL,
    descripcion          NVARCHAR (50) NOT NULL,
    bandera              BIT          NOT NULL,
    porcentaje_cobertura FLOAT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_detalle_impacto_ambiental_incendio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_detalle_impacto_ambiental_incendio;
CREATE TABLE Satelites.caracteristica_detalle_impacto_ambiental_incendio (
    id                                  INTEGER       NOT NULL
                                                      PRIMARY KEY ,
    id_caracteristica_impacto_ambiental INTEGER       NOT NULL,
    existe_evidencia_incendio           BIT           NOT NULL,
    es_anio_actual                      BIT           NOT NULL,
    porcentaje_vegetacion_afectada      FLOAT         NOT NULL,
    porcentaje_arbustiva_afectada       FLOAT         NOT NULL,
    porcentaje_herbacea_afectada        FLOAT         NOT NULL,
    tipo_incendio                       NVARCHAR (30) NOT NULL,
    porcentaje_copa_quemada             FLOAT         NOT NULL,
    existe_regerenacion_incendio        BIT           NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_diversidad_epifitas
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_diversidad_epifitas;
CREATE TABLE Satelites.caracteristica_diversidad_epifitas (
    id                          INTEGER       NOT NULL
                                              PRIMARY KEY ,
    id_levantamiento            INTEGER       NOT NULL,
    id_epifita                  INTEGER       NOT NULL,
    porcentaje_presencia_tronco NVARCHAR (50),
    porcentaje_presencia_ramas  NVARCHAR (50) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_diversidad_especies_estrato
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_diversidad_especies_estrato;
CREATE TABLE Satelites.caracteristica_diversidad_especies_estrato (
    id               INTEGER       NOT NULL
                                   PRIMARY KEY ,
    id_levantamiento INTEGER       NOT NULL,
    id_estrato       INTEGER       NOT NULL,
    id_especie       INTEGER       NOT NULL,
    numero_colecta   NVARCHAR (20),
    cantidad         INTEGER       NOT NULL,
    es_codominante   BIT           NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_erosiones
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_erosiones;
CREATE TABLE Satelites.caracteristica_erosiones (
    id               INTEGER NOT NULL
                             PRIMARY KEY ,
    id_levantamiento [INT]   NOT NULL,
    id_erosion       [INT]   NOT NULL,
    longitud         [FLOAT] NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_erosiones_medicion_detalle
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_erosiones_medicion_detalle;
CREATE TABLE Satelites.caracteristica_erosiones_medicion_detalle (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_caracteristica_erosiones [INT],
    profundidad                 [FLOAT],
    ancho                       [FLOAT],
    diametro                    [FLOAT],
    distancia                   [FLOAT],
    azimut                      [FLOAT],
    numero_medicion             INTEGER
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_erosion_hidrica_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_erosion_hidrica_suelo;
CREATE TABLE Satelites.caracteristica_erosion_hidrica_suelo (
    id               INTEGER NOT NULL
                             PRIMARY KEY ,
    id_levantamiento INTEGER NOT NULL,
    valor_erision    FLOAT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_erosion_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_erosion_suelo;
CREATE TABLE Satelites.caracteristica_erosion_suelo (
    id                   [INT] NOT NULL,
    id_levantamiento     [INT]                   NOT NULL,
    id_erosion           [INT]                   NOT NULL,
    id_nivel             [INT]                   NOT NULL,
    numero               [INT],
    espesor_capa_perdida [FLOAT],
    profundidad          [FLOAT],
    ancho                [FLOAT],
    volumen              [FLOAT],
    distancia            [FLOAT],
    azimut               [FLOAT],
    medicion_especifica  [BIT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_especie_riesgo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_especie_riesgo;
CREATE TABLE Satelites.caracteristica_especie_riesgo (
    id                INTEGER NOT NULL
                              PRIMARY KEY ,
    id_levantamiento  INTEGER NOT NULL,
    id_especie_riesgo INTEGER NOT NULL,
    id_uso            INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_fotografia
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_fotografia;
CREATE TABLE Satelites.caracteristica_fotografia (
    id                                         INTEGER       PRIMARY KEY 
                                                             NOT NULL,
    id_levantamiento                           INTEGER       NOT NULL,
    id_levantamiento_unidad_muestreo_principal INTEGER       NOT NULL,
    id_fotografia                              INTEGER       NOT NULL,
    nomenclatura                               VARCHAR (100) NOT NULL,
    file_name                                  VARCHAR (100),
    path_file                                  VARCHAR (250) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_fotografia_hemisferica
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_fotografia_hemisferica;
CREATE TABLE [Satelites.caracteristica_fotografia_hemisferica](
	[id] [INTEGER]PRIMARY KEY NOT NULL,
	[id_levantamiento] [int] NOT NULL,
	[cumple_cobertura_minima] [bit] NOT NULL,
	[fotografia_antes_levantamiento] [bit] NOT NULL,
	[hora] [datetime] NOT NULL,
	[declinacion_magnetica_calculada] [int] NOT NULL 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_imagenes
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_imagenes;
CREATE TABLE Satelites.caracteristica_imagenes (
    id               INTEGER       NOT NULL
                                   PRIMARY KEY ,
    id_levantamiento INTEGER       NOT NULL,
    nombre_imagen    NVARCHAR (99) NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_impacto_ambiental
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_impacto_ambiental;
CREATE TABLE Satelites.caracteristica_impacto_ambiental (
    id                   INTEGER           NOT NULL
                                           PRIMARY KEY ,
    id_levantamiento     INTEGER           NOT NULL,
    id_impacto_ambiental INTEGER           NOT NULL,
    id_nivel_vegetacion  INTEGER           NOT NULL,
    id_nivel_suelo       INTEGER           NOT NULL,
    id_nivel_agua        INTEGER           NOT NULL,
    observaciones        TEXT  
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_medicion_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_medicion_suelo;
CREATE TABLE Satelites.caracteristica_medicion_suelo (
    id               INTEGER       NOT NULL
                                   PRIMARY KEY ,
    id_levantamiento INTEGER       NOT NULL,
    tipo_medicion    NVARCHAR (50) NOT NULL,
    numero_medicion  SMALLINT      NOT NULL,
    nombre_medicion  NVARCHAR (50) NOT NULL,
    medicion         FLOAT         NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_modulo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_modulo;
CREATE TABLE Satelites.caracteristica_modulo (
    id               INTEGER PRIMARY KEY 
                             NOT NULL,
    id_levantamiento INT,
    id_modulo        INT,
    teorico          BIT,
    levantado        BIT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_muestreo_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_muestreo_suelo;
CREATE TABLE Satelites.caracteristica_muestreo_suelo (
    id                        INTEGER           NOT NULL
                                                PRIMARY KEY ,
    id_levantamiento          INTEGER           NOT NULL,
    numero_punto              INTEGER           NOT NULL,
    id_suelo                  INTEGER           NOT NULL,
    espesor_hojarasca         FLOAT             NOT NULL,
    espesor_fermentacion      FLOAT             NOT NULL,
    peso_total_hojarasca      FLOAT             NOT NULL,
    peso_total_fermentacion   FLOAT             NOT NULL,
    peso_muestra_hojarasca    FLOAT             NOT NULL,
    peso_muestra_fermentacion FLOAT             NOT NULL,
    observaciones             TEXT ,
    profundidad_real_30       FLOAT             NOT NULL,
    profundidad_real_30_60    FLOAT             NOT NULL,
    peso_total_suelo_30       FLOAT             NOT NULL,
    peso_total_suelo_30_60    FLOAT             NOT NULL,
    volumen                   FLOAT             NOT NULL,
    diametro_cilindro         FLOAT             NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_pendiente
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_pendiente;
CREATE TABLE Satelites.caracteristica_pendiente (
    id                   INTEGER NOT NULL
                                 PRIMARY KEY ,
    id_levantamiento     INTEGER NOT NULL,
    numero_cuadrante     INTEGER NOT NULL,
    porcentaje_pendiente FLOAT   NOT NULL,
    distancia_compensada FLOAT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_plaga
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_plaga;
CREATE TABLE Satelites.caracteristica_plaga (
    id                              INTEGER NOT NULL
                                            PRIMARY KEY ,
    id_levantamiento                INTEGER NOT NULL,
    id_especie_agente_causal        INTEGER NOT NULL,
    nombre_comun                    VARCHAR NOT NULL,
    porcentaje_afectacion_estrato   FLOAT   NOT NULL,
    porcentaje_afectacion_repoblado FLOAT   NOT NULL,
    estatus                         BIT     NOT NULL,
    id_agente_danio                 INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_punto_control
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_punto_control;
CREATE TABLE Satelites.caracteristica_punto_control (
    id                  INTEGER        NOT NULL
                                       PRIMARY KEY ,
    id_levantamiento    INT            NOT NULL,
    id_coordenada       INT            NOT NULL,
    id_condicion_acceso INT            NOT NULL,
    paraje              NVARCHAR (255) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_punto_control_medio_transporte
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_punto_control_medio_transporte;
CREATE TABLE Satelites.caracteristica_punto_control_medio_transporte (
    id                              INTEGER NOT NULL
                                            PRIMARY KEY ,
    id_caracteristica_punto_control INT     NOT NULL,
    id_medio_transporte             INT     NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_punto_control_via_acceso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_punto_control_via_acceso;
CREATE TABLE Satelites.caracteristica_punto_control_via_acceso (
    id                              INTEGER NOT NULL
                                            PRIMARY KEY ,
    id_caracteristica_punto_control INT     NOT NULL,
    id_via_acceso                   INT     NOT NULL,
    distancia                       INT     NOT NULL,
    id_condicion_acceso             INTEGER
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_repoblado
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_repoblado;
CREATE TABLE [Satelites.caracteristica_repoblado] (
  [id] INTEGER NOT NULL PRIMARY KEY, 
  [tipo_repoblado] nvarchar(30), 
  [id_levantamiento] int NOT NULL, 
  [id_especie] int, 
  [id_especie_infys] int, 
  [id_especie_rev2012] int, 
  [nombre_comun] nvarchar(100), 
  [numero_colecta] nvarchar(50), 
  [id_froma_biologica] int, 
  [id_condicion] int, 
  [id_medicion_altura_inicial] int, 
  [id_medicion_altura_final] int, 
  [id_vigor] int, 
  [frecuencia] int, 
  [edad] int, 
  [porcentaje_cobertura] float, 
  [altura_infys] nvarchar, 
  [id_repoblado_infys] int
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
	);

-- ----------------------------
-- Table structure for Satelites.caracteristica_repoblado_danio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_repoblado_danio;
CREATE TABLE Satelites.caracteristica_repoblado_danio (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_caracteristica_repoblado INTEGER NOT NULL,
    id_danio                    INTEGER NOT NULL,
    porcentaje_danio            FLOAT   NOT NULL,
    identificador               VARCHAR(10)
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_repoblado_uso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_repoblado_uso;
CREATE TABLE Satelites.caracteristica_repoblado_uso (
    id                          INTEGER NOT NULL
                                        PRIMARY KEY ,
    id_caracteristica_repoblado INTEGER NOT NULL,
    id_uso                      INTEGER NOT NULL,
    id_mercado                  INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_submuestra
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_submuestra;
CREATE TABLE Satelites.caracteristica_submuestra (
    id                         INTEGER           NOT NULL
                                                 PRIMARY KEY ,
    id_levantamiento           INTEGER           NOT NULL,
    id_caracteristica_arbolado INTEGER           NOT NULL,
    numero_arbol               INTEGER,
    edad                       INTEGER,
    anillos_2_5                INTEGER,
    longitud_10_anillos        INTEGER,
    grosor_corteza             INTEGER,
    diametro_basal             FLOAT,
    descripcion                TEXT ,
    id_especie                 INTEGER,
    azimut                     FLOAT,
    distancia                  FLOAT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo;
CREATE TABLE Satelites.caracteristica_suelo (
    id                        INTEGER        NOT NULL
                                             PRIMARY KEY ,
    id_levantamiento          INTEGER        NOT NULL,
    id_uso                    INTEGER        NOT NULL,
    otro_uso                  NVARCHAR (100),
    tipo_cobertura_vegetacion INTEGER,
    id_mantillo               INTEGER,
    espesor_mantillo          FLOAT,
    profundidad_espesor       FLOAT          NOT NULL,
    categoria_suelo           NVARCHAR (100),
    id_erosion_primaria       INTEGER,
    id_erosion_secundaria     INTEGER,
    id_degradacion_primaria   INTEGER,
    id_degradacion_secundaria INTEGER,
    id_nivel                  INTEGER,
    pendiente_dominante       FLOAT          NOT NULL,
    longitud_pendiente        FLOAT          NOT NULL,
    azimut                    FLOAT          NOT NULL,
    contra_azimut             FLOAT          NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_barreno
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_barreno;
CREATE TABLE Satelites.caracteristica_suelo_barreno (
    id                          INTEGER         NOT NULL
                                                PRIMARY KEY ,
    id_levantamiento            [INT]           NOT NULL,
    numero_punto                [INT]           NOT NULL,
    clave                       [NCHAR] (30)    NOT NULL,
    tipo_barreno                [NVARCHAR] (10) NOT NULL,
    profundidad                 [FLOAT]         NOT NULL,
    peso                        [FLOAT]         NOT NULL,
    equipo_utilizado            [NVARCHAR] (30) NOT NULL,
    porcentaje_carbono_organico [FLOAT],
    observaciones               [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_cementacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_cementacion;
CREATE TABLE Satelites.caracteristica_suelo_cementacion (
    id                               INTEGER NOT NULL
                                             PRIMARY KEY ,
    id_suelo_horizonte               [INT]   NOT NULL,
    id_suelo_grado_cementacion       [INT],
    id_suelo_continuidad_cementacion [INT],
    id_suelo_estructura_cementacion  [INT],
    id_suelo_naturaleza_cementacion  [INT],
    observaciones                    [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_concrecion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_concrecion;
CREATE TABLE Satelites.caracteristica_suelo_concrecion (
    id                                       INTEGER NOT NULL
                                                     PRIMARY KEY ,
    id_suelo_horizonte                       [INT]   NOT NULL,
    id_forma_endurecimiento_suelo            [INT]   NOT NULL,
    tamanio                                  [FLOAT],
    porcentaje_concrecion                    [FLOAT],
    id_suelo_distribucion_endurecimiento     [INT],
    id_suelo_efervescencia_acido_clorhidrico [INT],
    observaciones                            [INT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_condicion_degradacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_condicion_degradacion;
CREATE TABLE [Satelites.caracteristica_suelo_condicion_degradacion](
       [id] [INTEGER] PRIMARY KEY NOT NULL,
       [id_levantamiento] [int] NOT NULL,
       [tipo_erosion] [nvarchar](30) NOT NULL,
       [numero_consecutivo] [int] NULL,
       [altura] [int] NULL,
       [ancho] [int] NULL,
       [largo] [int] NULL,
       [diametro] [int] NULL,
       [profundidad] [nchar](10) NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
	   );

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_densidad_aparente
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_densidad_aparente;
CREATE TABLE Satelites.caracteristica_suelo_densidad_aparente (
    id                INTEGER         NOT NULL
                                      PRIMARY KEY ,
    id_levantamiento  [INT]           NOT NULL,
    clave             [NVARCHAR] (30) NOT NULL,
    profundidad       [FLOAT]         NOT NULL,
    diametro_cilindro [FLOAT]         NOT NULL,
    peso_total        [FLOAT]         NOT NULL,
    peso_muestra      [FLOAT]         NOT NULL,
    observaciones     [TEXT],
    volumen           REAL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_densidad_aparente_laboratorio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_densidad_aparente_laboratorio;
CREATE TABLE Satelites.caracteristica_suelo_densidad_aparente_laboratorio (
    id                                        INTEGER NOT NULL
                                                      PRIMARY KEY ,
    id_caracteristica_suelo_densidad_aparente [INT],
    peso_seco                                 [INT],
    volumen                                   [FLOAT],
    porcentaje_arcilla                        [FLOAT],
    porcentaje_limo                           [FLOAT],
    porcentaje_arena                          [FLOAT],
    porcentaje_arcilla_dispersable_agua       [FLOAT],
    porcentaje_grava                          [FLOAT],
    porcentaje_guijarro                       [FLOAT],
    porcentaje_piedra                         [FLOAT],
    luminosidad                               [FLOAT],
    saturacion_eje_rojo_verde                 [FLOAT],
    saturacion_eje_amarillo                   [FLOAT],
    cromaticidad                              [FLOAT],
    angulo_color                              [FLOAT],
    conductividad_electrica                   [FLOAT],
    ph                                        [FLOAT],
    carbono_organico                          [FLOAT],
    carbono_total                             [FLOAT],
    nitrogeno_total                           [FLOAT],
    indice_melanico                           [FLOAT],
    capacidad_intercambio_cationico           [FLOAT],
    ion_potasio_intercambiable                [FLOAT],
    ion_calcio_intercambiable                 [FLOAT],
    ion_magnesio_intercambiable               [FLOAT],
    ion_aluminio_intercambiable               [FLOAT],
    ion_fierro_intercambiable                 [FLOAT],
    porcentaje_sodio_intercambiable           [FLOAT],
    porcentaje_carbonatos_calcio              [FLOAT],
    porcentaje_sulfatos_calcio                [FLOAT],
    observaciones                             [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_factor_nocivo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_factor_nocivo;
CREATE TABLE Satelites.caracteristica_suelo_factor_nocivo (
    id                             INTEGER          NOT NULL
                                                    PRIMARY KEY ,
    id_caracteristica_suelo_perfil [INT]            NOT NULL,
    id_suelo_factor_nocivo         [INT]            NOT NULL,
    factor_nocivo_otro             [NVARCHAR] (100),
    observaciones                  [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_fermentacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_fermentacion;
CREATE TABLE Satelites.caracteristica_suelo_fermentacion (
    id                          INTEGER         NOT NULL
                                                PRIMARY KEY ,
    id_levantamiento            [INT]           NOT NULL,
    numero_punto                [INT]           NOT NULL,
    clave                       [NVARCHAR] (30) NOT NULL,
    id_suelo_tipo_mantillo      [INT]           NOT NULL,
    tipo_fermentacion_otro      [NCHAR] (50),
    espesor                     [FLOAT]         NOT NULL,
    peso_total                  [FLOAT]         NOT NULL,
    peso_muestra                [FLOAT]         NOT NULL,
    porcentaje_carbono_organico [FLOAT],
    observaciones               [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_hojarasca
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_hojarasca;
CREATE TABLE Satelites.caracteristica_suelo_hojarasca (
    id                          INTEGER         NOT NULL
                                                PRIMARY KEY ,
    id_levantamiento            [INT]           NOT NULL,
    numero_punto                [INT]           NOT NULL,
    clave                       [NVARCHAR] (30) NOT NULL,
    id_suelo_tipo_mantillo      [INT]           NOT NULL,
    tipo_hojarasca_otro         [NVARCHAR] (50),
    espesor                     [FLOAT]         NOT NULL,
    peso_total                  [FLOAT]         NOT NULL,
    peso_muestra                [FLOAT]         NOT NULL,
    porcentaje_carbono_organico [FLOAT],
    observaciones               [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_horizonte
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_horizonte;
CREATE TABLE Satelites.caracteristica_suelo_horizonte (
    id                                            INTEGER         NOT NULL
                                                                  PRIMARY KEY ,
    id_caracteristica_suelo_perfil                [INT]           NOT NULL,
    clave                                         [NVARCHAR] (20),
    clave_inegi                                   [NVARCHAR] (20),
    limite_superior                               [FLOAT],
    limite_inferior                               [FLOAT],
    id_suelo_forma_separacion_horizonte           [INT],
    id_suelo_contraste_separacion_horizonte       [INT],
    id_suelo_grado_efervescencia_acido_clohidrico [INT],
    id_suelo_grado_efervescencia_agua_oxigenada   [INT],
    potencial_redox                               [FLOAT],
    id_suelo_forma_estructura                     [INT],
    id_suelo_tamanio_estructura                   [INT],
    id_suelo_desarrollo_estructura                [INT],
    color_munsell_humedo                          [NVARCHAR] (20),
    color_munsell_seco                            [NVARCHAR] (20),
    id_suelo_consistencia_humedo                  [INT],
    id_suelo_consistencia_seco                    [INT],
    id_suelo_adhesividad                          [INT],
    id_suelo_plasticidad                          [INT],
    id_suelo_presencia_peliculas                  [INT],
    id_suelo_presencia_facetas                    [INT],
    ancho_promedio_grietas                        [FLOAT],
    profundidad_promedio_grietas                  [FLOAT],
    distancia_promedio_grietas                    [FLOAT],
    porcentaje_grava                              [FLOAT],
    porcentaje_guijarro                           [FLOAT],
    porcentaje_piedra                             [FLOAT],
    cantidad_raiz                                 [INT],
    tamanio_promedio_raiz                         [FLOAT],
    observaciones                                 [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_horizonte_laboratorio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_horizonte_laboratorio;
CREATE TABLE Satelites.caracteristica_suelo_horizonte_laboratorio (
    id                                  INTEGER NOT NULL
                                                PRIMARY KEY ,
    id_caracteristica_suelo_horizonte   [INT],
    peso_seco                           [INT],
    volumen                             [FLOAT],
    porcentaje_arcilla                  [FLOAT],
    porcentaje_limo                     [FLOAT],
    porcentaje_arena                    [FLOAT],
    porcentaje_arcilla_dispersable_agua [FLOAT],
    porcentaje_grava                    [FLOAT],
    porcentaje_guijarro                 [FLOAT],
    porcentaje_piedra                   [FLOAT],
    luminosidad                         [FLOAT],
    saturacion_eje_rojo_verde           [FLOAT],
    saturacion_eje_amarillo             [FLOAT],
    cromaticidad                        [FLOAT],
    angulo_color                        [FLOAT],
    conductividad_electrica             [FLOAT],
    ph                                  [FLOAT],
    carbono_organico                    [FLOAT],
    carbono_total                       [FLOAT],
    nitrogeno_total                     [FLOAT],
    indice_melanico                     [FLOAT],
    capacidad_intercambio_cationico     [FLOAT],
    ion_potasio_intercambiable          [FLOAT],
    ion_calcio_intercambiable           [FLOAT],
    ion_magnesio_intercambiable         [FLOAT],
    ion_aluminio_intercambiable         [FLOAT],
    ion_fierro_intercambiable           [FLOAT],
    porcentaje_sodio_intercambiable     [FLOAT],
    porcentaje_carbonatos_calcio        [FLOAT],
    porcentaje_sulfatos_calcio          [FLOAT],
    observaciones                       [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_mancha
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_mancha;
CREATE TABLE Satelites.caracteristica_suelo_mancha (
    id                        INTEGER         NOT NULL
                                              PRIMARY KEY ,
    id_suelo_horizonte        [INT]           NOT NULL,
    porcentaje_manchas        [FLOAT],
    tamanio                   [FLOAT],
    id_suelo_contraste_mancha [INT],
    id_suelo_borde_mancha     [INT],
    color_munsell             [NVARCHAR] (20),
    observaciones             [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_nodulo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_nodulo;
CREATE TABLE Satelites.caracteristica_suelo_nodulo (
    id                                   INTEGER NOT NULL
                                                 PRIMARY KEY ,
    id_suelo_horizonte                   [INT]   NOT NULL,
    id_suelo_forma_endurecimiento        [INT]   NOT NULL,
    tamanio                              [FLOAT],
    porcentaje_nodulos                   [FLOAT],
    id_suelo_dureza                      [INT],
    id_suelo_distribucion_endurecimiento [INT],
    id_suelo_efervescencia_suelo         [INT],
    observaciones                        [TEXT]
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_suelo_perfil
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_suelo_perfil;
CREATE TABLE [Satelites.caracteristica_suelo_perfil](
	[id] INTEGER NOT NULL PRIMARY KEY ,
	[id_levantamiento] [int] NOT NULL,
	[clave_etiqueta] [nvarchar](50) NULL,
	[profundidad_muestreo] [nvarchar](10) NOT NULL,
	[profundidad_real] [int] NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL);

-- ----------------------------
-- Table structure for Satelites.caracteristica_transecto
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_transecto;
CREATE TABLE [Satelites.caracteristica_transecto](
	[id] [INTEGER] PRIMARY KEY NOT NULL,
	[id_levantamiento] [int] NOT NULL,
	[numero_transecto] [int] NOT NULL,
	[porcentaje_pendiente] [float] NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_transecto_cobertura
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_transecto_cobertura;
CREATE TABLE [Satelites.caracteristica_transecto_cobertura] (
  [id] INTEGER NOT NULL PRIMARY KEY, 
  [id_medicion] INT, 
  [id_caracteristica_transecto] int NOT NULL, 
  [numero_punto] int NOT NULL, 
  [presencia_dosel] bit NOT NULL, 
  [id_suelo] int
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_transponder
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_transponder;
CREATE TABLE [Satelites.caracteristica_transponder](
	[id] [INTEGER] PRIMARY KEY NOT NULL,
	[id_levantamiento] [int] NOT NULL,
	[descripcion] [nvarchar](100) NOT NULL,
	[descripcion_otro] [text] NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL

);

-- ----------------------------
-- Table structure for Satelites.caracteristica_troza_submuestra
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_troza_submuestra;
CREATE TABLE Satelites.caracteristica_troza_submuestra (
    id                           INTEGER NOT NULL
                                         PRIMARY KEY ,
    id_caracteristica_submuestra INTEGER NOT NULL,
    numero_troza                 INTEGER NOT NULL,
    id_calidad_troza             INTEGER NOT NULL,
    id_medicion_altura           INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_ubicacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_ubicacion;
CREATE TABLE Satelites.caracteristica_ubicacion (
    id                INTEGER           NOT NULL
                                        PRIMARY KEY ,
    descripcion       TEXT  NOT NULL,
    id_imagen_croquis INTEGER,
    id_levantamiento  INTEGER           NOT NULL,
    paraje            TEXT  NOT NULL,
    accesibilidad     NVARCHAR (99)     NOT NULL,
    hora              DATETIME          NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_ubicacion_coordenadas
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_ubicacion_coordenadas;
CREATE TABLE Satelites.caracteristica_ubicacion_coordenadas (
    id                          INTEGER           NOT NULL
                                                  PRIMARY KEY ,
    id_caracteristica_ubicacion INTEGER           NOT NULL,
    id_coordenada               INTEGER           NOT NULL,
    descripcion                 TEXT  NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_unidad_muestreo
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_unidad_muestreo;
CREATE TABLE Satelites.caracteristica_unidad_muestreo (
    id                           INTEGER NOT NULL
                                         PRIMARY KEY ,
    id_levantamiento             INTEGER NOT NULL,
    altitud                      INTEGER,
    pendiente                    FLOAT,
    id_fisiografia               INTEGER,
    id_exposicion                INTEGER,
    porcentaje_repoblado_foraneo FLOAT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_varilla
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_varilla;
CREATE TABLE Satelites.caracteristica_varilla (
    id               INTEGER  NOT NULL
                              PRIMARY KEY ,
    id_levantamiento INTEGER  NOT NULL,
    numero_varilla   SMALLINT NOT NULL,
    azimut           INTEGER,
    profundidad      FLOAT    NOT NULL,
    distancia        FLOAT    NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion;
CREATE TABLE Satelites.caracteristica_vegetacion (
    id                    INTEGER NOT NULL
                                  PRIMARY KEY ,
    id_levantamiento      INT     NOT NULL,
    id_vegetacion         INT     NOT NULL,
    id_vegetacion_ecotono INT,
    arbol_fuera_bosque    BIT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion_danio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion_danio;
CREATE TABLE Satelites.caracteristica_vegetacion_danio (
    id                           INTEGER NOT NULL
                                         PRIMARY KEY ,
    id_caracteristica_vegetacion INTEGER NOT NULL,
    id_danio                     INTEGER NOT NULL,
    porcentaje_danio             FLOAT   NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion_mayor
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion_mayor;
CREATE TABLE Satelites.caracteristica_vegetacion_mayor (
    id                       INTEGER       NOT NULL
                                           PRIMARY KEY ,
    id_levantamiento         INTEGER       NOT NULL,
    numero_arbol             INTEGER       NOT NULL,
    id_especie_infys         INTEGER       NOT NULL,
    numero_colecta           NVARCHAR (50),
    diametro_altura_pecho    FLOAT         NOT NULL,
    altura_total             FLOAT         NOT NULL,
    diametro_copa            FLOAT         NOT NULL,
    volumen                  FLOAT         NOT NULL,
    id_vigor                 INTEGER       NOT NULL,
    id_vigor_etapa           INTEGER       NOT NULL,
    numero_tallos            SMALLINT      NOT NULL,
    arbol_malo               BIT           NOT NULL,
    id_condicion             INTEGER,
    id_forma_biologica_tocon INTEGER,
    id_especie               INTEGER
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion_mayor_danio
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion_mayor_danio;
CREATE TABLE Satelites.caracteristica_vegetacion_mayor_danio (
    id                                 INTEGER NOT NULL
                                               PRIMARY KEY ,
    id_caracteristica_vegetacion_mayor INTEGER NOT NULL,
    id_danio                           INTEGER NOT NULL,
    porcentaje_danio                   FLOAT   NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion_mayor_uso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion_mayor_uso;
CREATE TABLE Satelites.caracteristica_vegetacion_mayor_uso (
    id                                 INTEGER NOT NULL
                                               PRIMARY KEY ,
    id_caracteristica_vegetacion_mayor INTEGER NOT NULL,
    id_uso                             INTEGER NOT NULL,
    id_mercado                         INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.caracteristica_vegetacion_uso
-- ----------------------------
DROP TABLE IF EXISTS Satelites.caracteristica_vegetacion_uso;
CREATE TABLE Satelites.caracteristica_vegetacion_uso (
    id                           INTEGER NOT NULL
                                         PRIMARY KEY ,
    id_caracteristica_vegetacion INTEGER NOT NULL,
    id_uso                       INTEGER NOT NULL,
    id_mercado                   INTEGER NOT NULL
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.colecta_botanica
-- ----------------------------
DROP TABLE IF EXISTS Satelites.colecta_botanica;
CREATE TABLE Satelites.colecta_botanica (
    id                          INTEGER      PRIMARY KEY ,
    id_levantamiento            INTEGER      NOT NULL,
    iniciales_colector          VARCHAR (5)  NOT NULL,
    numero_colecta              INTEGER      NOT NULL,
    nomenclatura_colecta        VARCHAR (3),
    identificador_individuo     VARCHAR (7),
    consecutivo_unidad_muestreo INTEGER      NOT NULL
                                             DEFAULT (1),
    clave_colecta               VARCHAR (50) NOT NULL,
    ejemplar1                   INTEGER      NOT NULL
                                             DEFAULT 0,
    ejemplar2                   INTEGER      NOT NULL
                                             DEFAULT 0,
    ejemplar3                   INTEGER      NOT NULL
                                             DEFAULT 0,
    ejemplar4                   INTEGER      NOT NULL
                                             DEFAULT 0,
    ejemplar5                   INTEGER      NOT NULL
                                             DEFAULT 0,
    ejemplar6                   INTEGER      NOT NULL
                                             DEFAULT 0,
    id_tabla_realcion           INTEGER,
    tabla_relacion              NVARCHAR(50) 
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Satelites.observaciones
-- ----------------------------
DROP TABLE IF EXISTS Satelites.observaciones;
CREATE TABLE Satelites.observaciones (
    id                     INTEGER        NOT NULL
                                          PRIMARY KEY ,
    id_levantamiento       INT            NOT NULL,
    tabla_referencia       NVARCHAR (100) NOT NULL,
    id_tabla_referencia    INT,
    campo_tabla_referencia VARCHAR (50),
    fecha                  DATETIME,
    observaciones          TEXT           NOT NULL,
    id_usuario             INT
	,conglomerado	int NULL
	, sitio INT NULL
	, id_anterior INT NULL
);

-- ----------------------------
-- Table structure for Sistema.coordenada
-- ----------------------------
DROP TABLE IF EXISTS Sistema.coordenada;
CREATE TABLE Sistema.coordenada (
    id              INTEGER       NOT NULL
                                  PRIMARY KEY ,
    latitud         NVARCHAR (50) NOT NULL,
    longitud        NVARCHAR (50) NOT NULL,
    datum           NVARCHAR (50) NOT NULL,
    error           INTEGER       ,
    error_podt      INTEGER,
    tipo_coordenada NVARCHAR (50) NOT NULL,
    azimut          INTEGER,
    distancia       INTEGER,
    hora            DATETIME,
    altitud         FLOAT,
    pendiente       FLOAT,
    lat             NUMERIC,
    long            NUMERIC
);

-- ----------------------------
-- Table structure for Sistema.levantamiento
-- ----------------------------
DROP TABLE IF EXISTS Sistema.levantamiento;
CREATE TABLE Sistema.levantamiento (
    id                              INTEGER           IDENTITY(1,1) NOT NULL,
    id_unidad_muestreo              INTEGER           NOT NULL,
    id_coordenada                   INTEGER,
    id_coordenada_apoyo             INTEGER,
    id_coordenada_punto_control     INTEGER,
    fecha_ejecucion                 DATETIME,
    anio_levantamiento              INTEGER,
    id_tipo_levantamiento           INTEGER,
    id_regimen_propiedad            INTEGER,
    id_brigadista                   INTEGER,
    observaciones                   TEXT ,
    id_vegetacion_primaria          INTEGER,
    id_vegetacion_secundaria        INTEGER,
    id_region_hidrologica           INTEGER,
    id_carta_cartografica           INTEGER,
    id_condicion_levantamiento      INTEGER,
    condicion_encontrada_vegetacion NVARCHAR (50),
    tipo_acceso                     NVARCHAR (50),
    accesibilidad                   NVARCHAR (50),
    paraje                          TEXT ,
    id_exposicion                   INTEGER,
    id_fisiografia                  INTEGER,
    id_uso_suelo                    INTEGER,
    estatus                         NVARCHAR (50),
    id_fisonomia                    INTEGER,
    tiene_cubierta_vegetal          BIT,
    id_tipo_unidad_muestreo         INT,
    tipificacion                    NVARCHAR (50),
    estatus_muestreado              BIT,
    situacion                       NVARCHAR (50),
    pendiente                       FLOAT,
    altitud                         FLOAT,
    predio                          NVARCHAR (99),
    fecha_inicio                    DATETIME,
    fecha_fin                       DATETIME
);

-- ----------------------------
-- Table structure for Sistema.unidad_muestreo
-- ----------------------------
DROP TABLE IF EXISTS Sistema.unidad_muestreo;
CREATE TABLE Sistema.unidad_muestreo (
    id                       INTEGER       NOT NULL
                                           PRIMARY KEY ,
    folio                    INTEGER       NOT NULL,
    id_proyecto              INTEGER       NOT NULL,
    id_municipio             INTEGER       NOT NULL,
    id_unidad_muestreo_padre INTEGER,
    predio                   NVARCHAR (99),
    id_tipo_unidad_muestreo  INTEGER       NOT NULL,
    id_medicion              INTEGER,
    estatus                  NVARCHAR (50),
    tiene_cubierta_vegetal   BIT
);

-- ----------------------------
-- Table structure for Sistema.usuario
-- ----------------------------
DROP TABLE IF EXISTS Sistema.usuario;
CREATE TABLE Sistema.usuario (
    id               INTEGER       NOT NULL
                                   PRIMARY KEY ,
    username         NVARCHAR (50) NOT NULL,
    nombre           NVARCHAR (50) NOT NULL,
    apellido_paterno NVARCHAR (50) NOT NULL,
    apellido_materno NVARCHAR (50),
    password         NVARCHAR (32) NOT NULL,
    tipo             NVARCHAR (50) NOT NULL,
    activo           BIT           NOT NULL
);
