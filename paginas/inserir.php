<?php

// Proteção da página
require_once "../includes/auth.php";

// Conexão com o banco de dados
require_once "../conexao.php";

// Mensagens
$mensagem = "";
$tipoMensagem = "";

// Processar formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["password"] ?? "";
    $tipo = $_POST["tipo"] ?? "";

    // Validar campos
    if (empty($email) || empty($senha) || $tipo === "") {

        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "danger";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $mensagem = "Introduza um e-mail válido.";
        $tipoMensagem = "danger";
    } elseif (strlen($senha) < 6) {

        $mensagem = "A senha deve possuir pelo menos 6 caracteres.";
        $tipoMensagem = "danger";
    } elseif (!in_array($tipo, ["0", "1"], true)) {

        $mensagem = "Selecione um tipo de utilizador válido.";
        $tipoMensagem = "danger";
    } else {

        // Verificar se o e-mail já existe
        $sql = "SELECT id_dados FROM dados WHERE email = ?";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {

            $mensagem = "Este e-mail já está registado.";
            $tipoMensagem = "danger";
        } else {

            // Proteger a senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir utilizador
            $sql = "INSERT INTO dados (email, password, tipo)
                    VALUES (?, ?, ?)";

            $stmtInserir = $conn->prepare($sql);

            if (!$stmtInserir) {
                die("Erro ao preparar a inserção: " . $conn->error);
            }

            $tipoInteiro = (int) $tipo;

            $stmtInserir->bind_param("ssi", $email, $senhaHash, $tipoInteiro);

            if ($stmtInserir->execute()) {

                $mensagem = "Utilizador inserido com sucesso!";
                $tipoMensagem = "success";
            } else {

                $mensagem = "Erro ao inserir utilizador.";
                $tipoMensagem = "danger";
            }

            $stmtInserir->close();
        }

        $stmt->close();
    }
}

// Cabeçalho da aplicação
require_once "../includes/header.php";

?>

<h2>Inserir Utilizador</h2>

<p>Registar um novo utilizador na Vinyl & Groove Records.</p>

<?php if (!empty($mensagem)): ?>

    <div class="alert alert-<?= $tipoMensagem ?> mt-4">
        <?= htmlspecialchars($mensagem) ?>
    </div>

<?php endif; ?>

<form method="POST" action="inserir.php">

    <!-- E-mail -->
    <div class="form-outline mb-4">

        <input
            type="email"
            name="email"
            id="email"
            class="form-control"
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
            minlength="6"
            required>

        <label class="form-label" for="password">
            Senha
        </label>

    </div>

    <!-- Tipo -->
    <div class="mb-4">

        <label for="tipo" class="form-label">
            Tipo de utilizador
        </label>

        <select name="tipo" id="tipo" class="form-select" required>

            <option value="">Selecione...</option>

            <option value="1">Administrador</option>

            <option value="0">Utilizador</option>

        </select>

    </div>

    <!-- Botão -->
    <button type="submit" class="btn btn-danger">
        INSERIR UTILIZADOR
    </button>

</form>

<?php

$conn->close();

?>

</main>

</body>

</html>