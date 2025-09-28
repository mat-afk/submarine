<?php
$pageTitle = "Listagem de livros";
$listTitle = "Livros";
$button = [
    "label" => "Novo livro",
    "to" => "/books/new"
];

$items = isset($items) ? $items : [];

$authorId = $_GET["author_id"] ?? null;
$categoryId = $_GET["category_id"] ?? null;

$filter = [
    "author_id" => (int) $authorId,
    "category_id" => (int) $categoryId,
    "min_rating" => $_GET["min_rating"] ?? 0,
    "max_rating" => $_GET["max_rating"] ?? 5,
];

include __DIR__ . "/../../Layout/list.php";
?>

<div class="card mb-5">
    <div class="card-content">
        <h5 class="title is-5">Filtros</h5>
        <form action="/books" method="GET">
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label for="author_id" class="label">Autor</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="author_id" id="author_id">
                                    <option value="" <?= $filter['author_id'] === null ? 'selected' : '' ?>>Selecione uma opção</option>

                                    <?php foreach ($authors as $author) { ?>
                                        <option <?= $filter['author_id'] === $author->getId() ? 'selected' : '' ?> value="<?= $author->getId() ?>">
                                            <?= $author->getName() ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="field">
                        <label for="category_id" class="label">Categoria</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="category_id" id="category_id">
                                    <option value="" <?= $filter['category_id'] === null ? 'selected' : '' ?>>Selecione uma opção</option>

                                    <?php foreach ($categories as $category) { ?>
                                        <option <?= $filter['category_id'] === $category->getId() ? 'selected' : '' ?> value="<?= $category->getId() ?>">
                                            <?= $category->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="min_rating" class="label">Avaliação mínima</label>
                        <div class="control">
                            <input type="number" class="input" id="min_rating" name="min_rating" min="0" max="5" step="1" value="<?= $filter["min_rating"] ?>">
                        </div>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="max_rating" class="label">Avaliação máxima</label>
                        <div class="control">
                            <input type="number" class="input" id="max_rating" name="max_rating" min="0" max="5" step="1" value="<?= $filter["max_rating"] ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button type="submit" class="button is-primary">Aplicar Filtros</button>
                </div>
                <div class="control">
                    <a href="/books" class="button is-light">Limpar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-container">
    <?php if (count($items) === 0): ?>
        <p>Nenhum livro encontrado.</p>
    <?php else: ?>
        <table class="table is-fullwidth is-striped is-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Data de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><?= $item["book"]->getId() ?></td>
                        <td><?= $item["book"]->getTitle() ?></td>
                        <td><?= $item["author"]->getName() ?></td>
                        <td><?= $item["category"]->getName() ?></td>
                        <td><?= (new DateTime($item["book"]->getPublishedAt()))->format("d/m/Y") ?></td>
                        <td>
                            <div class="buttons">
                                <a href="/books/show?id=<?= $item["book"]->getId() ?>" class="button is-info is-small">
                                    <span class="icon">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span>Detalhes</span>
                                </a>
                                <a href="/books/edit?id=<?= $item["book"]->getId() ?>" class="button is-primary is-small">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span>Editar</span>
                                </a>
                                <form action="/books/delete?id=<?= $item["book"]->getId() ?>" method="POST" style="margin: 0px;">
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