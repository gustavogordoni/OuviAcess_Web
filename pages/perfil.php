<?php
require 'header.php';

function facaLogin($pagina = null){
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
}

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $_SESSION["realizar_login"] = "perfil";
    facaLogin();
    die();
}

require '../database/conexao.php';

$sql = "SELECT nome, ddd, telefone, email, senha FROM usuario WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usuario]);
$rowUsuario = $stmt->fetch();
$cont =  $stmt->rowCount();

require 'navbar.php';
?>

<div class="container">
    <main>
        <div class="py-3 text-center mt-4">
            <strong>
                <h2>Olá <strong><?= $rowUsuario['nome'] ?></strong></h2>
            </strong>
        </div>

        <div class="row">
            <div class="col-11 mx-auto mb-4">
                <div class="row g-3 cor_tema">
                    <div class="col-md-12">
                        <label for="titulo" class="form-label"><strong>Nome completo: </strong></label>
                        <input readonly type="text" class="form-control" id="titulo" value="<?= $rowUsuario['nome'] ?>" name="titulo">
                    </div>

                    <div class="col-md-3">
                        <label for="tipo" class="form-label"><strong>DDD:</strong></label>
                        <input readonly type="text" class="form-control" id="tipo" value="<?= $rowUsuario['ddd'] ?>" name="tipo">
                    </div>

                    <div class="col-md-9">
                        <label for="bairro" class="form-label"><strong>Telefone: </strong></label>
                        <input readonly type="text" class="form-control" id="bairro" name="bairro" value="<?= $rowUsuario['telefone'] ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="rua" class="form-label"><strong>E-mail: </strong></label>
                        <input readonly type="text" class="form-control" id="rua" name="rua" value="<?= $rowUsuario['email'] ?>">
                    </div>
                  
                    <div class="mt-4 col-12 row">
                        <div class="col-md-6 mb-3">
                            <a class="w-100 btn btn-secondary rounded-pill px-3 btn-lg" href="inicio.php">Voltar ao início</a>
                        </div>
                        <div class="col-md-6">
                            <form action="editar-perfil.php" method="POST" class="form my-auto">
                                <button class="w-100 btn btn-primary rounded-pill px-3 btn-lg" type="submit" value="<?= $id_usuario ?>" name="editar">
                                    Alterar informações do perfil
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
</div>

<?php
require 'footer.php';
require 'js.php';
?>