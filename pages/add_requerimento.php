<?php
require 'header.php';

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} else {
    $id_usuario = null;
    $anonimo = true;
}

require '../database/conexao.php';

$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$imagem = filter_input(INPUT_POST, "imagem", FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
$anonimo = filter_input(INPUT_POST, "anonimo", FILTER_SANITIZE_SPECIAL_CHARS);

$situacao = "Em andamento";
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');


if (isset($titulo, $tipo, $cidade, $cep, $bairro, $rua, $descricao)) {

    $sql = "INSERT INTO requerimento(id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_usuario, $titulo, $tipo, $situacao, $data, $descricao, $cep, $cidade, $bairro, $rua]);
    echo "CAI NO IF";
}

if ($result == true || isset($result)) {
?>
    <div class="alert alert-success alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        Dados do requerimento gravados com <strong>SUCESSO</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
<?php
    //header("Location: historico.php");
} else{
    $errorArray = $stmt->errorInfo();
?>
    <div class="alert alert-danger alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <strong>FALHA</strong> ao efetuar a gravação dos dodos <br>
        <p><?= $errorArray[2]; ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

include 'js.php'; ?>