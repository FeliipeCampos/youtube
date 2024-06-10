<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senhaHash')";

    if ($conn->query($query) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
}

$conn->close();
?>
