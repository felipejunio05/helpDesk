<?php
    //Removendo caraceter '::' por '-' caso esteja contido no conteudo.
    $_POST['titulo'] = str_replace('::', '-', $_POST['titulo']);
    $_POST['descricao'] = str_replace('::', '-', $_POST['descricao']);

    //convertendo array para texto com aplicação do delimitador '::'
    $conteudo = implode('::', $_POST) . PHP_EOL;

    $arquivo = fopen('arquivo.bd', 'a'); //Abrindo arquivo para armazenar os chamados
    fwrite($arquivo, $conteudo); //Gravando no arquivo
    fclose($arquivo); //Fechando o arquivo

    header('Location: abrir_chamado.php') // Retornando para pagina de abertura de chamado.
?>