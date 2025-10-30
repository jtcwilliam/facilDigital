<?php

 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 

include_once 'classe/servicos.php';

$objservico = new servicosFacil();

$dados = $objservico->trazerServicos();





?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foundation for Sites</title>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/app.css">
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
  <script>

  </script>
  <style>
    label {
      font-weight: 800;
      font-size: 1.1em;

    }

    .tituloTabela {
      font-weight: 800;
      font-size: 1.1em;
      background-color: #e0e0e0;
    }

    /* Aumenta a altura do campo de entrada */
    .select2-container .select2-selection--single {
      height: 50px !important;
      /* Ajuste o valor conforme sua necessidade */
    }

    /* Centraliza verticalmente o texto no campo */
    .select2-container .select2-selection--single .select2-selection__rendered {
      line-height: 50px !important;
      /* Deve ter o mesmo valor do `height` */
    }
  </style>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>





  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">




        <fieldset class="fieldset">
          <legend>Pesquisa de Serviços</legend>

          <div class="grid-x grid-padding-x">
            <div class="large-12 cell">


              <label>Especificação</label>
              <select class="mySelect" style="width: 100%;  " name="codigoUrl" id="codigoUrl" required>
                <option>Digite qual serviço quer solicitar</option>
                <?php
                foreach ($dados as $key => $value) {
                  echo '<option value=' . $value['idCartaServico'] . '  >' . $value['descricaoCarta'] . '</option>';
                }
                ?>
              </select>

            </div>

            <div class="cell auto"> </div>

            <div class="large-4 cell">
              <center>
                <label> &nbsp;<br> </label>
                <a class="button " href="#" onclick="consultarServicos($('#codigoUrl').val())"
                  style="height: 50px !important;  border-radius: 10px; font-weight: 600;  width: 100%;"> Consultar Serviço</a>
                </a>
              </center>
            </div>

            <div class="cell auto"> </div>

          </div>
        </fieldset>




        <div id="infor" style="font-family: Arial, Helvetica, sans-serif;">

        </div>



      </div>
    </div>
  </div>







  <script>
    $(document).ready(function() {


      $('.mySelect').select2();

    });
  </script>

  <script>
    function consultarServicos(codigo) {







      var formData = {
        codigo: codigo,

        consultarServico: '1'
      };
      $.ajax({
          type: 'POST',
          url: 'ajax/servicosController.php',
          data: formData,
          dataType: 'html',
          encode: true

        })

        .done(function(data) {


          $('#infor').html(data);
        });

      event.preventDefault();


    }
  </script>


</body>


</html>