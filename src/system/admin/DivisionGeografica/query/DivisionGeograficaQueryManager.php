<?php
/**
 * DivisionGeograficaQueryManager
 * 
 * Query manager for the user "Domain""
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\DivisionGeografica\Query;


use SPME\Shared\Query\QueryManager;


class DivisionGeograficaQueryManager extends QueryManager {}

DivisionGeograficaQueryManager::fromQueryConstantsAndQueries(
    [
        'r_id'          => 'reg.id',
        'r_tbl'         => 'reg',
        'r_table'       => 'cat_regiones',
        'r_all_columns' => '',

        'e_id'    => 'ef.id',
        'e_tbl'   => 'ef',
        'e_table' => 'cat_entidades_federativas',

        'm_id'    => 'mun.id',
        'm_tbl'   => 'mun',
        'm_table' => 'cat_municipios',
    ],

    [
        'regiones_cant_entidades' => "SELECT :r_tbl.*
                ,COUNT(:e_id) as cant_entidades
            FROM :r_table :r_tbl
                INNER JOIN :e_table :e_tbl ON :e_tbl.cat_regione_id = :r_id AND :e_tbl.deleted != 1
            WHERE :r_tbl.deleted != 1
            GROUP BY :r_id
            ORDER BY :r_id ASC",


        'regiones_con_entidades_para_select' => "SELECT
                :r_id as reg_id
                ,:r_tbl.nombre as region
                ,:e_id as ef_id
                ,:e_tbl.nombre as entidad_federativa
            FROM :r_table :r_tbl
                INNER JOIN :e_table :e_tbl ON :e_tbl.cat_regione_id = :r_id AND :e_tbl.deleted != 1
            WHERE :r_tbl.deleted != 1
            GROUP BY :e_id
            ORDER BY :r_id ASC, :e_id ASC",



        'entidades_cant_municipios' => [
            'query' => "SELECT :e_tbl.*
                    ,COUNT(:m_id) as cant_municipios
                    ,:r_tbl.nombre as region
                FROM :e_table :e_tbl
                    LEFT JOIN :m_table :m_tbl ON :m_tbl.cat_entidades_federativa_id = :e_id AND :m_tbl.deleted != 1
                    LEFT JOIN :r_table :r_tbl ON :e_tbl.cat_regione_id = :r_id AND :r_tbl.deleted != 1
                WHERE :e_tbl.deleted != 1
                    #filtro_por_region
                GROUP BY :e_id
                ORDER BY :e_tbl.cve_entidaD ASC",
            'filtro_por_region' => " AND :e_tbl.cat_regione_id = :region_id ",
        ],


        'municipios' => [
            'query' => "SELECT :m_tbl.*
                    ,:e_tbl.nombre as entidad
                    ,IFNULL(:r_tbl.nombre,'') as region
                FROM :m_table :m_tbl
                    INNER JOIN :e_table :e_tbl ON :m_tbl.cat_entidades_federativa_id = :e_id AND :e_tbl.deleted != 1
                    LEFT JOIN :r_table :r_tbl ON :e_tbl.cat_regione_id = :r_id AND :r_tbl.deleted != 1
                WHERE :m_tbl.deleted != 1
                    #filtro_por_entidad
                    #filtro_nombre
                    #filtro_CVE_MUN
                    #filtro_CVE_ENT_MUN
                    #filtro_region
                    #filtro_entidad
                    #filtro_search
                #order
                #limit",
            'filtro_por_entidad' => " AND :m_tbl.cat_entidades_federativa_id = :entidad_id ",
            'filtro_nombre'      => " AND :m_tbl.nombre LIKE %:nombre ",
            'filtro_CVE_MUN'     => " AND :m_tbl.CVE_MUN LIKE %:CVE_MUN ",
            'filtro_CVE_ENT_MUN' => " AND :m_tbl.CVE_ENT_MUN LIKE %:CVE_ENT_MUN ",
            'filtro_region'      => " AND :r_tbl.nombre = :region ",
            'filtro_entidad'     => " AND :e_tbl.nombre = :entidad ",
            'filtro_search'      => " AND (:m_tbl.nombre LIKE %:search OR :m_tbl.CVE_MUN LIKE %:search OR :m_tbl.CVE_ENT_MUN LIKE %:search OR :r_tbl.nombre = %:search OR :e_tbl.nombre = %:search) ",
            'order'              => " ORDER BY @:order_by @:order_type ",
            'limit'              => " LIMIT :offset, :limit ",
        ] 

        /* 'getAll' =>[
            'query' => "SELECT *
                FROM :table :tbl
                #limit",
            'limit' => "LIMIT :offset, :limit",
        ], */
    ]
);