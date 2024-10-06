<h2 class="text-center my-4 text-dark fw-bold" style="font-size: 1.5rem; animation: fadeIn 1s ease-in-out;">
    <i class="bi bi-pencil-square"></i> Editar Processo
</h2>

<?php
$sql = "SELECT * FROM processos WHERE id=" . $_REQUEST["id"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<div class="container py-5">
    <div class="d-flex justify-content-center">
        <form action="?page=salvar" method="POST" class="p-5 border rounded shadow-lg bg-gradient" style="max-width: 450px; width: 100%;">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $row->id; ?>">

            <div class="mb-4">
                <label for="nprocesso" class="form-label">Número do Processo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hash"></i></span>
                    <input type="text" name="nprocesso" id="nprocesso" value="<?php print $row->nprocesso; ?>" class="form-control" placeholder="Digite o número do processo" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="nomeParte" class="form-label">Nome da Parte</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="nomeParte" id="nomeParte" value="<?php print $row->nparte; ?>" class="form-control" placeholder="Digite o nome da parte" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="classe" class="form-label">Classe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                    <input type="text" name="classe" id="classe" value="<?php print $row->classe; ?>" class="form-control" placeholder="Digite a classe processual" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="comarca" class="form-label">Comarca</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="comarca" id="comarca" value="<?php print $row->comarca; ?>" class="form-control" placeholder="Digite a comarca" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="cep" class="form-label">CEP</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" name="cep" id="cep" value="<?php print $row->cep; ?>" class="form-control" placeholder="Digite o CEP" required onblur="buscarCEP()">
                </div>
            </div>

            <div class="mb-4">
                <label for="rua" class="form-label">Rua</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-signpost-split"></i></span>
                    <input type="text" name="rua" id="rua" value="<?php print $row->rua; ?>" class="form-control" placeholder="Rua" readonly required>
                </div>
            </div>

            <div class="mb-4">
                <label for="cidade" class="form-label">Cidade</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                    <input type="text" name="cidade" id="cidade" value="<?php print $row->cidade; ?>" class="form-control" placeholder="Cidade" readonly required>
                </div>
            </div>

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
    function buscarCEP() {
        const cep = document.getElementById('cep').value;
        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('cidade').value = data.localidade;
                    } else {
                        alert('CEP não encontrado!');
                    }
                })
                .catch(() => alert('Erro ao buscar CEP!'));
        } else {
            alert('CEP inválido!');
        }
    }
</script>
