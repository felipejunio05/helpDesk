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
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <? if ( isset($_GET['login']) && $_GET['login'] === 'erro' ) { // exibe msg de erro para falha no login?>
                  <div class="text-danger pb-2">
                    <i class="fas fa-exclamation-triangle"></i>
                    Usuário ou senha inválido(s)
                  </div>
                <? } ?>

                <? if ( isset($_GET['login']) && $_GET['login'] === 'erro2' ) { //exibe msg de erro para acesso não autorizado ?>
                  <div class="text-danger pb-2">
                    <i class="fas fa-exclamation-triangle"></i>
                    Efetue o login para acessar o conteúdo
                  </div>
                <? } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>