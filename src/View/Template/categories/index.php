<?php
$pageTitle = "Listagem de categorias";
$listTitle = "Categorias";
$button = [
        "label" => "Nova categoria",
        "to" => "/categories/new"
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
            <td>Ficção</td>
            <td>
                <div class="buttons">
                    <a href="/categories/edit?id=1" class="button is-primary is-small">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        <span>Editar</span>
                    </a>
                    <form action="/categories/delete?id=" method="POST" style="display: inline;">
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