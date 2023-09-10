<?php

include 'header.php';
require '../database/conexao.php';

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "inicio.php";
    }
    header("Location: " . $pagina);
}
function falhaLogin($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
}

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_SESSION["add_cadastro"]) && $_SESSION["add_cadastro"]) {
    $email = $_SESSION["email"];
    $senha = $_SESSION["senha"];
    unset($_SESSION["add_cadastro"]);
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
}

if (empty($email) && empty($senha)) {
    // NENHUM VALOR
    $_SESSION["error_login"] = "acesso_url";
    falhaLogin();
    die();
}
if (empty($email)) {
    // EMAIL VAZIO
    $_SESSION["error_login"] = "email";
    falhaLogin();
    die();
}
if (empty($senha)) {
    // SENHA VAZIA
    $_SESSION["error_login"] = "senha";
    // passar email para login
    $_SESSION["error_senha"] = $email;
    falhaLogin();
    die();
}

$sql = "SELECT id_usuario, nome, email, senha FROM usuario WHERE email = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email]);
$row = $stmt->fetch();
$cont = $stmt->rowCount();


if (password_verify($senha, $row['senha'])) {
    //DEU CERTO
    $_SESSION["id_usuario"] = $row["id_usuario"];
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["bem_vindo"] = true;
    redireciona();
    die();

} else{
    //NÂO DEU CERTO
    unset($_SESSION["email"]);
    unset($_SESSION["nome"]);

    if ($cont == 0){
        // EMAIL INCORRETO
        $_SESSION["email_invalido"] = $email;
        falhaLogin();
        die();
    }
    elseif ($result == true && $cont >= 1) {
        // SENHA INCORRETA
        $_SESSION["senha_invalida"] = true;
        // passar email para login
        $_SESSION["error_senha"] = $email;
        falhaLogin();
        die();
    }
}

include 'js.php';
