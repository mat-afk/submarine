<?php
$pageTitle = "Adicionar livro";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Adicionar Novo Livro</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="/books" class="button is-light">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span>Voltar para a lista</span>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <form action="#" method="POST">
            <div class="field">
                <label for="title" class="label">Título</label>
                <div class="control">
                    <input type="text" class="input" id="title" name="title" required>
                </div>
            </div>

            <div class="field">
                <label for="description" class="label">Descrição</label>
                <div class="control">
                    <textarea class="textarea" id="description" name="description" rows="4"></textarea>
                </div>
            </div>

            <div class="field">
                <label for="author" class="label">Autor</label>
                <div class="control">
                    <input type="text" class="input" id="author" name="author" required>
                </div>
            </div>

            <div class="field">
                <label for="category" class="label">Categoria</label>
                <div class="control">
                    <input type="text" class="input" id="category" name="category" required>
                </div>
            </div>

            <div class="field">
                <label for="publish_date" class="label">Data de Publicação</label>
                <div class="control">
                    <input type="date" class="input" id="publish_date" name="publish_date" required>
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
    </div>
</div>