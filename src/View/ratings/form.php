<?php
$baseUrl = "/ratings";

$books = [
    [
      "id" => 1,
      "title" => "O Guia do Mochileiro das Galáxias"
    ]
];

$form = [
    "book" => isset($state) ? $state["book"] : "",
    "stars" => isset($state) ? $state["stars"] : "",
    "comment" => isset($state) ? $state["comment"] : "",
];

include __DIR__ . "/../Layout/common_form.php";
?>

<form action="#" method="POST">
    <div class="field">
        <label for="book" class="label">Livro</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="book" id="book">
                    <?php foreach ($books as $book) { ?>
                        <option <?php echo $form['book'] === $book['id'] ? 'selected' : '' ?>>
                            <?php echo $book["title"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="stars" class="label">Estrelas</label>
        <div class="control">
            <input type="number" class="input" id="stars" name="stars" min="1" max="5" step="0.5" value="<?php echo $form['stars']; ?>" required>
        </div>
        <p class="help">Avalie de 1 a 5 estrelas</p>
    </div>

    <div class="field">
        <label for="comment" class="label">Comentário</label>
        <div class="control">
            <textarea class="textarea" id="comment" name="comment" rows="4" placeholder="Deixe seu comentário sobre o livro...">
                <?php echo $form["comment"]; ?>
            </textarea>
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