<?php
    session_start(); //iniciando a sessão

    $bAuthOk = false; // variável que irá guardar o resultado da validação da autenticação.
    $nId = null; //variável irá guardar o id do usuário
    $nGid = null; // variável irá guardar o id do grupo 1 -> usuário admin 2 -> usuário comum

    // array de usuários
    $aUserBD = [['id' => 1, 'gid' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234'],
                ['id' => 2, 'gid' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234'],
                ['id' => 3, 'gid' => 2, 'email' => 'sif@teste.com.br', 'senha' => '1234'],
                ['id' => 4, 'gid' => 1, 'email' => 'artorias@teste.com.br', 'senha' => '1234']];

    //percorrendo array para validar se o usuário existe e a senha está correta
    foreach($aUserBD as $user) {
        if ( $_POST['email'] === $user['email'] && $_POST['senha'] === $user['senha'] ) { // valida se o e-mail e a senha são idênticos na posição atual do vetor
            $nId = $user['id']; // armazena o id do usuário
            $nGid = $user['gid']; // armazena o id do grupo
            $bAuthOk = true; // armazena verdadeiro, indicando que o usuário foi encontrado

            break;
        }
    }

    //valida se autenticação ocorreu com sucesso e guarda informações essênciais no array global SESSION.
    if ( $bAuthOk ) {
        $_SESSION['Auth'] = $bAuthOk; // Autenticação -> Sucesso
        $_SESSION['id'] = $nId; // Número de Identificação do Usuário
        $_SESSION['gid'] = $nGid; // Número de Identificação do Grupo
        header('Location: home.php'); // Redireciona para home da aplicação
    }

    else {
        $_SESSION['Auth'] = $bAuthOk; // Autenticação -> Falha 
        header('Location: index.php?login=erro'); // Redireciona para pagina de login com parâmetro de erro
    }
?>