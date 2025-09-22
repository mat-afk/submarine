<?php
$pageTitle = "Listagem de livros";

include __DIR__ . "/../Layout/default.php";
?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Livros</h1>
    <a class="btn btn-success" href="/books/new">Novo Livro</a>
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