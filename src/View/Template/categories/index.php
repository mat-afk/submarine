<?php
$pageTitle = "Listagem de categorias";
$listTitle = "Categorias";
$button = [
    "label" => "Nova categoria",
    "to" => "/categories/new"
];

$categories = isset($categories) ? $categories : [];

include __DIR__ . "/../../Layout/list.php";
?>

<div class="table-container">
    <?php if (count($categories) === 0): ?>
        <p>Nenhuma categoria encontrada.</p>
    <?php else: ?>
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td>
                            <?= $category->getId() ?>
                        </td>
                        <td>
                            <?= $category->getName() ?>
                        </td>
                        <td>
                            <div class="buttons">
                                <a href="/categories/edit?id=<?= $category->getId() ?>" class="button is-primary is-small">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span>Editar</span>
                                </a>
                                <form action="/categories/delete?id=<?= $category->getId() ?>" method="POST" style="display: inline;">
                                    <button type="submit" class="button is-danger is-small">
                                        <span class="icon">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span>Excluir</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php endif ?>
</div>