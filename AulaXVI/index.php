<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atividade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="d-flex">
        <h1 class="mx-auto my-5">Gerenciando Colaboradores</h1>
    </header>
    <div class="container">
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cadastroFormModal">
            Cadastrar novo colaborador
        </button>
    </div>

    <div class="modal fade" id="cadastroFormModal" tabindex="-1" aria-labelledby="cadastroFormModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroFormModalLabel">Cadastrando colaboradores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                </div>

                <div class="modal-body">
                    <form id="modalForm" action="inserir.php" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" name="telefone" placeholder="Digite seu telefone">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço">
                        </div>
                        <div class="form-group">
                            <label for="experiencia">Experiência</label>
                            <input type="number" class="form-control" name="experiencia"
                                placeholder="Digite seus anos de experiência">
                        </div>
                        <div class="form-group">
                            <label for="salario">Salário</label>
                            <input type="number" class="form-control" name="salario" placeholder="Digite seu salário">
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="modalForm">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'db.php';

    $sql = 'SELECT * FROM Colaboradores';
    $stmt = $pdo->query($sql);
    $colaboradores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table table-bordered table-hover table-striped mt-5">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Endereço</td>
                <td>Experiência</td>
                <td>Salário</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colaboradores as $colaborador): ?>
                <tr>
                    <td><?= $colaborador['nome'] ?></td>
                    <td><?= $colaborador['numero_telefone'] ?></td>
                    <td><?= $colaborador['endereco'] ?></td>
                    <td><?= $colaborador['anos_experiencia'] ?></td>
                    <td><?= $colaborador['salario'] ?></td>
                    <td>
                        <button class="rounded bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#alterarFormModal" id="alterarBotao" data-id="<?= $colaborador['id'] ?>"
                            data-nome="<?= htmlspecialchars($colaborador['nome']) ?>"
                            data-telefone="<?= htmlspecialchars($colaborador['numero_telefone']) ?>"
                            data-endereco="<?= htmlspecialchars($colaborador['endereco']) ?>"
                            data-experiencia="<?= htmlspecialchars($colaborador['anos_experiencia']) ?>"
                            data-salario="<?= htmlspecialchars($colaborador['salario']) ?>"></button>

                        <form action="deletar.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $colaborador['id'] ?>">
                            <button type="submit" class="rounded bi bi-x-circle" onclick="return confirm('Tem certeza que deseja deletar este registro?')"></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="modal fade" id="alterarFormModal" tabindex="-1" aria-labelledby="alterarFormModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alterarFormModalLabel">Alterando colaboradores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                </div>

                <div class="modal-body">
                    <form action="alterar.php" method="POST" id="alterarModalForm">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" name="telefone" placeholder="Digite seu telefone">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço">
                        </div>
                        <div class="form-group">
                            <label for="experiencia">Experiência</label>
                            <input type="number" class="form-control" name="experiencia"
                                placeholder="Digite seus anos de experiência">
                        </div>
                        <div class="form-group">
                            <label for="salario">Salário</label>
                            <input type="number" class="form-control" name="salario" placeholder="Digite seu salário">
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="alterarModalForm">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {
            $("form .form-group").addClass("mt-2");

            $("#alterarFormModal").on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);

                var id = button.data('id');
                var nome = button.data('nome');
                var telefone = button.data('telefone');
                var endereco = button.data('endereco');
                var experiencia = button.data('experiencia');
                var salario = button.data('salario');
                console.log(id);

                $("#alterarFormModal input[name='id']").val(id);
                $("#alterarFormModal input[name='nome']").val(nome);
                $("#alterarFormModal input[name='telefone']").val(telefone);
                $("#alterarFormModal input[name='endereco']").val(endereco);
                $("#alterarFormModal input[name='experiencia']").val(experiencia);
                $("#alterarFormModal input[name='salario']").val(salario);
            })
        })
    </script>
</body>

</html>
