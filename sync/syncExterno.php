<?php

date_default_timezone_set('America/Sao_Paulo');
$code = $_GET['codigo'];

function NewerArq($diretorio){
    $dataMaisAtual  = 0;
    $arquivos       = glob("../FTP/$diretorio/*.*", GLOB_ERR);

    foreach ($arquivos as $arquivo){

        $dataArq = date("Y-m-d H:i:s", filectime($arquivo));

        if($dataArq > $dataMaisAtual) {

            $dataMaisAtual = $dataArq;

        }
    }
    return $dataMaisAtual;
}

$json_data          = json_decode(file_get_contents('../json/ArquivoSyncCharlie.json', true));

$returned_Object    = new stdClass();

    for($i = 0; $i < sizeof($json_data); $i++){

        $test                   = get_object_vars($json_data[$i]);
        $inside_object          = new stdClass();
        $inside_object->Codigo  = $test['codigocliente'];
        $inside_object->Pasta   = $test['pasta'];
        $inside_object->Nome    = $test['nomecliente'];

        if($code == $inside_object->Codigo){

            $returned_Object->Codigo    = $inside_object->Codigo;
            $returned_Object->Pasta     = $inside_object->Pasta;
            $returned_Object->Nome      = $inside_object->Nome;
            $returned_Object->Data      = NewerArq($inside_object->Pasta);
            $returned_Object->Status    = 'OK';
            break;
            
        } else {
            $returned_Object->Codigo    = '';
            $returned_Object->Pasta     = '';
            $returned_Object->Data      = '';
            $returned_Object->Status    = 'Não Encontrado';
        }
    }

    $return_json = new stdClass();

    if($returned_Object->Data){
        $return_json->Nome      = $returned_Object->Nome;
        $return_json->Data      = date_format(date_create_from_format('Y-m-d H:i:s', $returned_Object->Data),"d/m/Y H:i:s");
        $return_json->Status    = $returned_Object->Status;
    } else {
        $return_json->Status    = $returned_Object->Status;
    }


print_r(json_encode($return_json));