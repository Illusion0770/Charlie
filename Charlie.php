<?php
/**
 * Created by PhpStorm.
 * User: illusion
 * Date: 27/03/19
 * Time: 16:19
 */
try {

    $aDirectories=glob("FTP/*",GLOB_ONLYDIR);

    foreach($aDirectories as $sDirectory)
    {
        $sModified=date("d/m/Y H:i:s",filectime($sDirectory));
        $aContent[$sModified]=$sDirectory;
    }

    ksort($aContent,SORT_STRING);

    foreach($aContent as $sModified=>$sDirectory)
    {

        echo "<p>Diretório: " . $sDirectory . " -> Última integração: " . $sModified . "</p>";
    }


} catch (UnexpectedValueException $e) {
    echo "Erro " . $e->getMessage();
}
