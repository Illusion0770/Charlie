<?php

$clientes = $_POST['clientes'];

$ArquivoSync = '../json/ArquivoSyncCharlie.json';

$fp = fopen($ArquivoSync,'w+');

fwrite($fp, '');
fwrite($fp, $clientes);

fclose($fp);

echo $clientes;