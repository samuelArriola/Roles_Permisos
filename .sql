----------------------------------------------------------------------------------
---------------------- FACTURACIÓN CERRADA ---------------------------------------
----------------------------------------------------------------------------------
SELECT
    DGEMPRES01.dbo.SLNFACTUR.SFANUMFAC,
    tabla.RADICADO,
    tabla.FECHA_RADICADO,
    tabla.ESTADO_RAD,
    tabla.USURAD,
    tabla.USUNOM,
    CASE
        WHEN usu2.cod_usuario IS NULL THEN CASE
            WHEN usu.cod_usuario IS NULL THEN 'SIN ASIGNAR'
            ELSE (
                CONCAT(usu.nom_usuario, CONCAT(' ', usu.ape_usuario))
            )
        END
        ELSE (
            CONCAT(usu2.nom_usuario, CONCAT(' ', usu2.ape_usuario))
        )
    END AS NOM_USU,
    E1.nom AS TIPO,
    DGEMPRES01.dbo.GENTERCER.TERNUMDOC AS NIT,
    DGEMPRES01.dbo.ADNINGRESO.OID AS OID_ADN,
    DGEMPRES01.dbo.GENDETCON.GDENOMBRE AS plan_b,
    CASE
        WHEN rol2.id IS NULL THEN (rol.id)
        ELSE (rol2.id)
    END AS rol,
    g.cod_grupo,
    ISNULL(g.nom_grupo, N 'SIN ASIGNAR') AS nombre,
    ISNULL(
        DGEMPRES01.dbo.GENTERCER.TERNOMCOM,
        DGEMPRES01.dbo.GEENENTADM.ENTNOMBRE
    ) AS EPS,
    DGEMPRES01.dbo.ADNCENATE.ACANOMBRE AS SEDE,
    DGEMPRES01.dbo.GENPACIEN.PACNUMDOC AS dni,
    DGEMPRES01.dbo.GENPACIEN.GPANOMCOM AS nompac,
    DGEMPRES01.dbo.ADNINGRESO.AINCONSEC AS INGRESO,
    DGEMPRES01.dbo.ADNINGRESO.AINFECING AS fechaI,
    DGEMPRES01.dbo.ADNEGRESO.ADEFECSAL AS fechaE,
    DGEMPRES01.dbo.GENARESER.GASNOMBRE AS area,
    CASE
        AINTIPING
        WHEN 1 THEN 'AMBULATORIO'
        ELSE 'HOSPITALARIO'
    END AS TIPO_DE_INGRESO,
    E.nom AS INGRESO_POR,
    C.HCANOMBRE AS CAMA,
    CASE
        CXCESTCAR
        WHEN 0 THEN 'SIN RADICAR'
        WHEN 1 THEN 'RADICADO'
    END AS ESTADO,
    CASE
        WHEN bt.usu_envio IS NULL THEN 'NA'
        ELSE bt.usu_envio
    END AS USU_ENVIO,
    CASE
        WHEN usu2.cod_usuario IS NULL THEN CASE
            WHEN usu.cod_usuario IS NULL THEN 'SIN ASIGNAR'
            ELSE (usu.cod_usuario)
        END
        ELSE (usu2.cod_usuario)
    END AS USU,
    CASE
        WHEN bt.fecha IS NULL THEN '19900101'
        ELSE bt.fecha
    END AS FECHA_ENV,
    CASE
        WHEN rol2.nombres IS NULL THEN CASE
            WHEN rol.nombres IS NULL THEN 'SIN ASIGNAR'
            ELSE (rol.nombres)
        END
        ELSE (rol2.nombres)
    END AS rol_act,
    SUM(DGEMPRES01.dbo.SLNFACTUR.SFATOTFAC) AS TOTAL,
    CASE
        WHEN bt.obs IS NULL THEN ''
        ELSE bt.obs
    END AS OBS,
    DGEMPRES01.dbo.SLNFACTUR.SFAFECFAC AS FECHA_FACT,
    CASE
        WHEN SUBSTRING(SFANUMFAC, 1, 2) = 'FE' THEN CONCAT('FE', CONVERT(Int, REPLACE(SFANUMFAC, 'FE', '')))
        ELSE concat(CONVERT(Int, SFANUMFAC), '')
    END AS FACTURA,
    DGEMPRES01.dbo.GENUSUARIO.USUNOMBRE AS COD_FACT,
    DGEMPRES01.dbo.GENUSUARIO.USUDESCRI AS NOMBRE_FACT,
    CASE
        WHEN bt.usu_envio IS NULL THEN 'NA'
        ELSE (
            CONCAT(usu3.nom_usuario, CONCAT(' ', usu3.ape_usuario))
        )
    END AS USU_NOM_ENVIO,
    E2.nom AS TPACIENTE,
    E3.nom AS TAFILIACION,
    CASE
        AINLIQCOP
        WHEN 1 THEN 'SI'
        ELSE 'NO'
    END AS COPAGO,
    CASE
        AINLIQCMO
        WHEN 1 THEN 'SI'
        ELSE 'NO'
    END AS CUOTA,
    obse.nom AS obse,
    resp.nom AS RESP,
    auto.comen,
    auto.fecha,
    { fn CONCAT(usug.nombre, { fn CONCAT(' ', usug.apellido) }) } AS USUARIOG,
    { fn CONCAT(
        usunr.nom_usuario,
        { fn CONCAT(' ', usunr.ape_usuario) }
    ) } AS USUARIORD,
    mon.nom AS mon,
    nr.obs AS obsrd,
    nr.fecha AS fechard,
    DGEMPRES01.dbo.SLNFACTUR.OID AS oid_fact,
    DATEDIFF(
        day,
        DGEMPRES01.dbo.SLNFACTUR.SFAFECFAC,
        GETDATE()
    ) AS dias
