<?php include __DIR__ . "/default.php"; ?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-3">
                <?php echo $listTitle ?? "Recurso"; ?>
            </h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a class="button is-success" href="<?php echo $button['to'] ?? "/books/new"; ?>">
                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span>
                    <?php echo $button["label"] ?? "Novo"; ?>
                </span>
            </a>
        </div>
    </div>
</div>