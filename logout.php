<?php

// Inicia ou recupera a sessão
session_start();

// Remove todas as variáveis da sessão
$_SESSION = [];

// Remove o cookie da sessão
if (ini_get("session.use_cookies")) {

    $parametros = session_get_cookie_params();

    setcookie(
        session_name(),
        "",
        time() - 42000,
        $parametros["path"],
        $parametros["domain"],
        $parametros["secure"],
        $parametros["httponly"]
    );
}

// Destrói a sessão
session_destroy();

// Redireciona para o login
header("Location: index.php");
exit;