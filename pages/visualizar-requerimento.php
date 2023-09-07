<?php
require 'header.php';

$id_requerimento = filter_input(INPUT_GET, "visualizar", FILTER_SANITIZE_NUMBER_INT);

function facaLogin($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
}

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $_SESSION["realizar_login"] = "visualizar-requerimento";
    facaLogin();
    die();
}

if (empty($id_requerimento)) {
    $_SESSION["crud_requerimento"] = "visualizar_id";
    include 'mensagens.php';
    die();
}

require '../database/conexao.php';

$sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE id_requerimento = ? AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_requerimento, $id_usuario]);
$rowRequeriemento = $stmt->fetch();
$cont =  $stmt->rowCount();

if ($cont == 0) {
    $_SESSION["id_requerimento_inexistente"] = true;
    include 'mensagens.php';
    die();
}

$sql = "SELECT dados_arquivo, nome FROM arquivo a INNER JOIN requerimento r
ON a.id_requerimento = r.id_requerimento
WHERE a.id_requerimento = $id_requerimento AND r.id_usuario = $id_usuario";

$result = pg_query($conn_imagem, $sql);
$dados = pg_fetch_assoc($result);

require 'navbar.php';
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
                        <textarea readonly class="form-control" id="descricao" style="height: 150px" name="descricao"><?= $rowRequeriemento['descricao'] ?></textarea>
                    </div>

                    <?php
                    if (pg_num_rows($result) > 0){
                    ?>
                        <div class="col-12 mt-4">
                            <button type="button" class="d-block mx-auto w-25 btn btn-primary rounded-pill px-3 btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">
                                Abrir imagem
                            </button>
                        </div>

                        <div class="modal fade m-0 ps-0" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header py-1">
                                        <h3 class="d-block mx-auto cor_tema"><?= $dados["nome"]?></h3>
                                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="mostrar-imagem.php?requerimento=<?= $id_requerimento ?>" alt="Imagem: <?= $dados["nome"]?>" class="d-block h-100 mx-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="mt-4 col-12 row">
                        <div class="col-md-6 mb-3">
                            <a class="w-100 btn btn-secondary rounded-pill px-3 btn-lg" href="historico.php">Voltar ao histórico</a>
                        </div>
                        <div class="col-md-6">
                            <form action="editar-requerimento.php" method="GET" class="form my-auto">
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