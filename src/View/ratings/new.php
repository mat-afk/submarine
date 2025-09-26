<?php
$pageTitle = "Avaliar livro";

include __DIR__ . "/../Layout/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">Avaliar livro</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="/ratings" class="button is-light">
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
                <label for="book" class="label">Livro</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="book" id="book">
                            <option selected>Selecione uma opção</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label for="stars" class="label">Estrelas</label>
                <div class="control">
                    <input type="number" class="input" id="stars" name="stars" min="1" max="5" step="0.5" required>
                </div>
                <p class="help">Avalie de 1 a 5 estrelas</p>
            </div>

            <div class="field">
                <label for="comment" class="label">Comentário</label>
                <div class="control">
                    <textarea class="textarea" id="comment" name="comment" rows="4" placeholder="Deixe seu comentário sobre o livro..."></textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-success">
                        <span class="icon">
                            <i class="fas fa-star"></i>
                        </span>
                        <span>Salvar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>