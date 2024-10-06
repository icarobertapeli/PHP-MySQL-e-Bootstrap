<h2 class="text-center my-4 text-dark fw-bold" style="font-size: 1.5rem; animation: fadeIn 1s ease-in-out;">
    <i class="bi bi-pencil-square"></i> Editar Processo <!-- Título da seção de edição de processo com ícone -->
</h2>

<?php
// Consulta ao banco de dados para selecionar o processo com o ID especificado na URL
$sql = "SELECT * FROM processos WHERE id=" . $_REQUEST["id"];
$res = $conn->query($sql); // Executa a consulta no banco de dados
$row = $res->fetch_object(); // Obtém o resultado como um objeto
?>

<div class="container py-5">
    <div class="d-flex justify-content-center">
        <!-- Formulário para editar as informações do processo -->
        <form action="?page=salvar" method="POST" class="p-5 border rounded shadow-lg bg-gradient" style="max-width: 450px; width: 100%;">
            <input type="hidden" name="acao" value="editar"> <!-- Campo oculto para indicar a ação -->
            <input type="hidden" name="id" value="<?php print $row->id; ?>"> <!-- Campo oculto para o ID do processo -->

            <!-- Campo para número do processo -->
            <div class="mb-4">
                <label for="nprocesso" class="form-label">Número do Processo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" name="nprocesso" id="nprocesso" value="<?php print $row->nprocesso; ?>" class="form-control" placeholder="Digite o número do processo" required>
                </div>
            </div>

            <!-- Campo para nome da parte -->
            <div class="mb-4">
                <label for="nomeParte" class="form-label">Nome da Parte</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span> 
                    <input type="text" name="nomeParte" id="nomeParte" value="<?php print $row->nparte; ?>" class="form-control" placeholder="Digite o nome da parte" required>
                </div>
            </div>

            <!-- Campo para classe processual -->
            <div class="mb-4">
                <label for="classe" class="form-label">Classe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                    <input type="text" name="classe" id="classe" value="<?php print $row->classe; ?>" class="form-control" placeholder="Digite a classe processual" required>
                </div>
            </div>

            <!-- Campo para comarca -->
            <div class="mb-4">
                <label for="comarca" class="form-label">Comarca</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="comarca" id="comarca" value="<?php print $row->comarca; ?>" class="form-control" placeholder="Digite a comarca" required>
                </div>
            </div>

            <!-- Campo para CEP -->
            <div class="mb-4">
                <label for="cep" class="form-label">CEP</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" name="cep" id="cep" value="<?php print $row->cep; ?>" class="form-control" placeholder="Digite o CEP" required onblur="buscarCEP()">
                    <!-- Chama a função buscarCEP() ao perder o foco -->
                </div>
            </div>

            <!-- Campo para rua (somente leitura) -->
            <div class="mb-4">
                <label for="rua" class="form-label">Rua</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-signpost-split"></i></span>
                    <input type="text" name="rua" id="rua" value="<?php print $row->rua; ?>" class="form-control" placeholder="Rua" readonly required>
                </div>
            </div>

            <!-- Campo para cidade (somente leitura) -->
            <div class="mb-4">
                <label for="cidade" class="form-label">Cidade</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                    <input type="text" name="cidade" id="cidade" value="<?php print $row->cidade; ?>" class="form-control" placeholder="Cidade" readonly required>
                </div>
            </div>

            <!-- Botões de ação -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary shadow-sm"><i class="bi bi-send"></i> Atualizar</button>
                <button type="button" class="btn btn-secondary shadow-sm" onclick="location.href='?page=listar'"><i class="bi bi-arrow-left"></i> Voltar</button>
            </div>
        </form>
    </div>
</div>

<style>
    .bg-gradient {
        background: linear-gradient(135deg, #e3f2fd 0%, #90caf9 100%);
    }

    .input-group-text {
        background-color: #bbdefb;
        border: none;
    }

    form {
        animation: fadeIn 1s ease-in-out;
    }

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

<script>
    // Função para buscar dados de endereço pelo CEP
    function buscarCEP() {
        const cep = document.getElementById('cep').value; // Obtém o valor do campo CEP
        if (cep.length === 8) { // Verifica se o CEP possui 8 dígitos
            fetch(`https://viacep.com.br/ws/${cep}/json/`) // Faz a requisição à API do ViaCEP
                .then(response => response.json()) // Converte a resposta em JSON
                .then(data => {
                    if (!data.erro) { // Se o CEP não tiver erro
                        // Preenche os campos de rua e cidade com os dados retornados
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('cidade').value = data.localidade;
                    } else {
                        alert('CEP não encontrado!'); // Alerta se o CEP não for encontrado
                    }
                })
                .catch(() => alert('Erro ao buscar CEP!')); // Alerta em caso de erro na requisição
        } else {
            alert('CEP inválido!'); // Alerta se o CEP não tiver 8 dígitos
        }
    }
</script>
