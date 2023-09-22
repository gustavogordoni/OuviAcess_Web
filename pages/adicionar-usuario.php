<?php
require 'header.php';

$nome = trim(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS));
$ddd = trim(filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_SPECIAL_CHARS));
$telefone = trim(filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$senha = trim(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS));
$confirme = trim(filter_input(INPUT_POST, "confirme", FILTER_SANITIZE_SPECIAL_CHARS));

function redireciona($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "cadastro-usuario.php";
    }
    header("Location: " . $pagina);
}

function validacaoUsuario($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "cadastro-usuario.php";
    }
    header("Location: " . $pagina);
}

///////////////////////////////////// VALIDAÇÕES /////////////////////////////////////
$_SESSION["nome_cadastro"] = $nome;
$_SESSION["ddd_cadastro"] = $ddd;
$_SESSION["telefone_cadastro"] = $telefone;
$_SESSION["email_cadastro"] = $email;

/// TUDO VAZIO - ACESSO POR URL

if (
    empty($nome) &&
    empty($ddd) &&
    empty($telefone) &&
    empty($email) &&
    empty($senha) &&
    empty($confirme)
) {
    $_SESSION["error_cadastro"] = "acesso_url";
    validacaoUsuario();
    die();
}

/// NOME
if (empty($nome)) {
    $_SESSION["error_cadastro"] = "nome";
    $_SESSION["nome_cadastro"] = null;
    validacaoUsuario();
    die();
} elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $nome)) {
    $_SESSION["caracteres_cadastro"] = "nome_inadequado";
    $_SESSION["nome_cadastro"] = null;
    $_SESSION["caracteres"] = null;
    validacaoUsuario();
    die();
} elseif (strlen($nome) < 4) {
    $_SESSION["caracteres_cadastro"] = "nome_pequeno";
    $_SESSION["caracteres"] = strlen($nome);
    validacaoUsuario();
    die();
} elseif (strlen($nome) > 150) {
    $_SESSION["caracteres_cadastro"] = "nome_grande";
    $_SESSION["caracteres"] = strlen($nome);
    validacaoUsuario();
    die();
}

/// DDD 
if (empty($ddd)) {
    $_SESSION["error_cadastro"] = "ddd";
    $_SESSION["ddd_cadastro"] = null;
    validacaoUsuario();
    die();
} elseif (!preg_match('/^\([0-9]{2}\)$/', $ddd)) {
    $_SESSION["caracteres_cadastro"] = "ddd_inadequado";
    $_SESSION["ddd_cadastro"] = null;
    $_SESSION["caracteres"] = null;
    validacaoUsuario();
    die();
}

/// TELEFONE
if (empty($telefone)) {
    $_SESSION["error_cadastro"] = "telefone";
    $_SESSION["telefone_cadastro"] = null;
    validacaoUsuario();
    die();
} elseif (!preg_match('/^[0-9]{4,6}-[0-9]{3,4}$/', $telefone)) {
    $_SESSION["caracteres_cadastro"] = "telefone_inadequado";
    $_SESSION["telefone_cadastro"] = null;
    $_SESSION["caracteres"] = null;
    validacaoUsuario();
    die();
}

/// EMAIL
if (empty($email)) {
    $_SESSION["error_cadastro"] = "email";
    $_SESSION["email_cadastro"] = null;
    validacaoUsuario();
    die();
} elseif (strlen($email) < 7) {
    $_SESSION["caracteres_cadastro"] = "email_pequeno";
    $_SESSION["caracteres"] = strlen($email);
    validacaoUsuario();
    die();
} elseif (strlen($email) > 150) {
    $_SESSION["caracteres_cadastro"] = "email_grande";
    $_SESSION["caracteres"] = strlen($email);
    validacaoUsuario();
    die();
}

/// SENHA
if (empty($senha)) {
    $_SESSION["error_cadastro"] = "senha";
    validacaoUsuario();
    die();
}
/// CONFIRME
if (empty($confirme)) {
    $_SESSION["error_cadastro"] = "confirme";
    validacaoUsuario();
    die();
}
/// CONFIRMAÇÃO DA SENHA - ESTÃO IGUAIS
if ($senha != $confirme) {
    $_SESSION["caracteres_cadastro"] = "senhas_diferentes";
    validacaoUsuario();
    die();
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
    validacaoUsuario();
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
    $_SESSION["senha"] = $senha;
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