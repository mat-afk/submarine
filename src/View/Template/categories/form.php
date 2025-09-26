<?php
$baseUrl = "/categories";

$form = [
    "name" => isset($state) ? $state["name"] : ""
];

include __DIR__ . "/../../Layout/common-form.php";
?>

<form action="#" method="POST">
    <div class="field">
        <label for="name" class="label">Nome</label>
        <div class="control">
            <input type="text" class="input" id="name" name="name" value="<?php echo $form['name'] ?>" required>
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