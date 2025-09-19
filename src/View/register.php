<?php
$pageTitle = "Cadastro";

include __DIR__ . "/Layout/header.php";
?>

<body>
    <section class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title subtitle is-centered">
                            Cadastro
                        </p>
                    </header>
                    <div class="card-content">
                        <form method="POST">
                            <div class="field">
                                <label class="label has-text-left">Nome</label>
                                <div class="control">
                                    <input class="input" type="text" name="name" placeholder="Nome da Silva">
                                </div>

                                <?php
                                $key = "NAME_REQUIRED";
                                if (isset($errors[$key]) && $errors[$key]):
                                ?>
                                    <span>Nome é obrigatório.</span>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">E-mail</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="email@exemplo.com">
                                </div>

                                <?php
                                $key = "INVALID_EMAIL";
                                if (isset($errors[$key]) && $errors[$key]):
                                ?>
                                    <span>E-mail inválido.</span>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">Senha</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="********">
                                </div>

                                <?php
                                $key = "WEAK_PASSWORD";
                                if (isset($errors[$key]) && $errors[$key]):
                                ?>
                                    <span>A senha precisa ter, no mínimo, 6 caracteres.</span>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <span>Já tem uma conta? <a href="/login">Entre aqui</a></span>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-info is-fullwidth">
                                        Cadastrar
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

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") return;

if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["password"])) return;

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

$errors = [
    "NAME_REQUIRED" => false,
    "INVALID_EMAIL" => false,
    "WEAK_PASSWORD" => false
];

if (empty($name)) $errors["NAME_REQUIRED"] = true;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors["INVALID_EMAIL"] = true;

if (strlen($password) < 6) $errors["WEAK_PASSWORD"] = true;

foreach ($errors as $key => $value) {
    if ($errors[$key]) return;
}

echo $_POST["name"] . " " . $_POST["email"] . " " . $_POST["password"];
?>