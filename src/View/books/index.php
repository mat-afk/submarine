<?php
$pageTitle = "Listagem de livros";

include __DIR__ . "/../Layout/default.php";
?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Livros</h1>
    <a class="btn btn-success" href="/books/new">Novo Livro</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Filtros</h5>
        <form action="#" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" placeholder="Ex: Douglas Adams">
            </div>

            <div class="col-md-4">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select" id="category" name="category">
                    <option selected>Todas as categorias</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="Fábula">Fábula</option>
                    <option value="Fantasia">Fantasia</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Faixa de Avaliação</label>
                <div class="row gx-2">
                    <div class="col">
                        <input type="number" class="form-control" id="min-rating" name="min-rating" min="1" max="5" step="0.5" value="1">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="max-rating" name="max-rating" min="1" max="5" step="0.5" value="5">
                    </div>
                </div>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                <a href="/books" class="btn btn-secondary">Limpar</a>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Data de Publicação</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>O Guia do Mochileiro das Galáxias</td>
            <td>Douglas Adams</td>
            <td>Ficção Científica</td>
            <td>12/10/1979</td>
            <td>
                <form action="/books/delete?id=" method="POST">
                    <a href="/books/show?id=1" class="btn btn-secondary btn-sm">Detalhes</a>
                    <a href="/books/edit?id=1" class="btn btn-primary btn-sm">Editar</a>
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>
