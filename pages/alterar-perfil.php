<?php
include 'header.php';

$id_requerimento = filter_input(INPUT_POST, "alterar", FILTER_SANITIZE_NUMBER_INT);

function facaLogin($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
}

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $_SESSION["realizar_login"] = "alterar-perfil";
    facaLogin();
    die();
}

function perfil($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "perfil.php";
    }
    header("Location: " . $pagina);
}

function validacaoPerfil($pagina = null)
{
    $pagina = "perfil.php";
    header("Location: " . $pagina);
}

$nome = trim(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS));
$ddd = trim(filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_SPECIAL_CHARS));
$telefone = trim(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

///////////////////////////////////// VALIDAÇÕES /////////////////////////////////////
$_SESSION["nome_perfil"] = $nome;
$_SESSION["ddd_perfil"] = $ddd;
$_SESSION["telefone_perfil"] = $telefone;
$_SESSION["email_perfil"] = $email;

if (
    empty($nome) &&
    empty($ddd) &&
    empty($telefone) &&
    empty($email)
) {
    $_SESSION["error_perfil"] = "acesso_url";
    validacaoPerfil();
    die();
}

/// NOME
if (empty($nome)) {
    $_SESSION["error_perfil"] = "nome";
    $_SESSION["nome_perfil"] = null;
    validacaoPerfil();
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $nome)) {
    $_SESSION["caracteres_perfil"] = "nome_inadequado";
    $_SESSION["nome_perfil"] = null;
    $_SESSION["caracteres"] = null;
    validacaoPerfil();
    die();
} elseif (strlen($nome) < 4) {
    $_SESSION["caracteres_perfil"] = "nome_pequeno";
    $_SESSION["caracteres"] = strlen($nome);
    validacaoPerfil();
    die();
} elseif (strlen($nome) > 150) {
    $_SESSION["caracteres_perfil"] = "nome_grande";
    $_SESSION["caracteres"] = strlen($nome);
    validacaoPerfil();
    die();
}

/// DDD 
if (empty($ddd)) {
    $_SESSION["error_perfil"] = "ddd";
    $_SESSION["ddd_perfil"] = null;
    validacaoPerfil();
    die();
} elseif (!preg_match('/^\([0-9]{2}\)$/', $ddd)) {
    $_SESSION["caracteres_perfil"] = "ddd_inadequado";
    $_SESSION["ddd_perfil"] = null;
    $_SESSION["caracteres"] = null;
    validacaoPerfil();
    die();
}

/// TELEFONE
if (empty($telefone)) {
    $_SESSION["error_perfil"] = "telefone";
    $_SESSION["telefone_perfil"] = null;
    validacaoPerfil();
    die();
} elseif (!preg_match('/^[0-9]{4,6}-[0-9]{3,4}$/', $telefone)) {
    $_SESSION["caracteres_perfil"] = "telefone_inadequado";
    $_SESSION["telefone_perfil"] = null;
    $_SESSION["caracteres"] = null;
    validacaoPerfil();
    die();
}

/// EMAIL
if (empty($email)) {
    $_SESSION["error_perfil"] = "email";
    $_SESSION["email_perfil"] = null;
    validacaoPerfil();
    die();
} elseif (strlen($email) < 7) {
    $_SESSION["caracteres_perfil"] = "email_pequeno";
    $_SESSION["caracteres"] = strlen($email);
    validacaoPerfil();
    die();
} elseif (strlen($email) > 150) {
    $_SESSION["caracteres_perfil"] = "email_grande";
    $_SESSION["caracteres"] = strlen($email);
    validacaoPerfil();
    die();
}

require '../database/conexao.php';

$sql = "SELECT id_usuario, email FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email]);
$rowEmail = $stmt->fetch();
$cont = $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["error_perfil"] = "email_inexistente";
    $_SESSION["email_perfil"] = null;
    validacaoPerfil();
    die();
}

$sql = "UPDATE usuario SET nome = ?, ddd = ?, telefone = ?, email = ? WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $ddd, $telefone, $email, $id_usuario]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["alterar_perfil"] = true;
    perfil();
    die();
} elseif ($result == true && $cont == 0) {
    $_SESSION["manteve_perfil"] = true;
    perfil();
    die();

} else {
    $errorArray = $stmt->errorInfo();
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao ao efetuar a alteração dos dodos do usuário</h1>
            <p class="fs-5s"><?= $errorArray[2]; ?></p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Retornar ao histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    <?php
}
include 'js.php';
?>