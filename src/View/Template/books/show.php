<?php
$pageTitle = "O Guia do Mochileiro das Galáxias";

if (!isset($book) || !isset($category) || !isset($author)) {
    header("Location: /books");
    exit();
}

include __DIR__ . "/../../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Detalhes do Livro</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <div class="buttons">
                <a href="/books/edit?id=<?= $book->getId() ?>" class="button is-primary">
                    <span class="icon">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span>Editar Livro</span>
                </a>
                <a href="/books" class="button is-light">
                    <span class="icon">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span>Voltar para a lista</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <div class="content">
            <h2 class="title is-4"><?= $book->getTitle() ?></h2>
            <h3 class="subtitle is-6 has-text-grey"><?= $author->getName() ?></h3>

            <hr>

            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label class="label">Autor:</label>
                        <p class="has-text-weight-normal"><?= $author->getName() ?></p>
                    </div>

                    <div class="field">
                        <label class="label">Categoria:</label>
                        <p class="has-text-weight-normal"><?= $category->getName() ?></p>
                    </div>

                    <div class="field">
                        <label class="label">Data de Publicação:</label>
                        <p class="has-text-weight-normal"><?= (new DateTime($book->getPublishedAt()))->format("d/m/Y") ?></p>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Descrição:</label>
                <p class="has-text-weight-normal"><?= $book->getDescription() ?></p>
            </div>
        </div>
    </div>
</div>