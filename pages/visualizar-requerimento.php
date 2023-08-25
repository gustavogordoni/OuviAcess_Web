<?php
require 'header.php';
require 'navbar.php';

$id_requerimento = filter_input(INPUT_POST, "visualizar", FILTER_SANITIZE_NUMBER_INT);

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} else {
?>
    <div class="row cor_tema d-flex align-items-center">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Efetue sua autenticação para ter acesso ao seu histórico de requerimentos</h2>
            <h2><a href="login.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Faça Login</a></h2>

        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/identifique-se.png" alt="" width="80%">
        </div>
    </div>
<?php
    exit;
}

require '../database/conexao.php';

$sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua, imagem FROM requerimento WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_requerimento, $id_usuario]);
$rowRequeriemento = $stmt->fetch();
$cont =  $stmt->rowCount();

if (empty($id_requerimento)) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger">O valor do identificador de um requerimento não foi instanciado</h2>
            <p>Retorne à página de histórico e selecione um requerimento para visualizar seus detalhes</p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Acessar histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>

    </div>
<?php
    exit;
} elseif ($cont == 0) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao buscar pelo requerimento</h1>
            <p class="fs-5s">Não foi econtrado nenhum requerimento com o ID = <?= $id_requerimento ?></p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Retornar ao histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    <?php
    exit;
}
    ?>

    <div class="container">
        <main>
            <div class="py-3 text-center mt-4">
                <strong>
                    <h2>Detalhes do Requerimento <br> ID: <?= $id_requerimento ?></h2>
                </strong>
            </div>

            <div class="row">
                <div class="col-11 mx-auto mb-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="titulo" class="form-label"><strong>Título do requerimento: </strong></label>
                            <input readonly type="text" class="form-control" id="titulo" value="<?= $rowRequeriemento['titulo'] ?>" name="titulo">
                        </div>

                        <div class="col-md-4">
                            <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                            <input readonly type="text" class="form-control" id="tipo" value="<?= $rowRequeriemento['tipo'] ?>" name="tipo">
                        </div>

                        <div class="col-md-8">
                            <label for="bairro" class="form-label"><strong>Situação: </strong></label>
                            <input readonly type="text" class="form-control" id="bairro" name="bairro" value="<?= $rowRequeriemento['situacao'] ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="rua" class="form-label"><strong>Data: </strong></label>
                            <input readonly type="text" class="form-control" id="rua" name="rua" value="<?= $rowRequeriemento['data'] ?>">
                        </div>

                        <div class="col-md-8">
                            <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
                            <input readonly type="text" class="form-control" id="cidade" name="cidade" value="<?= $rowRequeriemento['cidade'] ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="cep" class="form-label"><strong>CEP: </strong></label>
                            <input readonly type="text" class="form-control" id="cep" name="cep" value="<?= $rowRequeriemento['cep'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
                            <input readonly type="text" class="form-control" id="bairro" name="bairro" value="<?= $rowRequeriemento['bairro'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="rua" class="form-label"><strong>Rua: </strong></label>
                            <input readonly type="text" class="form-control" id="rua" name="rua" value="<?= $rowRequeriemento['rua'] ?>">
                        </div>

                        <div class="col-12">
                            <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
                            <textarea class="form-control" id="descricao" style="height: 150px" name="descricao"><?= $rowRequeriemento['descricao'] ?></textarea>
                        </div>

                        <?php
                        if (empty($rowRequeriemento['descricao'])) {
                        ?>
                            <div class="col-12">
                                <!-- ABRIR IMAGEM -->
                            </div>

                        <?php
                        } ?>

                        <div class="mt-4 col-12 row">
                            <div class="col-md-6 mb-3">
                                <a class="w-100 btn btn-secondary rounded-pill px-3 btn-lg" href="historico.php">Voltar ao histórico</a>
                            </div>
                            <div class="col-md-6">
                                <form action="editar-requerimento.php" method="POST" class="form my-auto">
                                    <button class="w-100 btn btn-warning rounded-pill px-3 btn-lg" type="submit" value="<?= $id_requerimento ?>" name="editar">
                                        Alterar informações
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