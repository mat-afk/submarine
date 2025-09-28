<?php
$baseUrl = "/ratings";

$books = isset($books) ? $books : [];

$form = [
    "book_id" => isset($state) ? $state->getBookId() : 0,
    "stars" => isset($state) ? $state->getStars() : "",
    "comment" => isset($state) ? $state->getComment() : "",
];

$action = isset($state) ? "/ratings/edit?id={$state->getId()}" : "/ratings/new";

include __DIR__ . "/../../Layout/common-form.php";
?>

<form action="<?= $action ?>" method="POST">
    <div class="field">
        <label for="book_id" class="label">Livro</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="book_id" id="book_id">
                    <?php foreach ($books as $book) { ?>
                        <option <?= $form['book_id'] === $book->getId() ? 'selected' : '' ?> value="<?= $book->getId() ?>"><?= $book->getTitle() ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="stars" class="label">Estrelas</label>
        <div class="control">
            <input type="number" class="input" id="stars" name="stars" min="1" max="5" step="1" value="<?= $form['stars'] ?>" required>
        </div>
        <p class="help">Avalie de 1 a 5 estrelas</p>
    </div>

    <div class="field">
        <label for="comment" class="label">Comentário</label>
        <div class="control">
            <textarea class="textarea" id="comment" name="comment" rows="4" placeholder="Deixe seu comentário sobre o livro..."><?= $form["comment"] ?></textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-success">
                <span class="icon">
                    <i class="fas fa-star"></i>
                </span>
                <span>Salvar</span>
            </button>
        </div>
    </div>
</form>