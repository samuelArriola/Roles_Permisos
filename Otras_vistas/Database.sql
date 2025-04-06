SELECT
    genproducto.id genproductoId, GeProCod, GeProDesc, GeProPreCom, GeProPreven, GeProStock, genmedpro.GeMedDes, GeProCan, genprocateg.GeCatDes, GeProEstado
FROM
    genproducto
    inner join genprocateg on GeCatID = genprocateg.id
    inner join genmedpro on GeMedId = genmedpro.id;