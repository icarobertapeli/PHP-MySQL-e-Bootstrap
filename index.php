<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Faça o Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Importa o CSS do Bootstrap para estilização -->
    <style>
        body {
            background-color: #f2f2f2;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-card {
            width: 100%; 
            max-width: 400px; 
        }
    </style>
</head>

<body>
    <div class="login-card"> <!-- Contêiner para o cartão de login -->
        <div class="card"> <!-- Cria o cartão de login -->
            <div class="card-body"> <!-- Contêiner para o corpo do cartão -->
                <div class="text-center"> <!-- Centraliza o conteúdo dentro da div -->
                    <h3> Acesso restrito 
                        <svg xmlns="http://www.w3.org/2000/svg" width="10%" height="10%" fill="currentColor" class="bi bi-file-lock2" viewBox="0 0 16 16"> <!-- Ícone de bloqueio -->
                            <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1m2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224" /> <!-- Desenha a parte superior do ícone -->
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" /> <!-- Desenha a parte inferior do ícone -->
                        </svg>
                    </h3>
                </div>
                <form action="login.php" method="POST"> <!-- Formulário que envia os dados para login.php via POST -->
                    <div class="mb-3">
                        <label> Usuário </label>
                        <input type="text" name="usuario" class="form-control" placeholder="Digite o usuário" required>
                    </div>
                    <div class="mb-3">
                        <label> Senha </label>
                        <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required>
                    </div>
                    <div class="mb-3"> 
                        <button type="submit" class="btn btn-success w-100">Enviar</button> 
                    </div>
                </form>
                <div> <!-- Div para o botão de cadastro -->
                    <button class="btn btn-primary w-100" onclick="window.location.href='telacadastro.php';">Cadastre-se</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
