<?php
$pageTitle = "Listagem de categorias";

include __DIR__ . "/../Layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Categorias</h1>
        <a class="btn btn-success" href="/categories/new">Nova categoria</a>
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
                    <td>Ficção</td>
                    <td>
                        <form action="/categories/delete?id=" method="POST">
                            <a href="/categories/edit?id=1" class="btn btn-primary btn-sm">Editar</a>
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
