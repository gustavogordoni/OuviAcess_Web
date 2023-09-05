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
    $_SESSION["realizar_login"] = "alterar-requerimento";
    facaLogin();
    die();
}

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "historico.php";
    }
    header("Location: " . $pagina);
}


if (empty($id_requerimento)) {
    $_SESSION["crud_requerimento"] = "alterar_id";
    include 'mensagens.php';
    die();
}

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

if ($result == true && $cont >= 1) {
/*
    if (!empty($_FILES['arquivo']['name'])) {
        $nome = $_FILES['arquivo']['name'];
        $tamanho = $_FILES['arquivo']['size'];
        $tipo = $_FILES['arquivo']['type'];
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        // Read in a binary file
        $data = file_get_contents($_FILES['arquivo']['tmp_name']);
        // Escape the binary data
        $dados_arquivo = bin2hex($data);

        ECHO "CAIU NO IF";

        //$sql = "INSERT INTO arquivo(id_requerimento, descricao, nome, tipo, tamanho, dados_arquivo)
        //VALUES ($id_requerimento,'$nome_imagem', '$nome', '$tipo', '$tamanho', decode('{$dados_arquivo}' , 'hex'));";
        $sql = "UPDATE arquivo SET nome = $nome, dados_arquivo = decode('{$dados_arquivo}' , 'hex') WHERE id_requerimento = $id_requerimento";

        $result = pg_query($conn_imagem, $sql);
    }
    */

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