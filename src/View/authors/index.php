<?php
$pageTitle = "Listagem de autores";

include __DIR__ . "/../Layout/default.php";
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Autores</h1>
    <a class="btn btn-success" href="/authors/new">Novo autor</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Douglas Adams</td>
            <td>
                <form action="/authors/delete?id=1" method="POST">
                    <a href="/authors/edit?id=1" class="btn btn-primary btn-sm">Editar</a>
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>