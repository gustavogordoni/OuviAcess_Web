<?php

include 'header.php';
require '../database/conexao.php';

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_SESSION["add_cadastro"]) && $_SESSION["add_cadastro"]) {

$email = $_SESSION["email"];
$senha = $_SESSION["senha_hash"];

unset($_SESSION["add_cadastro"]);
unset($_SESSION["email"]);
unset($_SESSION["senha_hash"]);
}

$sql = "SELECT id_usuario, nome, email, senha, ddd, telefone FROM usuario WHERE email = ? AND senha = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email, $senha]);
$row = $stmt->fetch();
$cont =  $stmt->rowCount();

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "home.php";
    }
    header("Location: " . $pagina);
}

if ($result == true && $cont >= 1) {
    //DEU CERTO
    $_SESSION["id_usuario"] = $row["id_usuario"];
    $_SESSION["nome"] = $row["nome"];

    $_SESSION["bem_vindo"] = true;
    redireciona();
    die();

} elseif ($cont == 0) {
    //NÂO DEU CERTO
    unset($_SESSION["email"]);
    unset($_SESSION["nome"]);
?>
    <div class="alert alert-danger d-flex h-100 mb-0" role="alert">
        <div class="mx-auto text-center my-auto">
            <h2>FALHA ao sincronizar os dados de Login</h2>
            <p>Não foi possível encontrar o E-mail: <?= $email ?><br> ou a senha informada</p>
        </div>
    </div>
<?php
}

include 'js.php';
?>