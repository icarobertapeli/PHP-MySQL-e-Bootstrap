<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        // Recebe os valores do formulário
        $nprocesso = $_POST["nprocesso"] ?? null; // Usando null coalescing
        $nparte = $_POST["nomeParte"] ?? null; // Corrigido para nomeParte
        $classe = $_POST["classe"] ?? null;
        $comarca = $_POST["comarca"] ?? null;
        $cep = $_POST["cep"] ?? null;
        $rua = $_POST["rua"] ?? null;
        $cidade = $_POST["cidade"] ?? null;

        // Verifica se todos os campos obrigatórios foram preenchidos
        if ($nprocesso && $nparte && $classe && $comarca && $cep && $rua && $cidade) {
            // Sanitizando os dados
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

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>
                            alert('Processo cadastrado com sucesso!');
                            window.location.href = '?page=listar';
                       </script>";
            } else {
                print "<script>
                            alert('Não foi possível cadastrar o processo!');
                            window.location.href = '?page=listar';
                       </script>";
            }
        } else {
            print "<script>
                        alert('Por favor, preencha todos os campos obrigatórios!');
                        window.location.href = '?page=listar';
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
                        WHERE id=" . (int)$_REQUEST["id"]; // É bom fazer cast para inteiro
        
                $res = $conn->query($sql);
        
                if ($res == true) {
                    print "<script>
                                alert('Processo alterado com sucesso!');
                                window.location.href = '?page=listar';
                           </script>";
                } else {
                    print "<script>
                                alert('Não foi possível alterar o processo!');
                                window.location.href = '?page=listar';
                           </script>";
                }
            } else {
                print "<script>
                            alert('O número do processo não pode estar vazio!');
                            window.location.href = '?page=listar';
                       </script>";
            }
            break;
//aaa        

    case 'excluir':
        $sql = "DELETE FROM processos WHERE id=" . $_REQUEST["id"];
        $res = $conn->query($sql); // Executa a query de exclusão

        if ($res == true) {
            print "<script>
                            alert('Processo excluído com sucesso!');
                            window.location.href = '?page=listar';
                       </script>";
        } else {
            print "<script>
                            alert('Não foi possível excluir o processo!');
                            window.location.href = '?page=listar';
                       </script>";
        }
        break;
}
