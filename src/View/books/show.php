<?php
$pageTitle = "O Guia do Mochileiro das Galáxias";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Detalhes do Livro</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <div class="buttons">
                <a href="/books/edit?id=" class="button is-primary">
                    <span class="icon">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span>Editar Livro</span>
                </a>
                <a href="/books" class="button is-light">
                    <span class="icon">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span>Voltar para a lista</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <div class="content">
            <h2 class="title is-4">O Guia do Mochileiro das Galáxias</h2>
            <h3 class="subtitle is-6 has-text-grey">Douglas Adams</h3>

            <hr>

            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label class="label">Autor:</label>
                        <p class="has-text-weight-normal">Douglas Adams</p>
                    </div>

                    <div class="field">
                        <label class="label">Categoria:</label>
                        <p class="has-text-weight-normal">Ficção Científica</p>
                    </div>

                    <div class="field">
                        <label class="label">Data de Publicação:</label>
                        <p class="has-text-weight-normal">12/10/1979</p>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Descrição:</label>
                <p class="has-text-weight-normal">Uma hilariante saga espacial que segue as desventuras do terráqueo Arthur Dent e seu amigo Ford Prefect após a destruição da Terra para a construção de uma autoestrada hiperespacial.</p>
            </div>
        </div>
    </div>
</div>