FROM
    DGEMPRES01.dbo.SLNFACTUR WITH (NOLOCK)
    INNER JOIN DGEMPRES01.dbo.ADNINGRESO WITH (NOLOCK) ON DGEMPRES01.dbo.ADNINGRESO.OID = DGEMPRES01.dbo.SLNFACTUR.ADNINGRESO
    INNER JOIN DGEMPRES01.dbo.CRNCXC WITH (NOLOCK) ON DGEMPRES01.dbo.CRNCXC.OID = DGEMPRES01.dbo.SLNFACTUR.CRNCXC1
    INNER JOIN DGEMPRES01.dbo.GENDETCON WITH (NOLOCK) ON DGEMPRES01.dbo.GENDETCON.OID = DGEMPRES01.dbo.SLNFACTUR.GENDETCON
    INNER JOIN DGEMPRES01.dbo.GENCONTRA WITH (NOLOCK) ON DGEMPRES01.dbo.GENDETCON.GENCONTRA1 = DGEMPRES01.dbo.GENCONTRA.OID
    INNER JOIN DGEMPRES01.dbo.GEENENTADM WITH (NOLOCK) ON DGEMPRES01.dbo.GENCONTRA.DGNENTADM1 = DGEMPRES01.dbo.GEENENTADM.OID
    INNER JOIN DGEMPRES01.dbo.ADNCENATE WITH (NOLOCK) ON DGEMPRES01.dbo.ADNINGRESO.ADNCENATE = DGEMPRES01.dbo.ADNCENATE.OID
    LEFT OUTER JOIN DGEMPRES01.dbo.GENUSUARIO WITH (NOLOCK) ON DGEMPRES01.dbo.SLNFACTUR.GENUSUARIO1 = DGEMPRES01.dbo.GENUSUARIO.OID
    LEFT OUTER JOIN dbo.tb_usuarios AS usu WITH (NOLOCK) ON usu.cod_usuario = RTRIM(DGEMPRES01.dbo.GENUSUARIO.USUNOMBRE) COLLATE Modern_Spanish_CI_AS
    LEFT OUTER JOIN dbo.tb_roles AS rol WITH (NOLOCK) ON usu.rol = rol.id
    LEFT OUTER JOIN dbo.bitacora AS bt WITH (NOLOCK) ON bt.oid_adm = 0
    AND bt.oid_fact = DGEMPRES01.dbo.SLNFACTUR.OID
    LEFT OUTER JOIN dbo.tb_usuarios AS usu2 WITH (NOLOCK) ON usu2.cod_usuario = bt.cod_usu
    LEFT OUTER JOIN dbo.tb_roles AS rol2 WITH (NOLOCK) ON usu2.rol = rol2.id
    LEFT OUTER JOIN dbo.gruposP AS gp WITH (NOLOCK) ON gp.oid_eps = DGEMPRES01.dbo.GEENENTADM.OID
    LEFT OUTER JOIN dbo.grupos AS g WITH (NOLOCK) ON gp.grupos = g.id
    INNER JOIN DGEMPRES01.dbo.GENPACIEN WITH (NOLOCK) ON DGEMPRES01.dbo.GENPACIEN.OID = DGEMPRES01.dbo.ADNINGRESO.GENPACIEN
    LEFT OUTER JOIN DGEMPRES01.dbo.ADNEGRESO WITH (NOLOCK) ON DGEMPRES01.dbo.ADNEGRESO.OID = DGEMPRES01.dbo.ADNINGRESO.ADNEGRESO
    LEFT OUTER JOIN DGEMPRES01.dbo.GENARESER WITH (NOLOCK) ON DGEMPRES01.dbo.GENARESER.OID = DGEMPRES01.dbo.ADNINGRESO.GENARESER
    INNER JOIN DGEMPRES01.dbo.ENTIDADES AS E WITH (NOLOCK) ON E.oid = DGEMPRES01.dbo.ADNINGRESO.AINURGCON
    AND E.tipo = 'AINURGCON'
    LEFT OUTER JOIN DGEMPRES01.dbo.HPNDEFCAM AS C WITH (NOLOCK) ON C.OID = DGEMPRES01.dbo.ADNINGRESO.HPNDEFCAM
    LEFT OUTER JOIN DGEMPRES01.dbo.GENTERCER WITH (NOLOCK) ON DGEMPRES01.dbo.GENTERCER.OID = DGEMPRES01.dbo.GENCONTRA.GENTERCER1
    LEFT OUTER JOIN DGEMPRES01.dbo.ENTIDADES AS E1 WITH (NOLOCK) ON E1.oid = DGEMPRES01.dbo.GENPACIEN.PACTIPDOC
    AND E1.tipo = 'PACTIPDOC'
    LEFT OUTER JOIN (
        SELECT
            DGEMPRES01.dbo.CRNDOCUME.CDCONSEC AS RADICADO,
            DGEMPRES01.dbo.CRNDOCUME.CDFECDOC AS FECHA_RADICADO,
            CASE
                WHEN CRFESTADO = 0 THEN 'Registrado'
                WHEN CRFESTADO = 1 THEN 'Confirmado'
                WHEN CRFESTADO = 2 THEN 'Radicado_Entidad'
                WHEN CRFESTADO = 3 THEN 'Anulado'
                ELSE ' '
            END AS ESTADO_RAD,
            USURAD.USUNOMBRE AS USURAD,
            USURAD.USUDESCRI AS USUNOM,
            DGEMPRES01.dbo.CRNRADFACD.SLNFACTUR AS fact
        FROM
            DGEMPRES01.dbo.CRNRADFACD WITH (NOLOCK)
            LEFT OUTER JOIN DGEMPRES01.dbo.CRNRADFACC WITH (NOLOCK) ON DGEMPRES01.dbo.CRNRADFACD.CRNRADFACC = DGEMPRES01.dbo.CRNRADFACC.OID
            LEFT OUTER JOIN DGEMPRES01.dbo.CRNDOCUME WITH (NOLOCK) ON DGEMPRES01.dbo.CRNRADFACC.OID = DGEMPRES01.dbo.CRNDOCUME.OID
            LEFT OUTER JOIN DGEMPRES01.dbo.GENUSUARIO AS USURAD WITH (NOLOCK) ON USURAD.OID = DGEMPRES01.dbo.CRNDOCUME.GENUSUARIO1
        WHERE
            (DGEMPRES01.dbo.CRNRADFACC.CRFESTADO IN (0, 1, 2))
    ) AS tabla ON tabla.fact = DGEMPRES01.dbo.SLNFACTUR.OID
    LEFT OUTER JOIN dbo.tb_usuarios AS usu3 WITH (NOLOCK) ON usu3.cod_usuario = bt.usu_envio
    LEFT OUTER JOIN DGEMPRES01.dbo.ENTIDADES AS E2 WITH (NOLOCK) ON E2.oid = DGEMPRES01.dbo.GENPACIEN.GPATIPPAC
    AND E2.tipo = 'GPATIPPAC'
    LEFT OUTER JOIN DGEMPRES01.dbo.ENTIDADES AS E3 WITH (NOLOCK) ON E3.oid = DGEMPRES01.dbo.GENPACIEN.GPATIPAFI
    AND E3.tipo = 'GPATIPAFI'
    LEFT OUTER JOIN DATOS.Miredips.dbo.Autotraza AS auto WITH (NOLOCK) ON auto.oid_adm = DGEMPRES01.dbo.ADNINGRESO.OID
    LEFT OUTER JOIN DATOS.Miredips.dbo.Autoobs AS obse WITH (NOLOCK) ON obse.id = auto.obs
    LEFT OUTER JOIN DATOS.Miredips.dbo.Autoobs AS resp WITH (NOLOCK) ON resp.id = auto.resp
    LEFT OUTER JOIN DATOS.Miredips.dbo.adusuarios AS usug WITH (NOLOCK) ON usug.doc = auto.usu
    LEFT OUTER JOIN dbo.bitacora_NoRad AS nr WITH (NOLOCK) ON nr.id_fact = DGEMPRES01.dbo.SLNFACTUR.OID
    LEFT OUTER JOIN dbo.motivos AS mon WITH (NOLOCK) ON mon.id = nr.motivo
    LEFT OUTER JOIN dbo.tb_usuarios AS usunr WITH (NOLOCK) ON usunr.cod_usuario = nr.cod_usu COLLATE Modern_Spanish_CI_AS
