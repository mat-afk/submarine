<?php
$pageTitle = "Login";

$errors = [
    "INVALID_EMAIL" => $errors["INVALID_EMAIL"] ?? false,
    "PASSWORD_REQUIRED" => $errors["PASSWORD_REQUIRED"] ?? false,
    "BAD_CREDENTIALS" => $errors["BAD_CREDENTIALS"] ?? false,
];

include __DIR__ . "/../Layout/auth-form.php";
?>

<div class="tabs is-centered">
    <ul>
        <li class="is-active">
            <a href="/login">Login</a>
        </li>
        <li>
            <a href="/register">Cadastro</a>
        </li>
    </ul>
</div>

<h3 class="title is-3 has-text-centered mb-5">Login</h3>

<form action="/login" method="POST">
    <div class="field">
        <label for="email" class="label">E-mail</label>
        <div class="control has-icons-left">
            <input type="email" name="email" id="email" class="input" placeholder="exemplo@email.com" required>
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>

            <?php if ($errors["INVALID_EMAIL"]): ?>
                <p class="help is-danger">Endereço de e-mail inválido.</p>
            <?php endif ?>
        </div>
    </div>

    <div class="field">
        <label for="password" class="label">Senha</label>
        <div class="control has-icons-left">
            <input type="password" name="password" id="password" class="input" placeholder="******" autocomplete required>
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>

            <?php if ($errors["PASSWORD_REQUIRED"]): ?>
                <p class="help is-danger">A senha é necessária para realizar a autenticação.</p>
            <?php endif ?>
        </div>
    </div>

    <?php if ($errors["BAD_CREDENTIALS"]): ?>
        <p class="has-text-danger has-text-centered py-3">Credenciais inválidas. Verifique se o e-mail e a senha estão corretos.</p>
    <?php endif ?>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-primary is-fullwidth">Entrar</button>
        </div>
    </div>
</form>

<?php
$errors = [];
