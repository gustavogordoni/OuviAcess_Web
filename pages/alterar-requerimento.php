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

function validacaoEditar($id_requerimento)
{
    $editar = "editar-requerimento.php?editar=";
    header("Location: " . $editar . $id_requerimento);
}

$titulo = trim(filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS));
$tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = trim(filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS));
$cep = trim(filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS));
$bairro = trim(filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS));
$rua = trim(filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS));
$descricao = trim(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS));


///////////////////////////////////// VALIDAÇÕES /////////////////////////////////////

/// TUDO VAZIO - ACESSO POR URL
if (
    empty($titulo) &&
    empty($tipo) &&
    empty($cidade) &&
    empty($cep) &&
    empty($bairro) &&
    empty($rua) &&
    empty($descricao) &&
    empty($anonimo)
) {
    $_SESSION["error_requerimento"] = "acesso_url";
    validacaoEditar($id_requerimento);
    die();
}

/// TITULO
if (empty($titulo)) {
    $_SESSION["error_requerimento"] = "titulo";
    validacaoEditar($id_requerimento);
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $titulo)) {
    $_SESSION["caracteres_requerimento"] = "titulo_inadequado";
    $_SESSION["caracteres"] = strlen($titulo);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($titulo) < 10) {
    $_SESSION["caracteres_requerimento"] = "titulo_pequeno";
    $_SESSION["caracteres"] = strlen($titulo);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($titulo) > 250) {
    $_SESSION["caracteres_requerimento"] = "titulo_grande";
    $_SESSION["caracteres"] = strlen($titulo);
    validacaoEditar($id_requerimento);
    die();
}

/// TIPO
if (empty($tipo)) {
    $_SESSION["error_requerimento"] = "tipo";
    validacaoEditar($id_requerimento);
    die();
} elseif ($tipo != "Denúncia" && $tipo != "Sugestão") {
    $_SESSION["caracteres_requerimento"] = "tipo_invalido";
    $_SESSION["caracteres"] = $tipo;
    validacaoEditar($id_requerimento);
    die();
}

/// CIDADE
if (empty($cidade)) {
    $_SESSION["error_requerimento"] = "cidade";
    validacaoEditar($id_requerimento);
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $cidade)) {
    $_SESSION["caracteres_requerimento"] = "cidade_inadequada";
    $_SESSION["caracteres"] = strlen($cidade);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($cidade) < 3) {
    $_SESSION["caracteres_requerimento"] = "cidade_pequeno";
    $_SESSION["caracteres"] = strlen($cidade);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($cidade) > 250) {
    $_SESSION["caracteres_requerimento"] = "cidade_grande";
    $_SESSION["caracteres"] = strlen($cidade);
    validacaoEditar($id_requerimento);
    die();
}

/// CEP
if (empty($cep)) {
    $_SESSION["error_requerimento"] = "cep";
    validacaoEditar($id_requerimento);
    die();
} elseif (!preg_match('/^\d{2}\.\d{3}-\d{3}$/', $cep)) {
    $_SESSION["caracteres_requerimento"] = "cep_inadequado";
    $_SESSION["caracteres"] = $cep;
    validacaoEditar($id_requerimento);
    die();
}

/// BAIRRO
if (empty($bairro)) {
    $_SESSION["error_requerimento"] = "bairro";
    validacaoEditar($id_requerimento);
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ0-9\s]+$/', $bairro)) {
    $_SESSION["caracteres_requerimento"] = "bairro_inadequado";
    $_SESSION["caracteres"] = strlen($bairro);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($bairro) < 3) {
    $_SESSION["caracteres_requerimento"] = "bairro_pequeno";
    $_SESSION["caracteres"] = strlen($bairro);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($bairro) > 250) {
    $_SESSION["caracteres_requerimento"] = "bairro_grande";
    $_SESSION["caracteres"] = strlen($bairro);
    validacaoEditar($id_requerimento);
    die();
}

/// RUA
if (empty($rua)) {
    $_SESSION["error_requerimento"] = "rua";
    validacaoEditar($id_requerimento);
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ0-9\s]+$/', $rua)) {
    $_SESSION["caracteres_requerimento"] = "rua_inadequada";
    $_SESSION["caracteres"] = strlen($rua);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($rua) < 2) {
    $_SESSION["caracteres_requerimento"] = "rua_pequena";
    $_SESSION["caracteres"] = strlen($rua);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($rua) > 250) {
    $_SESSION["caracteres_requerimento"] = "rua_grande";
    $_SESSION["caracteres"] = strlen($rua);
    validacaoEditar($id_requerimento);
    die();
}

/// DESCRIÇÃO
if (empty($descricao)) {
    $_SESSION["error_requerimento"] = "descricao";
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($descricao) < 50) {
    $_SESSION["caracteres_requerimento"] = "descricao_pequena";
    $_SESSION["caracteres"] = strlen($descricao);
    validacaoEditar($id_requerimento);
    die();
} elseif (strlen($descricao) > 2000) {
    $_SESSION["caracteres_requerimento"] = "descricao_grande";
    $_SESSION["caracteres"] = strlen($descricao);
    validacaoEditar($id_requerimento);
    die();
}


require '../database/conexao.php';

$sql = "UPDATE requerimento SET titulo = ?, tipo = ?, cidade = ?, cep = ?, bairro = ?, rua = ?, descricao = ?  WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$titulo, $tipo, $cidade, $cep, $bairro, $rua, $descricao, $id_requerimento, $id_usuario]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {

    if (!empty($_FILES['arquivo']['tmp_name'])) {

        $nome = $_FILES['arquivo']['name'];
        $tamanho = $_FILES['arquivo']['size'];
        $tipo = $_FILES['arquivo']['type'];
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        // Read in a binary file
        $data = file_get_contents($_FILES['arquivo']['tmp_name']);
        // Escape the binary data
        $dados_arquivo = bin2hex($data);

        $sql = "UPDATE arquivo a
        SET nome = '$nome', dados_arquivo = decode('{$dados_arquivo}', 'hex')
        WHERE id_requerimento = $id_requerimento AND EXISTS (
            SELECT 1 FROM requerimento r WHERE r.id_requerimento = a.id_requerimento AND r.id_usuario = $id_usuario
        )";

        $result = pg_query($conn_imagem, $sql);
    }

    $_SESSION["alterar_requerimento"] = true;
    redireciona();
    //include 'mensagens.php';
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