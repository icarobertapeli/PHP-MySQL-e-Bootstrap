<div class="container py-5"> <!-- Contêiner principal com padding vertical -->
    <h2 class="text-center mb-4 fw-bold text-dark" style="font-size: 1.8rem; animation: fadeIn 1s ease-in-out;">
        <i class="bi bi-file-earmark-text-fill"></i> Cadastro de Processos <!-- Título da seção com ícone -->
    </h2>
    
    <div class="d-flex justify-content-center"> <!-- Centraliza o formulário na página -->
        <form action="?page=salvar" method="POST" class="p-5 border rounded shadow-lg bg-gradient" style="max-width: 450px; width: 100%;">
            <input type="hidden" name="acao" value="cadastrar"> <!-- Campo oculto para identificar a ação -->

            <div class="mb-4">
                <label for="nprocesso" class="form-label">Número do Processo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" name="nprocesso" id="nprocesso" class="form-control" placeholder="Digite o número do processo" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="nomeParte" class="form-label">Nome da Parte</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="nomeParte" id="nomeParte" class="form-control" placeholder="Digite o nome da parte" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="classe" class="form-label">Classe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                    <input type="text" name="classe" id="classe" class="form-control" placeholder="Digite a classe processual" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="comarca" class="form-label">Comarca</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="comarca" id="comarca" class="form-control" placeholder="Digite a comarca" required>
                </div>
            </div>

            <!-- Campo para CEP -->
            <div class="mb-4">
                <label for="cep" class="form-label">CEP</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite o CEP" required onblur="buscarCEP()">
                    <!-- O evento onblur chama a função buscarCEP() ao sair do campo -->
                </div>
            </div>

            <!-- Campo para Rua (preenchido pela API) -->
            <div class="mb-4">
                <label for="rua" class="form-label">Rua</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-signpost-split"></i></span>
                    <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" readonly required>
                </div>
            </div>

            <!-- Campo para Cidade (preenchido pela API) -->
            <div class="mb-4">
                <label for="cidade" class="form-label">Cidade</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" readonly required>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary shadow-sm"><i class="bi bi-send"></i> Enviar</button>
                <button type="button" class="btn btn-secondary shadow-sm" onclick="location.href='?page=dashboard'"><i class="bi bi-arrow-left"></i> Voltar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function buscarCEP() { // Função para buscar o endereço a partir do CEP
        const cep = document.getElementById('cep').value; // Obtém o valor do campo CEP
        if (cep.length === 8) { // Verifica se o CEP tem 8 caracteres
            fetch(`https://viacep.com.br/ws/${cep}/json/`) // Faz a requisição para a API de CEP
                .then(response => response.json()) // Converte a resposta em JSON
                .then(data => {
                    if (!data.erro) { // Verifica se o CEP retornou um erro
                        document.getElementById('rua').value = data.logradouro; // Preenche o campo Rua
                        document.getElementById('cidade').value = data.localidade; // Preenche o campo Cidade
                    } else {
                        alert('CEP não encontrado!'); // Exibe alerta se o CEP não foi encontrado
                    }
                })
                .catch(() => alert('Erro ao buscar CEP!')); // Exibe alerta em caso de erro na requisição
        } else {
            alert('CEP inválido!'); // Exibe alerta se o CEP não é válido
        }
    }
</script>

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
