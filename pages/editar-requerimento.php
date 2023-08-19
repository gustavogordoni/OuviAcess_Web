<?php
include 'header.php';
include 'navbar.php';

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

require '../database/conexao.php';

$sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE id_requerimento = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id]);

$rowRequeriemento = $stmt->fetch();

$cont =  $stmt->rowCount();

if (empty($id)) {
?>
    <div class="alert alert-danger d-flex h-100 mb-0" role="alert">
        <div class="mx-auto text-center my-auto">
            <h2>FALHA ao abrir os detalhes do requerimento</h2>
            <p>ID do Requerimento informado não é válido</p>
        </div>
    </div>
<?php
    exit;
} elseif ($cont == 0) {
?>
    <div class="alert alert-danger d-flex h-100  mb-0" role="alert">
        <div class="mx-auto text-center my-auto ">
            <h2>FALHA ao abrir os detalhes do Requerimento</h2>
            <p>Não foi econtrado nenhum Requerimento com o ID = <?= $id ?></p>
        </div>
    </div>
<?php
    exit;
}
?>

<div class="container mx-auto">
    <main>
        <div class="py-3 text-center mt-4">
            <!--
  <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bank d-block mx-auto mb-3" viewBox="0 0 16 16">
                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg>
  -->
            <strong>
                <h2>Altere as informações desejadas</h2>
            </strong>
            <!--
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    -->
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

                    <div class="col-12 text-center">
                        <a class="btn btn-outline-info" href="historico.php">Voltar ao histórico</a>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php';
    include 'js.php';
    ?>