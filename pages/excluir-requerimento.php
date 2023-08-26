<?php
include 'header.php';

$id_requerimento = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} else {
?>
    <div class="row cor_tema d-flex align-items-center">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Efetue sua autenticação para ter acesso ao seu histórico de requerimentos</h2>
            <h2><a href="login.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Faça Login</a></h2>

        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/identifique-se.png" alt="" width="80%">
        </div>
    </div>
<?php
    exit;
}

include '../database/conexao.php';

$sql = "DELETE FROM requerimento WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_requerimento, $id_usuario]);
$cont =  $stmt->rowCount();

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "historico.php";
    }
    header("Location: " . $pagina);
}

if ($result == true && $cont = 1) {

    $_SESSION["excluir_requerimento"] = true;
    redireciona();
    die();
}

if (empty($id_requerimento)) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger">O valor do identificador de um requerimento não foi instanciado</h2>
            <p>Retorne à página de histórico e selecione um requerimento para deletar suas informações</p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Acessar histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>

    </div>
<?php
    exit;
} elseif ($cont == 0) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao buscar pelo requerimento</h1>
            <p class="fs-5s">Não foi econtrado nenhum requerimento com o ID = <?= $id_requerimento ?></p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Retornar ao histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    <?php
    exit;
} else {
    $errorArray = $stmt->errorInfo();
    ?>
        <div class="row d-flex align-items-center ps-4">
            <div class="col-md-6 text-center">
                <h1 class="mt-2 text-danger">Falha ao ao efetuar a exclusão dos dodos do requerimento</h1>
                <p class="fs-5s"><?= $errorArray[2]; ?></p>
                <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Retornar ao histórico</a></h2>

            </div>
            <div class="mx-auto col-md-6">
                <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
            </div>
        <?php

    }
    include 'footer.php';
    include 'js.php'; ?>