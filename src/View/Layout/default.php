<?php
include __DIR__ . "/header.php";
?>

<body>
    <div class="container">
        <div class="columns is-gapless">
            <div class="column">
                <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <a class="navbar-item has-text-white has-text-weight-bold is-size-4" href="/books">
                            <figure class="image is-64x64 mr-3">
                                <img src="/favicon.png" style="min-width: 100%; min-height: 100%;" alt="Logo" />
                            </figure>
                            <span>Submarine</span>
                        </a>
                    </div>

                    <div class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item has-text-white" href="/books">
                                Livros
                            </a>
                            <a class="navbar-item has-text-white" href="/authors">
                                Autores
                            </a>
                            <a class="navbar-item has-text-white" href="/categories">
                                Categorias
                            </a>
                            <a class="navbar-item has-text-white" href="/ratings">
                                Avaliações
                            </a>
                        </div>
                    </div>
                </nav>

                <div class="p-5">
                    <div class="container">