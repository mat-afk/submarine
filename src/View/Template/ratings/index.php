<?php
$pageTitle = "Listagem de avaliações";
$listTitle = "Avaliações";
$button = [
        "label" => "Avaliar livro",
        "to" => "/ratings/new"
];

include __DIR__ . "/../../Layout/list.php";
?>

<div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable">
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
            <td>
                <div class="field">
                    <div class="control">
                        <div class="tags has-addons">
                                <span class="tag is-warning">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                    </span>
                                </span>
                            <span class="tag is-light">4/5</span>
                        </div>
                    </div>
                </div>
            </td>
            <td>Sim</td>
            <td>
                <?php if (true): ?>
                    <a href="/ratings/edit?id=1" class="button is-primary is-small">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        <span>Editar</span>
                    </a>
                <?php else: ?>
                    <span class="has-text-grey">Nenhuma ação</span>
                <?php endif ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>