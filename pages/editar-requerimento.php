<?php
include 'header.php';
include 'navbar.php';

$id_requerimento = filter_input(INPUT_POST, "editar", FILTER_SANITIZE_NUMBER_INT);

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

$sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_requerimento, $id_usuario]);
$rowRequeriemento = $stmt->fetch();
$cont =  $stmt->rowCount();

if (empty($id_requerimento)) {
?>
    <div class="row d-flex align-items-center ps-4">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger">O valor do identificador de um requerimento não foi instanciado</h2>
            <p>Retorne à página de histórico e selecione um requerimento para editar suas informações</p>
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

    <div class="container mx-auto">
        <main>
            <div class="py-3 text-center mt-4">
                <strong>
                    <h2>Altere as informações desejadas</h2>
                </strong>
            </div>

            <div class="row">
                <div class="col-11 mx-auto mb-4">
                    <form class="needs-validation" action="alterar-requerimento.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <input type="hidden" name="id_requerimento" id="id_requerimento" value="<?= $id_requerimento ?>">

                                <label for="titulo" class="form-label"><strong>Título do requerimento: </strong></label>
                                <input type="text" class="form-control" id="titulo" value="<?= $rowRequeriemento['titulo'] ?>" name="titulo">
                            </div>

                            <div class="col-md-4">
                                <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                                <select class="form-select" id="tipo" name="tipo">
                                    <?php
                                    if ($rowRequeriemento['tipo'] == "Denúncia") { ?>
                                        <option value="Denúncia">Denúncia</option>
                                        <option value="Sugestão">Sugestão</option>
                                    <?php
                                    } elseif ($rowRequeriemento['tipo'] == "Sugestão") { ?>
                                        <option value="Sugestão">Sugestão</option>
                                        <option value="Denúncia">Denúncia</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
                                <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $rowRequeriemento['cidade'] ?>">
                            </div>

                            <div class="col-md-4">
                                <label for="cep" class="form-label"><strong>CEP: </strong></label>
                                <input type="text" class="form-control" id="cep" name="cep" value="<?= $rowRequeriemento['cep'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
                                <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $rowRequeriemento['bairro'] ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="rua" class="form-label"><strong>Rua: </strong></label>
                                <input type="text" class="form-control" id="rua" name="rua" value="<?= $rowRequeriemento['rua'] ?>">
                            </div>

                            <div class="col-12">
                                <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
                                <textarea class="form-control" id="descricao" style="height: 150px" name="descricao"><?= $rowRequeriemento['descricao'] ?></textarea>
                            </div>


                            <div class="mt-5 col-12 row">
                                <div class="col-md-6 mb-3">
                                    <a class="w-100 btn btn-secondary rounded-pill px-3 btn-lg" href="historico.php">Voltar ao histórico</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="w-100 btn btn-primary btn-lg rounded-pill px-3" type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <?php
    include 'footer.php';
    include 'js.php';
    ?>