<?php
/**
 * Created by PhpStorm.
 * User: ESCOPIL
 * Date: 10-01-2019
 * Time: 15:59
 */

date_default_timezone_set("Africa/Maputo");


include_once ("../../dao/pesquisa.php");

    $compras = select("c_compra,c_carrinho,p_produto",
        "c_compra.*,p_nome,p_imagem,p_preco,p_descricao,c_estado",
        "WHERE c_compra.carrinho_id = c_carrinho.c_id AND c_compra.p_id = p_produto.p_id ORDER BY c_carrinho.c_id DESC");


    $resposta = "";


    if($compras){


        for($i = 0; $i < count($compras); $i++) {

            $resposta[] = array(
                'c_id'=>$produtos[$i]["c_id"],
                'c_nome'=>$produtos[$i]["c_nome"],
                'p_id'=>$produtos[$i]["p_id"],
                'p_preco'=>$produtos[$i]["p_preco"],
                'p_descricao'=>$produtos[$i]["p_descricao"],
                'c_estado'=>$produtos[$i]["c_estado"],
                'p_imagem'=>$produtos[$i]["p_imagem"]
            );

        }

        echo json_encode($resposta);

    }else{

        $status = array(
            'estado'=>'erro'
        );

        echo json_encode($status);

    }



