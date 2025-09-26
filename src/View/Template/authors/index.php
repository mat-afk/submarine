<?php
$pageTitle = "Listagem de autores";
$listTitle = "Autores";
$button = [
        "label" => "Novo autor",
        "to" => "/authors/new"
];

include __DIR__ . "/../../Layout/list.php";
?>

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