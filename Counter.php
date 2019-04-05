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
    $aDirectories=glob("FTP/*",GLOB_ONLYDIR);

    $listaClientes=array();
    $contador = 0;

    function OlderArq2($diretorio){
        $dataMaisAtual = 0;
        $arquivos = glob("$diretorio/*.*", GLOB_ERR);

        foreach ($arquivos as $arquivo){
            $dataArq = date("Y-m-d H:i:s", filectime($arquivo));
            if($dataArq > $dataMaisAtual) {
                $dataMaisAtual = $dataArq;
            }
        }
        return $dataMaisAtual;
    }

    foreach($aDirectories as $sDirectory){

        $sModified=date("Y-m-d H:i:s",filectime($sDirectory));
        $ObjetoClientes = new stdClass;
        $ObjetoClientes->Cliente = $sDirectory;
        $ObjetoClientes->DataModificacao = OlderArq2($sDirectory);
        $ObjetoClientes->Ordenador = strtotime($ObjetoClientes->DataModificacao);

        $listaClientes[$contador] = $ObjetoClientes;
        $contador++;
    }

   /*CONTADORES DE "VERIFICAR" & "OK"*/
    $VerificarCount=0;
    $AtualizadoCount=0;

    /*VERIFICA SE FAZ MAIS DE 24 HORAS DESDE A ÚLTIMA INTEGRAÇÃO, CONTA QUANTOS TEM DE CADA*/
    foreach($listaClientes as $cliente)
    {
        $timestampCliente = strtotime($cliente->DataModificacao);
        $diferenca = $timestampAgora - $timestampCliente;
        $diferenca = $diferenca / 3600;
        if($cliente->DataModificacao) {
            if ($diferenca > 24) {
                $VerificarCount++;
            } else if ($diferenca <= 24) {
                $AtualizadoCount++;
            }
        }
    }

    ?>Verificar: <?= $VerificarCount ?> Atualizado: <?= $AtualizadoCount ?><?php


} catch (UnexpectedValueException $e) {
    echo "Erro " . $e->getMessage();
}
