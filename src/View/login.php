<?php
$pageTitle = "Login";

include __DIR__ . "/Layout/header.php";
?>

<body>
    <section class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title subtitle is-centered">
                            Login
                        </p>
                    </header>
                    <div class="card-content">
                        <form method="POST">
                            <div class="field">
                                <label class="label has-text-left">E-mail</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="seu-email@exemplo.com">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">Senha</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="********">
                                </div>
                            </div>

                            <div class="field">
                                <span>Não tem uma conta? <a href="/register">Registre-se aqui</a></span>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button class="button is-info is-fullwidth">
                                        Entrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") return;

if (!isset($_POST["email"]) || !isset($_POST["password"]) || $error == true) return;

echo $_POST["email"] . " " . $_POST["password"];
?>