<?php
include 'header.php';

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $_SESSION["realizar_login"] = "alterar-senha";
    facaLogin();
    die();
}

function facaLogin($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
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
    $_SESSION["erro_alterarSenha"] = "acesso_url";
    validacaoPerfil();
    die();
}

/// SENHA
if (empty($senha_atual)) {
    $_SESSION["erro_alterarSenha"] = "senha_atual";
    validacaoPerfil();
    die();
}
/// NOVA
if (empty($senha_nova)) {
    $_SESSION["erro_alterarSenha"] = "senha_nova";
    validacaoPerfil();
    die();
}
/// CONFIRME
if (empty($senha_confirmacao)) {
    $_SESSION["erro_alterarSenha"] = "senha_confirmacao";
    validacaoPerfil();  
}
/// CONFIRMAÇÃO DA SENHA - ESTÃO IGUAIS
if ($senha_nova != $senha_confirmacao) {
    $_SESSION["erro_alterarSenha"] = "senhas_diferentes";
    validacaoPerfil();
    die();
}

require '../database/conexao.php';

$sql = "SELECT senha FROM usuario WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usuario]);
$row = $stmt->fetch();
$cont = $stmt->rowCount();

if ($senha_atual == $senha_nova) {
    // MESMA SENHA
    $_SESSION["alterarSenha"] = "mesma";
    perfil();
    die();
}

if (password_verify($senha_atual, $row['senha'])) {

    $senha_hash = password_hash($senha_nova, PASSWORD_BCRYPT);

    $sql = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$senha_hash, $id_usuario]);
    $cont =  $stmt->rowCount();

    if ($result == true && $cont >= 1) {
        $_SESSION["alterarSenha"] = "sucesso";
        perfil();
        die();
    } elseif ($result == true && $cont == 0) {
        // MESMA SENHA
        $_SESSION["alterarSenha"] = "mesma";
        perfil();
        die();
    } else {
        // ERRO NO PROCESSO
        $_SESSION["erro_alterarSenha"] = "erro_nao_identificado";
        validacaoPerfil();
        die();
    }
} else {
    // SENHAS DIFERENTES
    $_SESSION["erro_alterarSenha"] = "diferentes";
    validacaoPerfil();
    die();
}

include 'js.php';
include 'mensagens.php';
