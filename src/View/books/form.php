<?php
$baseUrl = "/books";

$authors = [
    [
      "id" => 1,
      "name" => "Giuliano da Empoli"
    ],
    [
        "id" => 2,
        "name" => "Zygmunt Bauman"
    ]
];

$categories = [
    [
        "id" => 1,
        "name" => "Fantasia"
    ],
    [
        "id" => 2,
        "name" => "Ficção científica"
    ]
];

$form = [
    "title" => isset($state) ? $state["title"] : "",
    "description" => isset($state) ? $state["description"] : "",
    "author" => isset($state) ? $state["author"] : 0,
    "category" => isset($state) ? $state["category"] : 0,
    "publish_date" => isset($state) ? $state["publish_date"] : date("Y-m-d"),
];

include __DIR__ . "/../Layout/common_form.php";
?>

<form action="#" method="POST">
    <div class="field">
        <label for="title" class="label">Título</label>
        <div class="control">
            <input type="text" class="input" id="title" name="title" value="<?php echo $form['title'] ?>" required>
        </div>
    </div>

    <div class="field">
        <label for="description" class="label">Descrição</label>
        <div class="control">
            <textarea class="textarea" id="description" name="description" rows="4">
                <?php echo $form["description"] ?>
            </textarea>
        </div>
    </div>

    <div class="field">
        <label for="author" class="label">Autor</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="author" id="author">
                    <?php foreach ($authors as $author) { ?>
                        <option <?php echo $form['author'] === $author['id'] ? 'selected' : '' ?>>
                            <?php echo $author["name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="category" class="label">Categoria</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select name="category" id="category">
                    <?php foreach ($categories as $category) { ?>
                        <option <?php echo $form['category'] === $category['id'] ? 'selected' : '' ?>>
                            <?php echo $category["name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label for="publish_date" class="label">Data de Publicação</label>
        <div class="control">
            <input type="date" class="input" id="publish_date" name="publish_date" value="<?php echo $form['publish_date'] ?>" required>
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