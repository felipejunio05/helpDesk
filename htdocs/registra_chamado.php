<?php
    session_start();

    //Removendo caraceter '::' por '-' caso esteja contido no conteudo.
    $_POST['titulo'] = str_replace('::', '-', $_POST['titulo']);
    $_POST['descricao'] = str_replace('::', '-', $_POST['descricao']);

    //convertendo array para texto com aplicação do delimitador '::'
    $cConteudo = $_SESSION['id'] . '::' . implode('::', $_POST) . PHP_EOL;

    $oArquivo = fopen('../includes/arquivo.bd', 'a'); //Abrindo arquivo para armazenar os chamados
    fwrite($oArquivo, $cConteudo); //Gravando no arquivo
    fclose($oArquivo); //Fechando o arquivo

    header('Location: abrir_chamado.php') // Retornando para pagina de abertura de chamado.
?>