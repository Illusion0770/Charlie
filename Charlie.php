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
    foreach($aDirectories as $sDirectory)
    {
        $sModified=date("Y-m-d H:i:s",filectime($sDirectory));
        $aContent[$sModified]=$sDirectory;
        $ObjetoClientes = new stdClass;
        $ObjetoClientes->Cliente = $sDirectory;
        $ObjetoClientes->DataModificacao = $sModified;
        $ObjetoClientes->Ordenador = strtotime($sModified);
        $listaClientes[$contador] = $ObjetoClientes;
        $contador++;
    }

    /*ORGANIZA O ARRAY DE DIRETÓRIOS POR DATA DE ALTERAÇÃO MAIS ANTIGO[0] >> MAIS NOVO[N]*/
    for($i = 0; $i < sizeof($listaClientes); $i++){
        for($j = 0; $j < (sizeof($listaClientes) - 1); $j++){
            if($listaClientes[$j]->Ordenador >= $listaClientes[$j+1]->Ordenador){
                $aux = $listaClientes[$j];
                $listaClientes[$j] = $listaClientes[$j+1];
                $listaClientes[$j+1] = $aux;
            }
        }
    }

    /*VERIFICA SE FAZ MAIS DE 24 HORAS DESDE A ÚLTIMA INTEGRAÇÃO, MOSTRA AS INFORMAÇÕES NA TELA*/
    foreach($listaClientes as $cliente)
    {
        $timestampCliente = strtotime($cliente->DataModificacao);
        $diferenca = $timestampAgora - $timestampCliente;
        $diferenca = $diferenca / 3600;
        if($diferenca > 24){
            ?><tr><td class="Verificar"><?=basename($cliente->Cliente)?></td> <td class="Verificar"><?=date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao), "d/m/Y H:i:s")?></td><td class="Verificar">Verificar</td></tr></tr><?php
        } else if($diferenca <= 24) {
            ?><tr><td class="Atualizado"><?=basename($cliente->Cliente)?></td> <td class="Atualizado"><?=date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao), "d/m/Y H:i:s")?></td><td class="Atualizado">OK</td></tr><?php
        }
    }


} catch (UnexpectedValueException $e) {
    echo "Erro " . $e->getMessage();
}
