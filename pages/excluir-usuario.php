<?php
include 'header.php';

if (autenticado()) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!autenticado()) {
    $_SESSION["realizar_login"] = "excluir-requerimento";
    redireciona("login.php");
    die();
}

require '../database/conexao.php';

$sql = "DELETE FROM arquivo WHERE id_requerimento IN (SELECT id_requerimento FROM requerimento WHERE id_usuario = ?";
echo $sql . "<br>";
$stmt = $conn->prepare($sql);
$result = $stmt->execute($id_usuario);

$sql = "DELETE FROM requerimento WHERE id_usuario = ?";
echo $sql . "<br>";
$stmt = $conn->prepare($sql);
$result = $stmt->execute($id_usuario);

$sql = "DELETE FROM usuario WHERE id_usuario = ?";
echo $sql . "<br>";
$stmt = $conn->prepare($sql);
$result = $stmt->execute($id_usuario);

if ($result == true && $cont == 1) {
    $_SESSION["excluir_requerimento"] = true;
    redireciona("historico.php");
    die();
} elseif ($cont == 0) {
    $_SESSION["id_requerimento_inexistente"] = true;
    include 'mensagens.php';
    die();
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