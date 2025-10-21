<?php



include '../classes/servicos.php';
include '../classes/Documentos.php';

$objServicos = new Servicos();



$dadosServicos = $objServicos->trazerServicos($_POST['idServico']);

echo $dadosServicos[0]['textoCartaServico'];
