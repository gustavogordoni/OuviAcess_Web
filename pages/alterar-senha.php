<?php
include 'header.php';

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
    $_SESSION["realizar_login"] = "alterar-senha";
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
    $pagina = "editar-perfil.php";
    header("Location: " . $pagina);
}

$senha_atual = trim(filter_input(INPUT_POST, "senha_atual", FILTER_SANITIZE_SPECIAL_CHARS));
$senha_nova = trim(filter_input(INPUT_POST, "senha_nova", FILTER_SANITIZE_SPECIAL_CHARS));
$senha_confirmacao = trim(filter_input(INPUT_POST, "senha_confirmacao", FILTER_SANITIZE_SPECIAL_CHARS));

///////////////////////////////////// VALIDAÇÕES /////////////////////////////////////

if (
    empty($senha_atual) &&
    empty($senha_nova) &&
    empty($senha_confirmacao)
) {
    $_SESSION["error_perfil_senha"] = "acesso_url";
    validacaoPerfil();
    die();
}

/// SENHA
if (empty($senha)) {
    $_SESSION["error_cadastro"] = "senha";
    validacaoUsuario();
    die();
}
/// CONFIRME
if (empty($confirme)) {
    $_SESSION["error_cadastro"] = "confirme";
    validacaoUsuario();
    die();
}
/// CONFIRMAÇÃO DA SENHA - ESTÃO IGUAIS
if ($senha != $confirme) {
    $_SESSION["caracteres_cadastro"] = "senhas_diferentes";
    validacaoUsuario();
    die();
}


require '../database/conexao.php';


$sql = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$senha, $id_usuario]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["alterar_perfil_senha"] = true;
    perfil();
    die();
} elseif ($result == true && $cont == 0) {
    $_SESSION["manteve_perfil_senha"] = true;
    perfil();
    die();

} else {
    $errorArray = $stmt->errorInfo();
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao ao efetuar a alteração da senha do usuário</h1>
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