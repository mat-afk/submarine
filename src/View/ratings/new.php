<?php
$pageTitle = "Avaliar livro";

include __DIR__ . "/../Layout/default.php";
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Avaliar livro</h1>

    <a href="/ratings" class="btn btn-secondary">Voltar para a lista</a>
</div>

<form action="#" method="POST">
    <div class="mb-3">
        <label for="book" class="form-label">Livro</label>
        <select class="form-select" name="book" id="book">
            <option selected>Selecione uma opção</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

    </div>

    <div class="mb-3">
        <label for="stars" class="form-label">Estrelas</label>
        <input type="text" class="form-control" id="stars" name="stars" required>
    </div>

    <div class="mb-3">
        <label for="comment" class="form-label">Descrição</label>
        <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-success me-2">Salvar</button>
</form>
