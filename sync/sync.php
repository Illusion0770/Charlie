<?php

$clientes = $_POST['clientes'];

$ArquivoSync = '../json/ArquivoSyncCharlie.json';

$fp = fopen($ArquivoSync,'a+');

fwrite($fp, '');
fwrite($fp, $clientes);

fclose($fp);