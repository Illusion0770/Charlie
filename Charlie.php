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

    function NewerArq($diretorio){
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
        $ObjetoClientes->DataModificacao = NewerArq($sDirectory);
        $ObjetoClientes->Ordenador = strtotime($ObjetoClientes->DataModificacao);

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
    /*GRAVADOR DE VÍNCULOS*/
    function Vincular($data)
    {
        $vinculos = new stdClass();
        $vinculos->Data = $data;
//        $vinculos->codigo = $codigo;
    }

    /*CONTADORES DE "VERIFICAR" & "OK"*/
    $VerificarCount=0;
    $AtualizadoCount=0;
    /*VERIFICA SE FAZ MAIS DE 24 HORAS DESDE A ÚLTIMA INTEGRAÇÃO, MOSTRA AS INFORMAÇÕES NA TELA*/
    foreach($listaClientes as $cliente)
    {
        $timestampCliente = strtotime($cliente->DataModificacao);
        $diferenca = $timestampAgora - $timestampCliente;
        $diferenca = $diferenca / 3600;


        if($cliente->DataModificacao) {
            if ($diferenca > 48) {
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente">
                </td>
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?= date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),
                        "d/m/Y H:i:s") ?></td>
                <td class="Verificar"><strong>Verificar</strong></td>
                </tr><?php
//                $codigo = $_POST['codigo'];
                Vincular($cliente->DataModificacao);
            } else if (24 < $diferenca && $diferenca <= 48) {
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente">
                </td>
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?= date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),
                        "d/m/Y H:i:s") ?></td>
                <td class="Verificar2"><strong>Verificar</strong></td>
                </tr><?php
            } else if ($diferenca <= 24) {
                $cliente->Cliente = utf8_encode($cliente->Cliente);
                ?>
                <tr>
                <td>
                    <input type="text" name="cliente" class="cliente">
                </td>
                <td class="pastas"><?= basename($cliente->Cliente) ?></td>
                <td class="datasync">
                    <?= date_format(date_create_from_format('Y-m-d H:i:s', $cliente->DataModificacao),
                        "d/m/Y H:i:s") ?></td>
                <td class="Atualizado"><strong>OK</strong></td>
                </tr><?php
            }
        }
    }


} catch (UnexpectedValueException $e) {
    echo "Erro " . $e->getMessage();
}
