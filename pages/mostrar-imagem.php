<?php
require_once '../database/conexao.php';

$id_requerimento = filter_input(INPUT_GET, "id");

$sql = "SELECT dados_arquivo FROM arquivo WHERE id_requerimento = $id_requerimento";
$result = pg_query($conn_imagem, $sql);
$dados = pg_fetch_assoc($result);
$dados_arquivo = $dados["dados_arquivo"];
echo pg_unescape_bytea($dados_arquivo);