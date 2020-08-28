<? require_once "validador_acesso.php"; ?> 

<?php
  $oArquivo = fopen('arquivo.bd', 'r'); // abre o arquivo com os registros dos chamados
  $aChamados = []; // define um array vazio

  //recupera os dados do arquivo e os converte para um formato de array
  while( !feof($oArquivo) ) { // Enquanto não chegar no fim da linha faça
    $cLinha = fgets($oArquivo); //recupera registro da linha atual 

    if ( !empty($cLinha ) ) { // Verifica se a linha é diferente de vazio
      $aRegistro = explode('::', $cLinha ); // converte o registro para um formato array

      if ( $_SESSION['gid'] === 2 ) { // valida se o grupo é dos usuários comuns 
        if ( $_SESSION['id'] != $aRegistro[0] ) { // valida se o id do usuário atual é diferente do que está no registro do chamado
          continue; // retorna para o laço de repetição
        }
      }

      $aChamados[] =  $aRegistro; // armazena o registro
    }
  }

  fclose($oArquivo); // fecha o arquivo
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--FontAwesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <!--CSS Customizado-->
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-light" href="logoff.php">SAIR</a> 
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>

            <div class="card-body">
              <? if ( !empty($aChamados) ) { ?>
                <? foreach($aChamados as $aChamado ) { // imprime os chamados recuperados ?>
                  <div class="card mb-3 bg-light">
                    <div class="card-body">
                      <h5 class="card-title"><?= $aChamado[1] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?= $aChamado[2] ?></h6>
                      <p class="card-text"><?= $aChamado[3] ?></p>
                    </div>
                  </div>
                <? } ?>

              <? } else {  //imprime uma msg caso o usuário não tenha chamados criados?>
                <i class="fas fa-info-circle"></i>
                Vocẽ não possui chamados registrado.
              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>