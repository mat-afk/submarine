<?php
$pageTitle = "Cadastro";

$form = [
    "name" => $state["name"] ?? "",
    "email" => $state["email"] ?? "",
    "password" => $state["password"] ?? "",
];

$errors = [
    "NAME_REQUIRED" => $errors["NAME_REQUIRED"] ?? false,
    "INVALID_EMAIL" => $errors["INVALID_EMAIL"] ?? false,
    "WEAK_PASSWORD" => $errors["WEAK_PASSWORD"] ?? false,
    "BAD_CREDENTIALS" => $errors["BAD_CREDENTIALS"] ?? false,
];

include __DIR__ . "/../Layout/auth-form.php";
?>

<div class="tabs is-centered">
    <ul>
        <li>
            <a href="/login">Login</a>
        </li>
        <li class="is-active">
            <a href="/register">Cadastro</a>
        </li>
    </ul>
</div>

<h3 class="title is-3 has-text-centered mb-5">Cadastro</h3>

<form action="/register" method="POST">
    <div class="field">
        <label for="name" class="label">Nome</label>
        <div class="control has-icons-left">
            <input type="text" name="name" id="name" class="input <?= $errors['NAME_REQUIRED'] ? 'is-danger' : '' ?>" placeholder="Meu Nome da Silva" value="<?= $form['name'] ?>" required>
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
            <?php if ($errors["NAME_REQUIRED"]): ?>
                <p class="help is-danger">É obrigatório ter um nome</p>
            <?php endif ?>
        </div>
    </div>

    <div class="field">
        <label for="email" class="label">E-mail</label>
        <div class="control has-icons-left">
            <input type="email" name="email" id="email" class="input <?= $errors['INVALID_EMAIL'] ? 'is-danger' : '' ?>" placeholder="exemplo@email.com" value="<?= $form['email'] ?>" required>
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
            <?php if ($errors["INVALID_EMAIL"]): ?>
                <p class="help is-danger">Endereço de e-mail inválido</p>
            <?php endif ?>
        </div>
    </div>

    <div class="field">
        <label for="password" class="label">Senha</label>
        <div class="control has-icons-left">
            <input type="password" name="password" id="password" class="input <?= $errors['WEAK_PASSWORD'] ? 'is-danger' : '' ?>" placeholder="******" value="<?= $form['password'] ?>" required>
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>
        <p class="help <?php echo $errors["WEAK_PASSWORD"] ? 'is-danger' : '' ?>">
            A sua senha deve ter, pelo menos, 6 caracteres.
        </p>
    </div>

    <?php if ($errors["BAD_CREDENTIALS"]): ?>
        <p class="has-text-danger has-text-centered py-3">Credenciais inválidas. Esse e-mail já está em uso.</p>
    <?php endif ?>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-primary is-fullwidth">Cadastrar</button>
        </div>
    </div>
</form>

<?php
$errors = [];