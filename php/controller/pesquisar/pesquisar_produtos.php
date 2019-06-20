<?php
/**
 * Created by PhpStorm.
 * User: ESCOPIL
 * Date: 14-01-2019
 * Time: 14:03
 */

include_once("../../dao/pesquisa.php");
include_once("../../dao/adicionar.php");

date_default_timezone_set("Africa/Maputo");

$data_actual = date("Y-m-d H:i:s");

$subcategoria = $_REQUEST["subcategoria"];
$subcategoria = "0";



        $produtos = select("p_produto","p_id,p_nome,p_descricao,p_preco,p_ultimo_preco,p_desconto,p_imagem", "
        WHERE p_estado LIKE 'activo' 
        AND s_id = $subcategoria 
        ORDER BY p_id DESC");



    $resposta = "";

    if ($produtos) {


        for ($i = 0; $i < count($produtos); $i++) {

            $resposta[] = array(
                'p_id'=>$produtos[$i]["p_id"],
                'p_nome'=>$produtos[$i]["p_nome"],
                'p_preco'=>$produtos[$i]["p_preco"],
                'p_descricao'=>$produtos[$i]["p_descricao"],
                'p_ultimo_preco'=>$produtos[$i]["p_ultimo_preco"],
                'p_imagem'=>$produtos[$i]["p_imagem"],
                'p_desconto'=>$produtos[$i]["p_desconto"]
            );

        }

        echo json_encode($resposta);

} else {

    $status = array(
        'estado' => 'erro'
    );

    echo json_encode($status);

}
