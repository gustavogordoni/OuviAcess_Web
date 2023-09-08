<?php
include 'header.php';

$id_requerimento = filter_input(INPUT_GET, "editar", FILTER_SANITIZE_NUMBER_INT);

/*
if (isset($_SESSION["error_requerimento"]) || isset($_SESSION["error_caracteres"])) {
    $rowRequeriemento['titulo'] = $_SESSION["titulo_requerimento"];
    $rowRequeriemento['tipo'] = $_SESSION["tipo_requerimento"];
    $rowRequeriemento['cidade'] = $_SESSION["cidade_requerimento"];
    $rowRequeriemento['cep'] = $_SESSION["cep_requerimento"];
    $rowRequeriemento['bairro'] = $_SESSION["bairro_requerimento"];
    $rowRequeriemento['rua'] = $_SESSION["rua_requerimento"];
    $rowRequeriemento['descricao'] = $_SESSION["descricao_requerimento"];
  
    unset($_SESSION["titulo_requerimento"]);
    unset($_SESSION["tipo_requerimento"]);
    unset($_SESSION["cidade_requerimento"]);
    unset($_SESSION["cep_requerimento"]);
    unset($_SESSION["bairro_requerimento"]);
    unset($_SESSION["rua_requerimento"]);
    unset($_SESSION["descricao_requerimento"]);
    unset($_SESSION["anonimo_requerimento"]);
  }
  */

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
    $_SESSION["realizar_login"] = "editar-requerimento";
    facaLogin();
    die();
}

if (empty($id_requerimento)) {
    $_SESSION["crud_requerimento"] = "editar_id";
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

if (isset($_SESSION["error_requerimento"]) || isset($_SESSION["error_caracteres"])) {
    include 'mensagens.php';
}

include 'navbar.php';
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
                <form class="needs-validation" action="alterar-requerimento.php" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <input type="hidden" name="alterar" id="alterar" value="<?= $id_requerimento ?>">

                            <label for="titulo" class="form-label" id="label_titulo"><strong>Título do requerimento: </strong></label>
                            <input type="text" class="form-control" required id="titulo" placeholder="Ex: Falta de rampas de acesso" name="titulo" value="<?= $rowRequeriemento['titulo'] ?>" pattern="[A-Za-zÀ-ÿ\s]+" title="Insira um título que contenha apenas letras. Nenhum outro tipo de caracter será válido" maxlength="250">
                            <div class="invalid-feedback">
                                Informe um título formado apenas por letras, tendo como mínimo de 10 caracteres.
                            </div>
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
                                } else { ?>
                                    <option value="">Escolha uma opção</option>
                                    <option value="Denúncia">Denúncia</option>
                                    <option value="Sugestão">Sugestão</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-8">
                            <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
                            <input type="text" class="form-control" required id="cidade" placeholder="Ex: Votuporanga" name="cidade" value="<?= $rowRequeriemento['cidade'] ?>" pattern="[A-Za-zÀ-ÿ\s]+">
                            <div class="invalid-feedback" maxlength="250">
                                Será aceito apenas letras, tendo como mínimo 3 caracteres.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="cep" class="form-label"><strong>CEP: </strong></label>
                            <input type="text" class="form-control" required id="cep" name="cep" value="<?= $rowRequeriemento['cep'] ?>" title="Digite o CEP no formato XX.XXX-XXX" placeholder="XX.XXX-XXX" pattern="\d{2}\.\d{3}-\d{3}" maxlength="10">
                            <div class="invalid-feedback">
                                Informe o CEP no formato XX.XXX-XXX
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
                            <input type="text" class="form-control" required id="bairro" placeholder="Ex: Centro" name="bairro" value="<?= $rowRequeriemento['bairro'] ?>" pattern="[A-Za-zÀ-ÿ0-9\s]+" maxlength="250">
                            <div class="invalid-feedback">
                                Informe um bairro válido
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="rua" class="form-label"><strong>Rua: </strong></label>
                            <input type="text" class="form-control" required id="rua" placeholder="Ex: Rua Amazonas" name="rua" value="<?= $rowRequeriemento['rua'] ?>" pattern="[A-Za-zÀ-ÿ0-9\s]+" maxlength="250">
                            <div class="invalid-feedback">
                                Informe uma rua válida
                            </div>
                        </div>

                        <div class="col-12 input-group mt-4">
                            <label class="input-group-text px-5" for="arquivo"><strong>Foto do local:</strong></label>
                            <input type="file" class="form-control" id="arquivo" accept="image/*" name="arquivo">
                        </div>

                        <div class="col-12">
                            <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
                            <textarea class="form-control" required placeholder="Insira uma descrição detalhada sobre o ambiente em discussão" id="descricao" style="height: 130px" name="descricao" max="1000"><?= $rowRequeriemento['descricao'] ?></textarea>
                            <div class="invalid-feedback">
                                Insira uma descrição, com no mínimo 50 caracteres, sobre o ambiente em discussão
                            </div>
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