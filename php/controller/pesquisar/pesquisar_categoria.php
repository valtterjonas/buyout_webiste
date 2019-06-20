<?php
/**
 * Created by PhpStorm.
 * User: ESCOPIL
 * Date: 31-03-2019
 * Time: 18:54
 */


include_once("../../dao/pesquisa.php");
include_once("../../dao/adicionar.php");

date_default_timezone_set("Africa/Maputo");

$data_actual = date("Y-m-d H:i:s");

if (true) {


    $categorias = select("c_categoria", "c_id,c_nome,c_descricao");

    $resposta = array();

    if ($categorias) {

        for ($i = 0; $i < count($categorias); $i++) {


            $resposta[] = array(
                'c_id'=>$categorias[$i]["c_id"],
                'c_nome'=>$categorias[$i]["c_nome"],
                'c_descricao'=>$categorias[$i]["c_descricao"]
            );

        }

        echo json_encode($resposta);

}

} else {

    $status = array(
        'estado' => 'login'
    );

    echo json_encode($status);

}
