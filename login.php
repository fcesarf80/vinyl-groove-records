<?php

session_start();

require_once "conexao.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recebe os dados do formulário
$email = trim($_POST["email"] ?? "");
$senha = $_POST["password"] ?? "";

// Verifica se os campos foram preenchidos
if (empty($email) || empty($senha)) {

    $_SESSION["login_erro"] = "Preencha todos os campos.";

    header("Location: index.php");
    exit;
}

// Consulta o utilizador na base de dados
$sql = "SELECT id_dados, email, password, tipo
        FROM dados
        WHERE email = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conn->error);
}

$stmt->bind_param("s", $email);

$stmt->execute();

$resultado = $stmt->get_result();

// Verifica se o utilizador existe
if ($resultado->num_rows === 1) {

    $utilizador = $resultado->fetch_assoc();

    // Valida a senha
    if (password_verify($senha, $utilizador["password"])) {

        // Cria uma nova sessão
        session_regenerate_id(true);

        $_SESSION["id_dados"] = $utilizador["id_dados"];
        $_SESSION["email"] = $utilizador["email"];
        $_SESSION["tipo"] = $utilizador["tipo"];

        // Mensagem de sucesso
        $_SESSION["login_sucesso"] = "Login efetuado com sucesso!";

        // Fecha a consulta e a conexão
        $stmt->close();
        $conn->close();

        // Redireciona para a área reservada
        header("Location: paginas/home.php");
        exit;
    }
}

// Fecha a consulta e a conexão
$stmt->close();
$conn->close();

// Credenciais inválidas
$_SESSION["login_erro"] = "E-mail ou senha incorretos.";

header("Location: index.php");
exit;
