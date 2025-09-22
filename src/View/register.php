<?php
$pageTitle = "Cadastro";

include __DIR__ . "/Layout/auth_form.php";
?>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/register">Cadastro</a>
    </li>
</ul>

<h3 class="mt-4 mb-3 text-center">Cadastro</h3>

<form action="/register" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="seu-email@exemplo.com" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <div class="form-text">
            Sua senha deve ter, pelo menos, 6 caracteres.
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>