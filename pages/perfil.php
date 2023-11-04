<?php
include 'header.php';

if (autenticado()) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!autenticado()) {
    $_SESSION["realizar_login"] = "perfil";
    redireciona("login.php");
    die();
}

require '../database/conexao.php';

$sql = "SELECT nome, ddd, telefone, email, senha FROM usuario WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usuario]);
$rowUsuario = $stmt->fetch();
$cont =  $stmt->rowCount();

$nome = explode(' ', $rowUsuario['nome']);
$firstName = $nome[0];

require 'navbar.php';
?>

<div class="container h-75">
    <main>
        <div class="py-3 text-center mt-4">
            <strong>
                <h2>Informações do seu perfil <strong> <br><?= $firstName ?></strong></h2>
            </strong>
        </div>

        <div class="row">
            <div class="col-11 mx-auto mb-4">
                <div class="row g-3">
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

                    <div class="col-12">
                        <label for="email" class="form-label"><strong>E-mail: </strong></label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input readonly type="email" class="form-control" id="email" name="email" value="<?= $rowUsuario['email'] ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mt-4 col-12 row">
                        <div class="col-md-6 mb-3">
                            <a class="w-100 btn btn-secondary rounded-pill px-3 btn-lg" href="inicio.php">Voltar ao início</a>
                        </div>
                        <div class="col-md-6">
                            <a href="editar-perfil.php" class="w-100 btn btn-warning rounded-pill px-3 btn-lg" value="<?= $id_usuario ?>">
                                Alterar informações do perfil
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
</div>

<?php
require 'footer.php';
include 'mensagens.php';
require 'js.php';
?>