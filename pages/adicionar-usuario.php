<?php
require 'header.php';


$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$ddd = filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
$confirme = filter_input(INPUT_POST, "confirme", FILTER_SANITIZE_SPECIAL_CHARS);

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "cadastro-usuario.php";
    }
    header("Location: " . $pagina);
}

function campoIncompleto($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "cadastro-usuario.php";
    }
    header("Location: " . $pagina);
}

// CAMPO NÃO PREENCHIDO
$_SESSION["nome_cadastro"] = $nome;
$_SESSION["ddd_cadastro"] = $ddd;
$_SESSION["telefone_cadastro"] = $telefone;
$_SESSION["email_cadastro"] = $email;
if (
    empty($nome) ||
    empty($ddd) ||
    empty($telefone) ||
    empty($email) ||
    empty($senha) ||
    empty($confirme)
) {

    if (
        empty($nome) &&
        empty($ddd) &&
        empty($telefone) &&
        empty($email) &&
        empty($senha) &&
        empty($confirme)
    ) {
        $_SESSION["error_cadastro"] = "acesso_url";
        campoIncompleto();
        die();
    }

    if (empty($nome)) {
        $_SESSION["error_cadastro"] = "nome";
        $_SESSION["nome_cadastro"] = null;
        campoIncompleto();
        die();
    }
    if (empty($ddd)) {
        $_SESSION["error_cadastro"] = "ddd";
        $_SESSION["ddd_cadastro"] = null;
        campoIncompleto();
        die();
    }
    if (empty($telefone)) {
        $_SESSION["error_cadastro"] = "telefone";
        $_SESSION["telefone_cadastro"] = null;
        campoIncompleto();
        die();
    }
    if (empty($email)) {
        $_SESSION["error_cadastro"] = "email";
        $_SESSION["email_cadastro"] = null;
        campoIncompleto();
        die();
    }
    if (empty($senha)) {
        $_SESSION["error_cadastro"] = "senha";
        campoIncompleto();
        die();
    }
    if (empty($confirme)) {
        $_SESSION["error_cadastro"] = "confirme";
        campoIncompleto();
        die();
    }
}

require '../database/conexao.php';

$sql = "SELECT id_usuario, email FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email]);
$rowEmail = $stmt->fetch();
$cont = $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["error_cadastro"] = "email_inexistente";
    $_SESSION["email_cadastro"] = null;
    campoIncompleto();
    die();
}

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

$sql = "INSERT INTO Usuario(nome, ddd, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $ddd, $telefone, $email, $senha_hash]);


if ($result == true) {
    function cadastroLogin($pagina = null)
    {
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