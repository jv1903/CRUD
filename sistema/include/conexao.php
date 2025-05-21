<?php
$host = "localhost";
$banco = "teste-bdd";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>