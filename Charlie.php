<?php
/**
 * Created by PhpStorm.
 * User: illusion
 * Date: 27/03/19
 * Time: 16:19
 */
$timestampAgora = time();
try {

    /*CRIA ARRAY DE DIRETÓRIOS COM A ÚLTIMA DATA DE ALTERAÇÃO*/

    $aDirectories   = glob("FTP/*",GLOB_ONLYDIR);
    $listaClientes  = array();
    $contador       = 0;

    function NewerArq($diretorio){
        $dataMaisAtual  = 0;
        $arquivos       = glob("$diretorio/*.*", GLOB_ERR);

        foreach ($arquivos as $arquivo){
            $dataArq = date("Y-m-d H:i:s", fileatime($arquivo));
                if($dataArq > $dataMaisAtual) {
                    $dataMaisAtual = $dataArq;
                }
        }
        return $dataMaisAtual;
    }

    foreach($aDirectories as $sDirectory){

        $sModified                          = date("Y-m-d H:i:s",filectime($sDirectory));
        $ObjetoClientes                     = new stdClass;
        $ObjetoClientes->Cliente            = $sDirectory;
        $ObjetoClientes->DataModificacao    = NewerArq($sDirectory);
        $ObjetoClientes->Ordenador          = strtotime($ObjetoClientes->DataModificacao);
        $listaClientes[$contador]           = $ObjetoClientes;
        $contador++;
    }

    /*ORGANIZA O ARRAY DE DIRETÓRIOS POR DATA DE ALTERAÇÃO MAIS ANTIGO[0] >> MAIS NOVO[N]*/

    for($i = 0; $i < sizeof($listaClientes); $i++){
        for($j = 0; $j < (sizeof($listaClientes) - 1); $j++){
            if($listaClientes[$j]->Ordenador >= $listaClientes[$j+1]->Ordenador){
                $aux                    = $listaClientes[$j];
                $listaClientes[$j]      = $listaClientes[$j+1];
                $listaClientes[$j+1]    = $aux;
            }
        }
    }

    /*DA O NOME AOS PLACEHOLDERS DOS INPUTS DE NOME */
//
    $json_dataCounter   = 0;
    $json_data          = json_decode(file_get_contents('json/ArquivoSyncCharlie.json', true));
    $json_data_object   = $json_data[$json_dataCounter];
    $test               = get_object_vars($json_data_object);
    /*VERIFICA SE FAZ MAIS DE 24/48 HORAS DESDE A ÚLTIMA INTEGRAÇÃO, MOSTRA AS INFORMAÇÕES NA TELA*/

    foreach($listaClientes as $cliente)
    {
        $timestampCliente   = strtotime($cliente->DataModificacao);
        $diferenca          = $timestampAgora - $timestampCliente;
        $diferenca          = $diferenca / 3600;

        $json_data          = json_decode(file_get_contents('json/ArquivoSyncCharlie.json', true));
        $json_data_object   = $json_data[$json_dataCounter];
        $test               = get_object_vars($json_data_object);
        $final_result       = new stdClass();

        if($test['codigocliente'] === ''){
            $test['nomecliente']    = '';
            $test['codigocliente']  = '';
        }


        if($cliente->DataModificacao) {

            $array_compared_object = array();

            for($i = 0; $i < sizeof($json_data); $i++){
                $json_data                  = json_decode(file_get_contents('json/ArquivoSyncCharlie.json', true));
                $json_data_object           = $json_data[$i];
                $test                       = get_object_vars($json_data_object);
                $compared_object            = new stdClass();
                $compared_object->Nome      = $test['nomecliente'];
                $compared_object->Codigo    = $test['codigocliente'];
                $compared_object->Pasta     = $test['pasta'];
                $array_compared_object[$i]  = $compared_object;
            }

            if ($diferenca > 48) {
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                for($i = 0; $i < sizeof($json_data); $i++){
                    if($array_compared_object[$i]->Pasta == basename($cliente->Cliente)){
                        $final_result->Codigo   = $array_compared_object[$i]->Codigo;
                        $final_result->Nome     = $array_compared_object[$i]->Nome;
                    }
                }
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente" value="<?=$final_result->Codigo . ' - ' . $final_result->Nome?>">
                </td>
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?= date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),"d/m/Y H:i:s") ?>
                </td>
                <td class="Verificar"><strong>Verificar</strong></td>
                </tr><?php
                $json_dataCounter++;
            } else if (24 < $diferenca && $diferenca <= 48) {
                for($i = 0; $i < sizeof($json_data); $i++){
                    if($array_compared_object[$i]->Pasta == basename($cliente->Cliente)){
                        $final_result->Codigo   = $array_compared_object[$i]->Codigo;
                        $final_result->Nome     = $array_compared_object[$i]->Nome;
                    }
                }
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente" value="<?=$final_result->Codigo . ' - ' . $final_result->Nome?>">
                </td>
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?= date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),"d/m/Y H:i:s") ?>
                </td>
                <td class="Verificar2"><strong>Verificar</strong></td>
                </tr><?php
                $json_dataCounter++;
            } else if ($diferenca <= 24) {
                for($i = 0; $i < sizeof($json_data); $i++){
                    if($array_compared_object[$i]->Pasta == basename($cliente->Cliente)){
                        $final_result->Codigo   = $array_compared_object[$i]->Codigo;
                        $final_result->Nome     = $array_compared_object[$i]->Nome;
                    }
                }
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente" value="<?=$final_result->Codigo . ' - ' . $final_result->Nome?>">
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?=date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),"d/m/Y H:i:s")?>
                </td>
                <td class="Atualizado"><strong>OK</strong></td>
                </tr><?php
                $json_dataCounter++;
            }
        }
    }

} catch (UnexpectedValueException $e) {
    echo "Erro " . $e->getMessage();
}
