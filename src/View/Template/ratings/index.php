<?php
$pageTitle = "Listagem de avaliações";
$listTitle = "Avaliações";
$button = [
    "label" => "Avaliar livro",
    "to" => "/ratings/new"
];

$items = isset($items) ? $items : [];

include __DIR__ . "/../../Layout/list.php";
?>

<div class="table-container">
    <?php if (count($items) === 0): ?>
        <p>Nenhuma avaliação encontrada.</p>
    <?php else: ?>
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
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?= $item["rating"]->getId() ?></td>
                        <td><?= $item["user"]->getName() ?></td>
                        <td><?= $item["book"]->getTitle() ?></td>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag is-warning">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </span>
                                        <span class="tag is-light"><?= $item["rating"]->getStars() ?>/5</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if (strlen($item["rating"]->getComment()) === 0): ?>
                                <p class="has-text-grey-light">Nenhum</p>
                            <?php else: ?>
                                <?= $item["rating"]->getComment() ?>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($item["user"]->getId() === $_SESSION["user_id"]): ?>
                                <div class="buttons">
                                    <a href="/ratings/edit?id=<?= $item["rating"]->getId() ?>" class="button is-primary is-small">
                                        <span class="icon">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span>Editar</span>
                                    </a>
                                    <form action="/ratings/delete?id=<?= $item["rating"]->getId() ?>" method="POST">
                                        <button type="submit" class="button is-danger is-small">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span>Excluir</span>
                                        </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <span class="has-text-grey">Nenhuma ação</span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php endif ?>
</div>