<?php
session_start(); // Inicia a sessão para permitir o gerenciamento de dados da sessão

// Remove as variáveis da sessão
unset($_SESSION["usuario"]); 
unset($_SESSION["nome"]);
unset($_SESSION["tipo"]);

session_destroy(); // Destroi a sessão, removendo todos os dados da sessão

header("Location: index.php"); // Redireciona para a página de login após o logout
?>
