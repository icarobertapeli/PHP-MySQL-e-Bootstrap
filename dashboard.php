<?php
include("config.php"); // precisa mesmo disso? 
session_start();
if (empty($_SESSION)) {
    print "<script> location.href='index.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .sistema-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }
        .sistema-header i {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <?php
                print "Seja bem-vindo(a) de novo, " . $_SESSION["usuario"];
                print "<a href='logout.php' class='btn btn-danger'> Sair </a>";
                ?>
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="btn btn-outline-success me-2" href="?page=novo">Cadastre Processos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-success me-2" aria-current="page" href="?page=listar">Lista de Processos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="sistema-header">
            <h4><i class="fas fa-gavel"></i> Sistema de Gerenciamento de Processos Judiciais</h4>
            <p>Construído com <strong>PHP</strong>, <strong>MySQL</strong> e <strong>Bootstrap</strong></p>
            <p>Desenvolvido por <strong>Ícaro Bertapeli Carneiro entre os dias 5 e 6 de outubro de 2024 </strong> para participação no processo seletivo de estagiário na <strong>Fausoft Engenharia de Software</strong></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                switch (@$_REQUEST["page"]) {
                    case "novo":
                        include("novo-processo.php");
                        break;
                    case "salvar":
                        include("salvar-processo.php");
                        break;
                    case "listar":
                        include("listar-processo.php");
                        break;
                    case "editar":
                        include("editar-processo.php");
                }
                ?>
            </div>
        </div>
    </div>
    

</body>

</html>
