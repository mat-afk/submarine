<?php
$pageTitle = "Adicionar livro";

include __DIR__ . "/../Layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Adicionar Novo Livro</h1>

        <a href="/books" class="btn btn-secondary">Voltar para a lista</a>
    </div>

    <form action="#" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="mb-3">
            <label for="publish_date" class="form-label">Data de Publicação</label>
            <input type="date" class="form-control" id="publish_date" name="publish_date" required>
        </div>

        <button type="submit" class="btn btn-success me-2">Salvar</button>
    </form>
</div>
