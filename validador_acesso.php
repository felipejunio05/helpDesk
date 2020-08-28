<?php
  session_start();

  if ( !isset($_SESSION['Auth']) || !$_SESSION['Auth'] ) {
    header("Location: index.php?login=erro2");
  }
?>