<?php
include __DIR__ . "/default.php";
?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">
                <?php echo $formTitle ?? "Criar novo"; ?>
            </h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="<?php echo $baseUrl ?? '/books' ?>" class="button is-light">
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
