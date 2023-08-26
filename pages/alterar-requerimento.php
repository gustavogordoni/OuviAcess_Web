<?php
include 'header.php';

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

$id_requerimento = filter_input(INPUT_POST, "id_requerimento", FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);


require '../database/conexao.php';

$sql = "UPDATE requerimento SET titulo = ?, tipo = ?, cidade = ?, cep = ?, bairro = ?, rua = ?, descricao = ?  WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$titulo, $tipo, $cidade, $cep, $bairro, $rua, $descricao, $id_requerimento, $id_usuario]);
$cont =  $stmt->rowCount();

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "historico.php";
    }
    header("Location: " . $pagina);
}

if (empty($id_requerimento)) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger">O valor do identificador de um requerimento não foi instanciado</h2>
            <p>Retorne à página de histórico e selecione um requerimento para excluir suas informações</p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Acessar histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>

    </div>
<?php
    exit;
}

if ($result == true && $cont >= 1) {

    $_SESSION["alterar_requerimento"] = true;
    redireciona();
    die();

} elseif ($result == true && $cont == 0) {

    $_SESSION["manteve_requerimento"] = true;
    redireciona();
    die();

} else {
    $errorArray = $stmt->errorInfo();
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao ao efetuar a alteração dos dodos do requerimento</h1>
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