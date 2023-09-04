<?php
require 'header.php';

$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
$anonimo = filter_input(INPUT_POST, "anonimo", FILTER_SANITIZE_SPECIAL_CHARS);

$descricao = filter_input(INPUT_POST, "nome_imagem");

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $id_usuario = null;
    $anonimo = true;
    echo $anonimo;
}

if (empty($anonimo)) {
    $anonimo = false;
    echo $anonimo;
}

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "historico.php";
    }
    header("Location: " . $pagina);
}
function campoIncompleto($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "requerimento.php";
    }
    header("Location: " . $pagina);
}

// CAMPO NÃO PREENCHIDO
if (
    empty($titulo) ||
    empty($tipo) ||
    empty($cidade) ||
    empty($cep) ||
    empty($bairro) ||
    empty($rua) ||
    empty($descricao) ||
    ($anonimo != true && $anonimo != false)
) {
    $_SESSION["titulo_requerimento"] = $titulo;
    $_SESSION["tipo_requerimento"] = $tipo;
    $_SESSION["cidade_requerimento"] = $cidade;
    $_SESSION["cep_requerimento"] = $cep;
    $_SESSION["bairro_requerimento"] = $bairro;
    $_SESSION["rua_requerimento"] = $rua;
    $_SESSION["descricao_requerimento"] = $descricao;
    $_SESSION["anonimo_requerimento"] = $anonimo;

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
        campoIncompleto();
        die();
    }

    if (empty($titulo)) {
        $_SESSION["error_requerimento"] = "titulo";
        $_SESSION["titulo_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($tipo)) {
        $_SESSION["error_requerimento"] = "tipo";
        $_SESSION["tipo_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($cidade)) {
        $_SESSION["error_requerimento"] = "cidade";
        $_SESSION["cidade_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($cep)) {
        $_SESSION["error_requerimento"] = "cep";
        $_SESSION["cep_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($bairro)) {
        $_SESSION["error_requerimento"] = "bairro";
        $_SESSION["bairro_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($rua)) {
        $_SESSION["error_requerimento"] = "rua";
        $_SESSION["rua_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if (empty($descricao)) {
        $_SESSION["error_requerimento"] = "descricao";
        $_SESSION["descricao_requerimento"] = null;
        campoIncompleto();
        die();
    }
    if ($anonimo != true && $anonimo != false) {
        $_SESSION["error_requerimento"] = "anonimo";
        $_SESSION["anonimo_requerimento"] = null;
        campoIncompleto();
        die();
    }
}

$situacao = "Em andamento";
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');

if ($anonimo == false) {
    // ENVIO NÃO ANONIMO
    require '../database/conexao.php';
    $sql = "INSERT INTO requerimento(id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_usuario, $titulo, $tipo, $situacao, $data, $descricao, $cep, $cidade, $bairro, $rua]);

} elseif ($anonimo == true) {
    // ENVIO ANONIMO
    require '../database/conexao.php';
    $sql = "INSERT INTO requerimento(titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua) VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$titulo, $tipo, $situacao, $data, $descricao, $cep, $cidade, $bairro, $rua]);
}

if ($result == true) {
    // SUCESSO NA GRAVAÇÃO DO REQUERIMENTO
    if (!empty($_FILES['arquivo']['name'])) {
        // HÁ IMAGEM PARA ENVIAR

        $nome = $_FILES['arquivo']['name'];
        $tamanho = $_FILES['arquivo']['size'];
        $tipo = $_FILES['arquivo']['type'];
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        // Read in a binary file
        $data = file_get_contents($_FILES['arquivo']['tmp_name']);
        // Escape the binary data
        $dados_arquivo = bin2hex($data);

        $sql = "INSERT INTO arquivo(descricao, nome, tipo, tamanho, dados_arquivo)
        VALUES ('$descricao', '$nome', '$tipo', '$tamanho', decode('{$dados_arquivo}' , 'hex'));";

        $result = pg_query($conn_imagem, $sql);

        if ($result == true) {
            $_SESSION["add_requerimento"] = true;
            redireciona();
            die();
        }
    } elseif (empty($_FILES['arquivo']['name'])) {
        // NÃO HÁ IMAGEM PARA ENVIAR
        $_SESSION["add_requerimento"] = true;
        redireciona();
        die();
    }
} else {
    $errorArray = $stmt->errorInfo();
?>
    <div class="alert alert-danger alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <strong>FALHA</strong> ao efetuar a gravação dos dodos requerimento<br>
        <p><?= $errorArray[2]; ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

include 'js.php'; ?>