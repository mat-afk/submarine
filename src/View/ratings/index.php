<?php
$pageTitle = "Listagem de avaliações";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Avaliações</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a class="button is-success" href="/ratings/new">
                <span class="icon">
                    <i class="fas fa-star"></i>
                </span>
                <span>Avaliar livro</span>
            </a>
        </div>
    </div>
</div>

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
                <?php if (false): ?>
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