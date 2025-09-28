<?php
$baseUrl = "/books";

$authors = isset($authors) ? $authors : [];
$categories = isset($categories) ? $categories : [];

$form = [
    "title" => isset($state) ? $state->getTitle() : "",
    "description" => isset($state) ? $state->getDescription() : "",
    "author_id" => isset($state) ? $state->getAuthorId() : 0,
    "category_id" => isset($state) ? $state->getCategoryId() : 0,
    "published_at" => isset($state) ? $state->getPublishedAt() : date("Y-m-d"),
];

$action = isset($state) ? "/books/edit?id={$state->getId()}" : "/books/new";

include __DIR__ . "/../../Layout/common-form.php";
?>

<form action="<?= $action ?>" method="POST">
    <div class="field">
        <label for="title" class="label">Título</label>
        <div class="control">
            <input type="text" class="input" id="title" name="title" value="<?= $form['title'] ?>" required>
        </div>
    </div>

    <div class="field">
        <label for="description" class="label">Descrição</label>
        <div class="control">
            <textarea class="textarea" id="description" name="description" rows="4"><?= $form["description"] ?></textarea>
        </div>
    </div>

    <div class="field">
        <label for="author_id" class="label">Autor</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="author_id" id="author_id">
                    <?php foreach ($authors as $author) { ?>
                        <option <?= $form['author_id'] === $author->getId() ? 'selected' : '' ?> value="<?= $author->getId() ?>">
                            <?= $author->getName() ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="category_id" class="label">Categoria</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="category_id" id="category_id">
                    <?php foreach ($categories as $category) { ?>
                        <option <?= $form['category_id'] === $category->getId() ? 'selected' : '' ?> value="<?= $category->getId() ?>">
                            <?= $category->getName(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class=" field">
        <label for="published_at" class="label">Data de Publicação</label>
        <div class="control">
            <input type="date" class="input" id="published_at" name="published_at" value="<?= $form['published_at'] ?>" required>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-success">
                <span class="icon">
                    <i class="fas fa-save"></i>
                </span>
                <span>Salvar</span>
            </button>
        </div>
    </div>
</form>