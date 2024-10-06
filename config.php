<?php
// Define constantes para as configurações de conexão ao banco de dados
define('HOST', 'localhost'); // Endereço do servidor MySQL (localhost indica que está na mesma máquina)
define('USER', 'root');      // Nome de usuário para acessar o banco de dados
define('PASS', '');          // Senha para o usuário (vazia, no caso do usuário 'root')
define('BASE', 'advogados'); // Nome do banco de dados a ser utilizado

// Cria uma nova conexão MySQLi com os parâmetros definidos acima
$conn = new MySQLi(HOST, USER, PASS, BASE);
?>
