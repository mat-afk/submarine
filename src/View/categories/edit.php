<?php
$pageTitle = "Editar categoria";

include __DIR__ . "/../Layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Editar categoria</h1>

        <a href="/categories" class="btn btn-secondary">Voltar para a lista</a>
    </div>

    <form action="#" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-success me-2">Salvar</button>
    </form>
</div>