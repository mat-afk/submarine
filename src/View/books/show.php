<?php
$pageTitle = "O Guia do Mochileiro das Galáxias";

include __DIR__ . "/../Layout/default.php";
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Detalhes do Livro</h1>
    <div>
        <a href="/books/edit?id=" class="btn btn-primary me-2">Editar Livro</a>
        <a href="/books" class="btn btn-secondary">Voltar para a lista</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">O Guia do Mochileiro das Galáxias</h5>
        <h6 class="card-subtitle mb-2 text-muted">Douglas Adams</h6>
        <hr>
        <p><strong>Autor:</strong> Douglas Adams</p>
        <p><strong>Categoria:</strong> Ficção Científica</p>
        <p><strong>Data de Publicação:</strong> 12/10/1979</p>
        <p><strong>Descrição:</strong> Uma hilariante saga espacial que segue as desventuras do terráqueo Arthur Dent e seu amigo Ford Prefect após a destruição da Terra para a construção de uma autoestrada hiperespacial.</p>
    </div>
</div>
