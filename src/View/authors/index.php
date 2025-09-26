<?php
$pageTitle = "Listagem de autores";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Autores</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a class="button is-success" href="/authors/new">
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span>Novo autor</span>
            </a>
        </div>
    </div>
</div>

<div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable">
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
                <div class="buttons">
                    <a href="/authors/edit?id=1" class="button is-primary is-small">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        <span>Editar</span>
                    </a>
                    <form action="/authors/delete?id=1" method="POST" style="display: inline;">
                        <button type="submit" class="button is-danger is-small">
                                <span class="icon">
                                    <i class="fas fa-trash"></i>
                                </span>
                            <span>Excluir</span>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>