<?php
  session_start(); //iniciando a sessão

  //Verificando se o acesso é válido.
  if ( !isset($_SESSION['Auth']) || !$_SESSION['Auth'] ) {
    header("Location: index.php?login=erro2"); // encaminhando para index.php
  }
?>