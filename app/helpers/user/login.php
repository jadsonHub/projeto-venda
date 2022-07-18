<?php

function loginUser($email, $senha)
{
    $busca = login($email, $senha);
    if ($busca) {
        excluirSession(['dado_email_usuario_login','dado_senha_usuario_login']);
        if($busca['nivel'] == 'Admin'){
            $_SESSION['adm'] = $busca;
            unset($_COOKIE['PHPSESSID']);
            excluirSession('user');
            redirecionar('/adm/dashboard');
        }else{
            $_SESSION['user'] = $busca;
            unset($_COOKIE['PHPSESSID']);
            excluirSession('adm');
            redirecionar('/user/dashboard');
        }
      
    } else {
       return errorEredirect('login_error', 'Usuario ou senha incorretos', '/user/login');
    }
}
