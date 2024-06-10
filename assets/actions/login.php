<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query = "SELECT id, nome, sobrenome, email, senha FROM usuarios WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido, criação da sessão
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['sobrenome'] = $row['sobrenome'];
            $_SESSION['email'] = $row['email'];

            // Redireciona para index.php
            header("Location: ../../index.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado";
    }
}

$conn->close();
?>
