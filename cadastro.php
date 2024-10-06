<?php
session_start();

if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
    print "<script>alert('Preencha todos os campos!');</script>";
    print "<script>location.href='cadastro.php'</script>";
    exit;
}

include('config.php');

$usuario = $_POST["usuario"];
$senha = ($_POST["senha"]);

// Verificar se o usuário já existe
$sqlCheck = "SELECT * FROM usuarios WHERE usuario = '{$usuario}'";
$resCheck = $conn->query($sqlCheck) or die($conn->error);

if ($resCheck->num_rows > 0) {
    print "<script>alert('Usuário já cadastrado!');</script>";
    print "<script>location.href='cadastro.php'</script>";
    exit;
}

// Inserir novo usuário
$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('{$usuario}', '{$senha}')";

if ($conn->query($sql) === TRUE) {
    print "<script>alert('Cadastro realizado com sucesso!');</script>";
    print "<script>location.href='index.php'</script>";
} else {
    print "<script>alert('Erro ao cadastrar usuário!');</script>";
    print "<script>location.href='cadastro.php'</script>";
}
