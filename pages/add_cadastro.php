<?php
require 'header.php';

require '../database/conexao.php';

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$ddd = filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
$confirme = filter_input(INPUT_POST, "confirme", FILTER_SANITIZE_SPECIAL_CHARS);

function redireciona($pagina = null){
    if (empty($pagina)) {
        $pagina = "cadastro.php";
    }
    header("Location: " . $pagina);
}

if (empty($nome)) {
    $_SESSION["error_cadastro"] = "nome";
    include 'mensagens.php';
    die();
}
if (empty($ddd)) {
    $_SESSION["error_cadastro"] = "ddd";
    include 'mensagens.php';
    die();
}
if (empty($telefone)) {
    $_SESSION["error_cadastro"] = "telefone";
    include 'mensagens.php';
    die();
}
if (empty($email)) {
    $_SESSION["error_cadastro"] = "email";
    include 'mensagens.php';
    die();
}
if (empty($senha)) {
    $_SESSION["error_cadastro"] = "senha";
    include 'mensagens.php';
    die();
}
if (empty($confirme)) {
    $_SESSION["error_cadastro"] = "confirme";
    include 'mensagens.php';
    die();
}

//$senha_hash = password_hash($senha, PASSWORD_BCRYPT);
$senha_hash = $senha;

$sql = "INSERT INTO Usuario(nome, ddd, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $ddd, $telefone, $email, $senha_hash]);


if ($result == true) {
    function cadastroLogin($pagina = null){
        if (empty($pagina)) {
            $pagina = "verificar-login.php";
        }
        header("Location: " . $pagina);
    }

    $_SESSION["add_cadastro"] = true;
    $_SESSION["email"] = $email;
    $_SESSION["senha_hash"] = $senha_hash;
    cadastroLogin();
    die();

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
require 'js.php';
?>