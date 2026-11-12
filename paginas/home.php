<?php

// Proteção da página
require_once "../includes/auth.php";

// Recupera a mensagem de sucesso
$mensagem = $_SESSION["login_sucesso"] ?? "";

unset($_SESSION["login_sucesso"]);

// Recupera o e-mail da sessão
$email = $_SESSION["email"] ?? "";

// Carrega o banner e o menu
require_once "../includes/header.php";

?>

<h2>Bem-vindo à Vinyl & Groove Records!</h2>

<?php if (!empty($mensagem)): ?>

    <div class="alert alert-success mt-4">
        <?= htmlspecialchars($mensagem) ?>
    </div>

<?php endif; ?>

<p>
    Olá,
    <strong>
        <?= htmlspecialchars($email) ?>
    </strong>!
</p>

<p>
    Você está na área reservada da nossa empresa.
</p>

<p>
    Explore o nosso espaço e utilize o menu para
    navegar pelas funcionalidades da aplicação.
</p>

<hr>

<h4>Good Music Never Gets Old.</h4>

<p>
    Vinyl & Groove Records — Uma paixão que atravessa gerações.
</p>

</main>

</body>

</html>