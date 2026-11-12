<?php

// Proteção da página
require_once "../includes/auth.php";

// Conexão com o banco de dados
require_once "../conexao.php";

// Consultar utilizadores
$sql = "SELECT id_dados, email, tipo
        FROM dados
        ORDER BY id_dados";

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Erro ao consultar os utilizadores: " . $conn->error);
}

// Carrega o banner e o menu
require_once "../includes/header.php";

?>

<h2>Lista de Utilizadores</h2>

<p>Registos encontrados: <?= $resultado->num_rows ?></p>

<table class="table table-striped table-bordered">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Tipo</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($utilizador = $resultado->fetch_assoc()): ?>

            <tr>

                <td>
                    <?= (int) $utilizador["id_dados"] ?>
                </td>

                <td>
                    <?= htmlspecialchars($utilizador["email"]) ?>
                </td>

                <td>
                    <?= (int) $utilizador["tipo"] === 1
                        ? "Administrador"
                        : "Utilizador" ?>
                </td>

            </tr>

        <?php endwhile; ?>

    </tbody>

</table>

<?php

$resultado->free();
$conn->close();

?>

</main>

</body>

</html>