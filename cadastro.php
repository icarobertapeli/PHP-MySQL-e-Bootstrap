<?php
// Inicia a sessão do usuário
session_start();

// Verifica se o formulário foi enviado e se os campos 'usuario' e 'senha' não estão vazios
if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
    // Exibe um alerta se algum campo estiver vazio
    print "<script>alert('Preencha todos os campos!');</script>";
    // Redireciona para a página de cadastro
    print "<script>location.href='cadastro.php'</script>";
    exit; // Interrompe a execução do script
}

// Inclui o arquivo de configuração que contém informações de conexão ao banco de dados
include('config.php');

// Obtém os valores do formulário
$usuario = $_POST["usuario"];
$senha = ($_POST["senha"]);

// Verifica se o usuário já existe no banco de dados
$sqlCheck = "SELECT * FROM usuarios WHERE usuario = '{$usuario}'";
$resCheck = $conn->query($sqlCheck) or die($conn->error); // Executa a consulta e trata possíveis erros

// Se o usuário já estiver cadastrado
if ($resCheck->num_rows > 0) {
    // Exibe um alerta informando que o usuário já existe
    print "<script>alert('Usuário já cadastrado!');</script>";
    // Redireciona de volta para a página de cadastro
    print "<script>location.href='cadastro.php'</script>";
    exit; // Interrompe a execução do script
}

// Prepara a consulta SQL para inserir um novo usuário
$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('{$usuario}', '{$senha}')";

// Executa a consulta de inserção
if ($conn->query($sql) === TRUE) {
    // Exibe um alerta informando que o cadastro foi realizado com sucesso
    print "<script>alert('Cadastro realizado com sucesso!');</script>";
    // Redireciona para a página inicial
    print "<script>location.href='index.php'</script>";
} else {
    // Exibe um alerta informando que ocorreu um erro ao cadastrar o usuário
    print "<script>alert('Erro ao cadastrar usuário!');</script>";
    // Redireciona de volta para a página de cadastro
    print "<script>location.href='cadastro.php'</script>";
}
?>
