<?php
$pageTitle = "Listagem de autores";
$listTitle = "Autores";
$button = [
    "label" => "Novo autor",
    "to" => "/authors/new"
];

$authors = isset($authors) ? $authors : [];

include __DIR__ . "/../../Layout/list.php";
?>

<div class="table-container">
    <?php if (count($authors) === 0): ?>
        Nenhum autores encontrados.
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
                <?php foreach ($authors as $author) { ?>
                    <tr>
                        <td><?= $author->getId() ?></td>
                        <td><?= $author->getName() ?></td>
                        <td>
                            <div class="buttons">
                                <a href="/authors/edit?id=<?= $author->getId() ?>" class="button is-primary is-small">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span>Editar</span>
                                </a>
                                <form action="/authors/delete?id=<?= $author->getId() ?>" method="POST" style="display: inline;">
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