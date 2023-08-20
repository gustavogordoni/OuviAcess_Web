<?php
require 'header.php';

require '../database/conexao.php';
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

echo "<p><b>ID:</b> $id</p>";

$sql = "DELETE FROM requerimento WHERE id_requerimento = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Requerimento excluído com SUCESSO!</h4>
    </div>
<?php
    header("Location: historico.php");
} elseif ($cont == 0) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao efetuar exclusão</h4>
        <p>Não foi econtrado nenhum Requerimento com o ID = <?= $id ?></p>
    </div>
<?php

} else {
    $errorArray = $stmt->errorInfo();

?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao efetuar a gravação dos dodos</h4>
        <p><?= $errorArray[2]; ?></p>
    </div>
<?php

}
require 'footer.php';
require 'js.php'; ?>