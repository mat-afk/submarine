<?php
$pageTitle = "Listagem de avaliações";

include __DIR__ . "/../Layout/default.php";
?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Avaliações</h1>
    <a class="btn btn-success" href="/ratings/new">Avaliar livro</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Usuário</th>
            <th>Livro</th>
            <th>Estrelas</th>
            <th>Comentário</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Mateus</td>
            <td>O Guia do Mochileiro das Galáxias</td>
            <td>4/5</td>
            <td>Sim</td>
            <td>
                <?php if (false): ?>
                    <a href="/ratings/edit?id=1" class="btn btn-primary btn-sm">Editar</a>
                <?php else: ?>
                    <span class="text-secondary">Nenhuma ação</span>
                <?php endif ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>