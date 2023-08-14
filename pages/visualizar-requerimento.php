<?php 
    require 'header.php';
    require 'navbar.php';

    $id = filter_input (INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    require '../database/conexao.php';

    $sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE id_requerimento = ?";

    $stmt = $conn -> prepare($sql);
    $result = $stmt -> execute([$id]);

    $rowRequeriemento = $stmt -> fetch();

    $cont =  $stmt -> rowCount();

    if(empty($id)){
        ?>
            <div class="alert alert-danger d-flex h-100 mb-0" role="alert">
            <div class="mx-auto text-center my-auto">
                <h2>FALHA ao abrir os detalhes do requerimento</h2>
                <p>ID do Requerimento informado não é válido</p>
            </div>
        </div>   
        <?php
        exit;

    }elseif($cont == 0){
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

<div class="container">
    <main>
    <div class="py-3 text-center mt-4">
        <strong>
            <h2>Detalhes do Requerimento <br> ID: <?= $id ?></h2>
        </strong>
    </div>

    <div class="row mb-4">
        <div class="col-12 mx-auto my-auto">                
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
</div>

<?php require 'footer.php';?>