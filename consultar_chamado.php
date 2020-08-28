<? require_once "validador_acesso.php"; ?>
<?php 
  $arquivo = fopen('arquivo.bd', 'r');
  $chamados = [];

  while( !feof($arquivo) ) {
    $registro = fgets($arquivo);

    if ( !empty($registro) ) {
      $chamados[] = explode('::', $registro);
    }
  }

  fclose($arquivo);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
              <? foreach($chamados as $chamado ) {?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado[0] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[1] ?></h6>
                    <p class="card-text"><?= $chamado[2] ?></p>

                  </div>
                </div>
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