WHERE
    (DGEMPRES01.dbo.GENDETCON.GDEPAQUET = '1')
    AND (DGEMPRES01.dbo.SLNFACTUR.ADNINGRESO IS NOT NULL)
    AND (DGEMPRES01.dbo.CRNCXC.CXCESTCAR IN (0, 1))
    AND (DGEMPRES01.dbo.SLNFACTUR.SFADOCANU = '0')
    AND (DGEMPRES01.dbo.CRNCXC.CRNSALDO > 0)
GROUP BY
    g.nom_grupo,
    DGEMPRES01.dbo.GEENENTADM.ENTNOMBRE,
    DGEMPRES01.dbo.ADNCENATE.ACANOMBRE,
    DGEMPRES01.dbo.ADNINGRESO.AINCONSEC,
    DGEMPRES01.dbo.GENPACIEN.PACNUMDOC,
    DGEMPRES01.dbo.GENPACIEN.GPANOMCOM,
    DGEMPRES01.dbo.ADNINGRESO.AINFECING,
    DGEMPRES01.dbo.ADNEGRESO.ADEFECSAL,
    DGEMPRES01.dbo.GENARESER.GASNOMBRE,
    DGEMPRES01.dbo.ADNINGRESO.AINTIPING,
    E.nom,
    C.HCANOMBRE,
    DGEMPRES01.dbo.CRNCXC.CXCESTCAR,
    usu2.cod_usuario,
    usu.cod_usuario,
    bt.usu_envio,
    bt.fecha,
    rol2.nombres,
    rol.nombres,
    bt.obs,
    DGEMPRES01.dbo.SLNFACTUR.SFAFECFAC,
    DGEMPRES01.dbo.SLNFACTUR.SFANUMFAC,
    DGEMPRES01.dbo.GENUSUARIO.USUDESCRI,
    DGEMPRES01.dbo.GENUSUARIO.USUNOMBRE,
    g.cod_grupo,
    rol.id,
    DGEMPRES01.dbo.GENDETCON.GDENOMBRE,
    rol2.id,
    DGEMPRES01.dbo.ADNINGRESO.OID,
    DGEMPRES01.dbo.GENTERCER.TERNUMDOC,
    DGEMPRES01.dbo.GENTERCER.TERNOMCOM,
    E1.nom,
    usu2.ape_usuario,
    usu2.nom_usuario,
    usu.ape_usuario,
    usu.nom_usuario,
    tabla.RADICADO,
    tabla.FECHA_RADICADO,
    tabla.ESTADO_RAD,
    tabla.USURAD,
    tabla.USUNOM,
    usu3.ape_usuario,
    usu3.nom_usuario,
    E2.nom,
    E3.nom,
    DGEMPRES01.dbo.ADNINGRESO.AINLIQCOP,
    DGEMPRES01.dbo.ADNINGRESO.AINLIQCMO,
    auto.comen,
    obse.nom,
    resp.nom,
    auto.comen,
    auto.fecha,
    usug.nombre,
    usug.apellido,
    usunr.nom_usuario,
    usunr.ape_usuario,
    nr.obs,
    nr.fecha,
    mon.nom,
    DGEMPRES01.dbo.SLNFACTUR.OID