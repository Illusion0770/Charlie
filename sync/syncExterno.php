<?php

$code = $_GET['codigo'];

//$json_data          = json_decode($_POST['clientes']);
$json_data          = json_decode(file_get_contents('../json/ArquivoSyncCharlie.json', true));
$returned_Object    = new stdClass();

for($i = 0; $i < sizeof($json_data); $i++){

    $test                   = get_object_vars($json_data[$i]);
    $inside_object          = new stdClass();
    $inside_object->Codigo  = $test['codigocliente'];
    $inside_object->Data    = $test['data'];

    if($code == $inside_object->Codigo){

        $returned_Object->Codigo    = $inside_object->Codigo;
        $returned_Object->Data      =  $inside_object->Data;

    }
}

print_r($returned_Object->Data);