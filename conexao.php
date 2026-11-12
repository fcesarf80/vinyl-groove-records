
<?php

$configPath = __DIR__ . '/config/config.local.php';

if (!file_exists($configPath)) {
    die('Arquivo de configuração local não encontrado.');
}

$config = require $configPath;

$db = $config['database'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli(
        $db['host'],
        $db['username'],
        $db['password'],
        $db['database']
    );

    $conn->set_charset($db['charset']);
} catch (mysqli_sql_exception $e) {
    error_log('Erro de conexão com o banco de dados: ' . $e->getMessage());

    die('Não foi possível estabelecer conexão com o banco de dados.');
}
