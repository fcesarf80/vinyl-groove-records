<?php

// Inicia a sessão, caso ainda não esteja ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Recupera e limpa a mensagem de erro
$erro = $_SESSION["login_erro"] ?? "";

unset($_SESSION["login_erro"]);

?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Vinyl & Groove Records</title>

    <!-- MDBootstrap -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css"
        rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="login-page">

    <header class="banner">
        <img
            src="assets/img/banner-cinel-vinyl-groove.png"
            alt="CINEL — Vinyl & Groove Records"
            class="banner-imagem">
    </header>

    <div class="login-card shadow">

        <h1 class="logo">VINYL & GROOVE</h1>

        <p class="subtitle">RECORDS</p>

        <h5 class="text-center mb-4">
            Área Reservada
        </h5>

        <?php if (!empty($erro)): ?>

            <p class="mensagem-erro">
                <?= htmlspecialchars($erro) ?>
            </p>

        <?php endif; ?>

        <form action="login.php" method="POST">

            <!-- E-mail -->
            <div class="form-outline mb-4">

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    autocomplete="username"
                    required>

                <label class="form-label" for="email">
                    E-mail
                </label>

            </div>

            <!-- Senha -->
            <div class="form-outline mb-4">

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    autocomplete="current-password"
                    required>

                <label class="form-label" for="password">
                    Senha
                </label>

            </div>

            <!-- Botão -->
            <button
                type="submit"
                class="btn btn-login btn-block">
                ENTRAR
            </button>

        </form>

        <p class="text-center mt-4 mb-0">
            <small>Good Music Never Gets Old.</small>
        </p>

    </div>

    <!-- MDBootstrap JavaScript -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.js">
    </script>

</body>

</html>