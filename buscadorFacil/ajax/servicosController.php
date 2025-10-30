<?php

include_once '../classe/servicos.php';

$objServicos = new servicosFacil();



$dados = $objServicos->consultarDadosServicos($_POST['codigo']);

 

 ?>
  <div class="grid-x grid-padding-x">
      <div class="large-12 cell">

      


        <fieldset class="fieldset">
           
          <?=$dados[0]['textoCartaServico'];?>
          
        </fieldset>
      </div>
  </div>



 








 