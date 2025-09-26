<?php
$pageTitle = "Login";

include __DIR__ . "/Layout/auth_form.php";
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
        <label for="email" class="label">Email</label>
        <div class="control has-icons-left">
            <input type="email" name="email" id="email" class="input" placeholder="seu-email@exemplo.com" required>
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </div>
    </div>

    <div class="field">
        <label for="password" class="label">Senha</label>
        <div class="control has-icons-left">
            <input type="password" name="password" id="password" class="input" required>
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-primary is-fullwidth">Entrar</button>
        </div>
    </div>
</form>