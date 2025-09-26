<?php
$pageTitle = "Listagem de livros";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Livros</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a class="button is-success" href="/books/new">
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span>Novo Livro</span>
            </a>
        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-content">
        <h5 class="title is-5">Filtros</h5>
        <form action="#" method="GET">
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label for="autor" class="label">Autor</label>
                        <div class="control">
                            <input type="text" class="input" id="autor" name="autor" placeholder="Ex: Douglas Adams">
                        </div>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="field">
                        <label for="category" class="label">Categoria</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select id="category" name="category">
                                    <option selected>Todas as categorias</option>
                                    <option value="Ficção Científica">Ficção Científica</option>
                                    <option value="Fábula">Fábula</option>
                                    <option value="Fantasia">Fantasia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="field">
                        <label class="label">Faixa de Avaliação</label>
                        <div class="columns is-gapless">
                            <div class="column">
                                <div class="control">
                                    <input type="number" class="input" id="min-rating" name="min-rating" min="1" max="5" step="0.5" value="1" placeholder="Min">
                                </div>
                            </div>
                            <div class="column">
                                <div class="control">
                                    <input type="number" class="input" id="max-rating" name="max-rating" min="1" max="5" step="0.5" value="5" placeholder="Max">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button type="submit" class="button is-primary">Aplicar Filtros</button>
                </div>
                <div class="control">
                    <a href="/books" class="button is-light">Limpar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-container">
    <table class="table is-fullwidth is-striped is-hoverable">
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
                <div class="buttons">
                    <a href="/books/show?id=1" class="button is-info is-small">
                            <span class="icon">
                                <i class="fas fa-eye"></i>
                            </span>
                        <span>Detalhes</span>
                    </a>
                    <a href="/books/edit?id=1" class="button is-primary is-small">
                            <span class="icon">
                                <i class="fas fa-edit"></i>
                            </span>
                        <span>Editar</span>
                    </a>
                    <form action="/books/delete?id=" method="POST" style="display: inline;">
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