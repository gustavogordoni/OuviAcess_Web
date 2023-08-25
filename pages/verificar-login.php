<?php

include 'header.php';
require '../database/conexao.php';

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT id_usuario, nome, email, senha, ddd, telefone FROM usuario WHERE email = ? AND senha = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email, $senha]);
$row = $stmt->fetch();
$cont =  $stmt->rowCount();

/*
if ($cont == 0) {
?>
    <div class="alert alert-danger d-flex h-100 mb-0" role="alert">
        <div class="mx-auto text-center my-auto">
            <h2>FALHA ao sincronizar os dados de Login</h2>
            <p>Não foi possível encontrar o E-mail: <?= $email ?><br> ou a senha informada</p>
        </div>
    </div>
<?php
exit;

    //header("Location: login.php");
} elseif ($result == true && $cont >= 1) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="text-center">Seja bem-vindo <?= $row["nome"] ?></h4>
        <a href="historico.php" class="btn btn-danger"></a>
    </div>
<?php
    //header("Location: home.php");
}

if ($email == $row["email"] && $senha == $row["senha"]) {
*/
if ($result == true && $cont >= 1) {
    //DEU CERTO
    $_SESSION["email"] = $email;
    $_SESSION["id_usuario"] = $row["id_usuario"];
?>
    <div class="alert alert-success text-center" role="alert">
        <h4 class="text-center">Seja bem-vindo <?= $row["nome"] ?></h4>
        <a href="historico.php" class="btn btn-danger">HISTORICO</a>
    </div>
<?php
} elseif ($cont == 0) {
    //NÂO DEU CERTO
    unset($_SESSION["email"]);
    unset($_SESSION["nome"]);
?>
    <div class="alert alert-danger d-flex h-100 mb-0" role="alert">
        <div class="mx-auto text-center my-auto">
            <h2>FALHA ao sincronizar os dados de Login</h2>
            <p>Não foi possível encontrar o E-mail: <?= $email ?><br> ou a senha informada</p>
        </div>
    </div>
<?php

    //header("Location: login.php");
}

echo '<div class="text-center">';
echo "<h5><b>ID:</b>" .  $row["id_usuario"] . "</h5>";
echo "<h5><b>Nome:</b>" .  $row["nome"] . "</h5>";
echo "<h5><b>Email:</b>" .  $row["email"] . "</h5>";
echo "<h5><b>Senha:</b>" .  $row["senha"] . "</h5>";
echo "<h5><b>ddd:</b>" .  $row["ddd"] . "</h5>";
echo "<h5><b>Telefone:</b>" .  $row["telefone"] . "</h5>";
echo '</div>';

include 'js.php';
?>