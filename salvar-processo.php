<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        // Recebe os valores do formulário
        $nprocesso = $_POST["nprocesso"] ?? null; 
        $nparte = $_POST["nomeParte"] ?? null;
        $classe = $_POST["classe"] ?? null; 
        $comarca = $_POST["comarca"] ?? null; 
        $cep = $_POST["cep"] ?? null; 
        $rua = $_POST["rua"] ?? null; 
        $cidade = $_POST["cidade"] ?? null; 

        // Verifica se todos os campos obrigatórios foram preenchidos
        if ($nprocesso && $nparte && $classe && $comarca && $cep && $rua && $cidade) {
            // Sanitizando os dados para prevenir SQL Injection
            $nprocesso = $conn->real_escape_string($nprocesso);
            $nparte = $conn->real_escape_string($nparte);
            $classe = $conn->real_escape_string($classe);
            $comarca = $conn->real_escape_string($comarca);
            $cep = $conn->real_escape_string($cep);
            $rua = $conn->real_escape_string($rua);
            $cidade = $conn->real_escape_string($cidade);

            // SQL de inserção
            $sql = "INSERT INTO processos (nprocesso, nparte, classe, comarca, cep, rua, cidade) 
                    VALUES ('{$nprocesso}', '{$nparte}', '{$classe}', '{$comarca}', '{$cep}', '{$rua}', '{$cidade}')";

            $res = $conn->query($sql); // Executa a query de inserção

            if ($res == true) { // Verifica se a inserção foi bem-sucedida
                print "<script>
                            alert('Processo cadastrado com sucesso!'); // Alerta de sucesso
                            window.location.href = '?page=listar'; // Redireciona para a lista de processos
                       </script>";
            } else {
                print "<script>
                            alert('Não foi possível cadastrar o processo!'); // Alerta de erro
                            window.location.href = '?page=listar'; // Redireciona para a lista de processos
                       </script>";
            }
        } else {
            print "<script>
                        alert('Por favor, preencha todos os campos obrigatórios!'); // Alerta se campos obrigatórios não foram preenchidos
                        window.location.href = '?page=listar'; // Redireciona para a lista de processos
                   </script>";
        }
        break;

    case 'editar':
        // Recebe os valores do formulário
        $nprocesso = $_POST["nprocesso"] ?? null; 
        $nparte = $_POST["nomeParte"] ?? null; 
        $classe = $_POST["classe"] ?? null; 
        $comarca = $_POST["comarca"] ?? null; 
        $cep = $_POST["cep"] ?? null; 
        $rua = $_POST["rua"] ?? null; 
        $cidade = $_POST["cidade"] ?? null;

        // Verifica se o número do processo foi preenchido corretamente
        if (!empty($nprocesso)) {
            // Atualiza o processo
            $sql = "UPDATE processos SET
                        nprocesso='{$nprocesso}',
                        nparte='{$nparte}',
                        classe='{$classe}',
                        comarca='{$comarca}',
                        cep='{$cep}',
                        rua='{$rua}',
                        cidade='{$cidade}'
                    WHERE id=" . (int)$_REQUEST["id"]; // É bom fazer cast para inteiro para evitar injeção de SQL

            $res = $conn->query($sql); // Executa a query de atualização

            if ($res == true) { // Verifica se a atualização foi bem-sucedida
                print "<script>
                            alert('Processo alterado com sucesso!'); // Alerta de sucesso
                            window.location.href = '?page=listar'; // Redireciona para a lista de processos
                       </script>";
            } else {
                print "<script>
                            alert('Não foi possível alterar o processo!'); // Alerta de erro
                            window.location.href = '?page=listar'; // Redireciona para a lista de processos
                       </script>";
            }
        } else {
            print "<script>
                        alert('O número do processo não pode estar vazio!'); // Alerta se o número do processo não for preenchido
                        window.location.href = '?page=listar'; // Redireciona para a lista de processos
                   </script>";
        }
        break;

    case 'excluir':
        // Executa a query de exclusão
        $sql = "DELETE FROM processos WHERE id=" . $_REQUEST["id"];
        $res = $conn->query($sql); 

        if ($res == true) { // Verifica se a exclusão foi bem-sucedida
            print "<script>
                        alert('Processo excluído com sucesso!'); // Alerta de sucesso
                        window.location.href = '?page=listar'; // Redireciona para a lista de processos
                   </script>";
        } else {
            print "<script>
                        alert('Não foi possível excluir o processo!'); // Alerta de erro
                        window.location.href = '?page=listar'; // Redireciona para a lista de processos
                   </script>";
        }
        break;
}
