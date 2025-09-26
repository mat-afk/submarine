<?php
$pageTitle = "Criar categoria";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Criar categoria</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="/categories" class="button is-light">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span>Voltar para a lista</span>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <form action="#" method="POST">
            <div class="field">
                <label for="name" class="label">Nome</label>
                <div class="control">
                    <input type="text" class="input" id="name" name="name" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-success">
                        <span class="icon">
                            <i class="fas fa-save"></i>
                        </span>
                        <span>Salvar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>