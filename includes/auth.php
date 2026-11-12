<?php

session_start();

// Verifica se existe um utilizador autenticado
if (!isset($_SESSION["id_dados"])) {

    header("Location: ../index.php");
    exit;
}