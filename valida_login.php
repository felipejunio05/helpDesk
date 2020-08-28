<?php
    session_start(); //iniciando a sessão
    $bAuthOk = false; // variável que valida se usuário foi encontrado.

    // array de usuários
    $aUserBD = [['email' => 'adm@teste.com.br', 'senha' => '12345'],
                     ['email' => 'user@teste.com.br', 'senha' => '0000']];

    //percorrendo array para validar se o usuário existe e a senha está correta
    foreach($aUserBD as $user) {
        if ( $_POST['email'] === $user['email'] && $_POST['senha'] === $user['senha'] ){
            $bAuthOk = true;
            break;
        }
    }

    //valida se autenticação ocorreu com sucesso Usuário e senha correta.
    if ($bAuthOk) {
        $_SESSION['Auth'] = true;
        header('Location: home.php');
        
    }
 
    else {
        $_SESSION['Auth'] = false;
        header('Location: index.php?login=erro');
    }
?>