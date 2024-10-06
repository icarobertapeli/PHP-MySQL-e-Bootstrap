<?php
session_start(); // Inicia a sessão para gerenciar informações do usuário

// Verifica se o formulário foi enviado e se os campos 'usuario' e 'senha' não estão vazios
if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
    // Redireciona para a página de login se os campos estiverem vazios
    print "<script>location.href='index.php'</script>";
}

// Inclui o arquivo de configuração que contém as credenciais de conexão com o banco de dados
include('config.php');

$usuario = $_POST["usuario"]; // Armazena o nome de usuário enviado pelo formulário
$senha = $_POST["senha"]; // Armazena a senha enviada pelo formulário

// Prepara a consulta SQL para verificar se existe um usuário com as credenciais fornecidas
$sql = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";

// Executa a consulta e armazena o resultado; em caso de erro, exibe a mensagem de erro
$res = $conn->query($sql) or die($conn->error);

// Obtém a linha resultante da consulta como um objeto
$row = $res->fetch_object();

// Armazena a quantidade de resultados retornados pela consulta
$qtd = $res->num_rows;

// Verifica se o usuário foi encontrado
if ($qtd > 0) {
    // Armazena informações do usuário na sessão
    $_SESSION["usuario"] = $usuario;
    $_SESSION["nome"] = $row->nome;
    $_SESSION["tipo"] = $row->tipo; // Tipo de usuário (isso aqui pode ser adicionado futuramente, como admin etc.)
    
    // Redireciona para o dashboard se o login for bem-sucedido
    print "<script> location.href='dashboard.php'; </script>";
} else {
    // Exibe um alerta se o usuário ou a senha estiverem incorretos
    print "<script> alert('Usuário e/ou senha incorretos');</script>";
    // Redireciona de volta para a página de login
    print "<script> location.href='index.php'; </script>";
}
?>
