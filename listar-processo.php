<h2 class="mt-5 text-center text-dark fw-bold" style="font-size: 1.5rem; animation: fadeIn 1s ease-in-out;"><i class="bi bi-archive-fill"></i> Processos Cadastrados</h2> <!-- Título da seção que exibe processos cadastrados, com um ícone ao lado -->

<?php
$sql = "SELECT * FROM processos"; // Consulta SQL para selecionar todos os registros da tabela 'processos'

$res = $conn->query($sql); // Executa a consulta e armazena o resultado
$qtd = $res->num_rows; // Obtém a quantidade de registros retornados

if ($qtd > 0) { // Verifica se há processos cadastrados
    print "<div class='table-responsive mt-4' style='animation: fadeIn 1s ease-in-out;'>"; // Início da div responsiva para a tabela com animação
    print "<table class='table table-hover table-striped table-bordered shadow-sm'>"; // Início da tabela com estilos do Bootstrap
    print "<thead class='table-primary'>"; // Cabeçalho da tabela
    print "<tr>"; // Início da linha do cabeçalho
    print "<th>ID</th>"; // Início das colunas
    print "<th>Número do Processo</th>";
    print "<th>Nome da parte</th>";
    print "<th>Classe do processo</th>";
    print "<th>Comarca</th>";
    print "<th>CEP</th>";
    print "<th>Rua</th>";
    print "<th>Cidade</th>";
    print "<th class='text-center'>Ações</th>"; 
    print "</tr>"; // Fim da linha do cabeçalho
    print "</thead>"; // Fim do cabeçalho da tabela
    print "<tbody>"; // Início do corpo da tabela

    while ($row = $res->fetch_object()) { // Loop para percorrer cada registro retornado
        print "<tr>"; // Início de uma nova linha para o registro
        print "<td>" . $row->id . "</td>"; // Início da exibição dos IDS
        print "<td>" . $row->nprocesso . "</td>";
        print "<td>" . $row->nparte . "</td>";
        print "<td>" . $row->classe . "</td>";
        print "<td>" . $row->comarca . "</td>";
        print "<td>" . $row->cep . "</td>";
        print "<td>" . $row->rua . "</td>";
        print "<td>" . $row->cidade . "</td>";
        print "<td class='text-center'> <!-- Célula para botões de ação, centralizados -->
                <button onclick=\"location.href='?page=editar&id=" . $row->id  . "';\" class='btn btn-success btn-sm mx-1'><i class='bi bi-pencil-fill'></i> Editar</button> <!-- Botão para editar o processo -->
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id  . "';}else{false;}\" class='btn btn-danger btn-sm mx-1'><i class='bi bi-trash-fill'></i> Excluir</button> <!-- Botão para excluir o processo, com confirmação -->
              </td>";
        print "</tr>"; // Fim da linha do registro
    }
    print "</tbody>"; // Fim do corpo da tabela
    print "</table>"; // Fim da tabela
    print "</div>"; // Fechando o div .table-responsive
} else { // Se não houver registros cadastrados
    print "<div class='alert alert-danger text-center mt-4' style='animation: fadeIn 1s ease-in-out;' role='alert'><i class='bi bi-exclamation-triangle-fill'></i> Não existem processos cadastrados!</div>"; // Mensagem de alerta informando que não há processos
}
?>

<style>
    @keyframes fadeIn { /* Define a animação fadeIn */
        from { /* Estado inicial da animação */
            opacity: 0; /* Totalmente invisível */
            transform: translateY(10px); /* Move o elemento para baixo */
        }
        to { /* Estado final da animação */
            opacity: 1; /* Totalmente visível */
            transform: translateY(0); /* Retorna à posição original */
        }
    }
</style>
