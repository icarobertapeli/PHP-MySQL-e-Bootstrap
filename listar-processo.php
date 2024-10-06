<h2 class="mt-5 text-center text-dark fw-bold" style="font-size: 1.5rem; animation: fadeIn 1s ease-in-out;"><i class="bi bi-archive-fill"></i> Processos Cadastrados</h2>
<?php
$sql = "SELECT * FROM processos";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<div class='table-responsive mt-4' style='animation: fadeIn 1s ease-in-out;'>";
    print "<table class='table table-hover table-striped table-bordered shadow-sm'>";
    print "<thead class='table-primary'>";
    print "<tr>";
    print "<th>ID</th>";
    print "<th>Número do Processo</th>";
    print "<th>Nome da parte</th>";
    print "<th>Classe do processo</th>";
    print "<th>Comarca</th>";
    print "<th>CEP</th>";
    print "<th>Rua</th>";
    print "<th>Cidade</th>";
    print "<th class='text-center'>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nprocesso . "</td>";
        print "<td>" . $row->nparte . "</td>";
        print "<td>" . $row->classe . "</td>";
        print "<td>" . $row->comarca . "</td>";
        print "<td>" . $row->cep . "</td>";
        print "<td>" . $row->rua . "</td>";
        print "<td>" . $row->cidade . "</td>";
        print "<td class='text-center'>
                <button onclick=\"location.href='?page=editar&id=" . $row->id  . "';\" class='btn btn-success btn-sm mx-1'><i class='bi bi-pencil-fill'></i> Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id  . "';}else{false;}\" class='btn btn-danger btn-sm mx-1'><i class='bi bi-trash-fill'></i> Excluir</button>
              </td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
    print "</div>"; // Fechando o div .table-responsive
} else {
    print "<div class='alert alert-danger text-center mt-4' style='animation: fadeIn 1s ease-in-out;' role='alert'><i class='bi bi-exclamation-triangle-fill'></i> Não existem processos cadastrados!</div>";
}
?>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
