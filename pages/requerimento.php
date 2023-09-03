<?php
include 'header.php';
include 'navbar.php';

if (isset($_SESSION["error_requerimento"])) {
  $titulo = $_SESSION["titulo_requerimento"];
  $tipo = $_SESSION["tipo_requerimento"];
  $cidade = $_SESSION["cidade_requerimento"];
  $cep = $_SESSION["cep_requerimento"];
  $bairro = $_SESSION["bairro_requerimento"];
  $rua = $_SESSION["rua_requerimento"];
  $descricao = $_SESSION["descricao_requerimento"];
  $anonimo = $_SESSION["anonimo_requerimento"];

  unset($_SESSION["titulo_requerimento"]);
  unset($_SESSION["tipo_requerimento"]);
  unset($_SESSION["cidade_requerimento"]);
  unset($_SESSION["cep_requerimento"]);
  unset($_SESSION["bairro_requerimento"]);
  unset($_SESSION["rua_requerimento"]);
  unset($_SESSION["descricao_requerimento"]);
  unset($_SESSION["anonimo_requerimento"]);
}

?>

<div class="container mx-auto">
  <main>
    <div class="py-3 text-center mt-4">
      <strong>
        <h2>Informe os dados solicitados para <br> registrar seu requerimento no sistema</h2>
      </strong>

    </div>

    <div class="row">
      <div class="col-11 mx-auto">

        <form class="needs-validation" action="add_requerimento.php" method="POST" enctype="multipart/form-data">
          <div class="row g-3">

            <div class="col-md-8">
              <label for="titulo" class="form-label" id="label_titulo"><strong>Título do requerimento: </strong></label>
              <input type="text" class="form-control" required id="titulo" placeholder="Ex: Falta de rampas de acesso" name="titulo" value="<?php if(isset($titulo)){ echo $titulo; }?>" pattern="[A-Za-zÀ-ÿ\s]+" title="Insira um título que contenha apenas letras. Nenhum outro tipo de caracter será válido">
              <div class="invalid-feedback">
                Informe um título formado apenas por letras, tendo como mínimo de 10 caracteres.
              </div>
            </div>

            <div class="col-md-4">
              <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
              <select class="form-select" required id="tipo" name="tipo" title="Selecione um tipo de requerimento">
                <?php
                if (!isset($tipo) || empty($tipo)) { ?>
                  <option value="">Escolha uma opção</option>
                  <option value="Denúncia">Denúncia</option>
                  <option value="Sugestão">Sugestão</option>
                <?php
                }
                elseif (isset($tipo) && $tipo == "Denúncia") { ?>
                  <option value="Denúncia">Denúncia</option>
                  <option value="Sugestão">Sugestão</option>
                <?php
                } elseif (isset($tipo) && $tipo == "Sugestão") { ?>
                  <option value="Sugestão">Sugestão</option>
                  <option value="Denúncia">Denúncia</option>
                <?php
                }
                ?>
              </select>
              <div class="invalid-feedback">
                Selecione um tipo de requerimento
              </div>
            </div>

            <div class="col-md-8">
              <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
              <input type="text" class="form-control" required id="cidade" placeholder="Ex: Votuporanga" name="cidade" value="<?php if(isset($cidade)){ echo $cidade; }?>" pattern="[A-Za-zÀ-ÿ\s]+">
              <div class="invalid-feedback">
                Será aceito apenas letras, tendo como mínimo 3 caracteres.
              </div>
            </div>

            <div class="col-md-4">
              <label for="cep" class="form-label"><strong>CEP: </strong></label>
              <input type="text" class="form-control" required id="cep" name="cep" value="<?php if(isset($cep)){ echo $cep; }?>" title="Digite o CEP no formato XX.XXX-XXX" placeholder="XX.XXX-XXX" pattern="\d{2}\.\d{3}-\d{3}" maxlength="10">
              <div class="invalid-feedback">
                Informe o CEP no formato XX.XXX-XXX
              </div>
            </div>

            <div class="col-md-6">
              <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
              <input type="text" class="form-control" required id="bairro" placeholder="Ex: Centro" name="bairro" value="<?php if(isset($bairro)){ echo $bairro; }?>" pattern="[A-Za-zÀ-ÿ0-9\s]+">
              <div class="invalid-feedback">
                Informe um bairro válido
              </div>
            </div>

            <div class="col-md-6">
              <label for="rua" class="form-label"><strong>Rua: </strong></label>
              <input type="text" class="form-control" required id="rua" placeholder="Ex: Rua Amazonas" name="rua" value="<?php if(isset($rua)){ echo $rua; }?>" pattern="[A-Za-zÀ-ÿ0-9\s]+">
              <div class="invalid-feedback">
                Informe uma rua válida
              </div>
            </div>

            <div class="col-12 input-group mt-4">
              <label class="input-group-text" for="imagem"><strong>Foto do local:</strong></label>
              <input type="file" class="form-control" id="imagem" accept="image/*" name="imagem">
            </div>

            <div class="col-12">
              <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
              <textarea class="form-control" required placeholder="Insira uma descrição detalhada sobre o ambiente em discussão" id="descricao" style="height: 100px" name="descricao" max="1000"><?php if(isset($descricao)){ echo $descricao; }?></textarea>
              <div class="invalid-feedback">
                Insira uma descrição, com no mínimo 50 caracteres, sobre o ambiente em discussão
              </div>
            </div>

            <div class="col-12 form-check d-flex justify-content-center">
              <?php if (!isset($_SESSION["id_usuario"])) {
                $checked  = 'checked disabled';
              } elseif (isset($_SESSION["id_usuario"])) {
                $checked = 'value = "true" ';
              } elseif (isset($_SESSION["id_usuario"]) && $anonimo == true) {
                $checked = 'value = "true" checked';
              } ?>

              <input class="form-check-input" type="checkbox" id="anonimo" name="anonimo" <?= $checked ?>>
              <label class="form-check-label ms-1" for="anonimo">
                Enviar <strong>anonimamente</strong>
              </label>
            </div>

            <div class="mt-4 col-12 row">
              <div class="col-md-6 mb-3">
                <button class="w-100 btn btn-warning btn-lg rounded-pill px-3" type="reset">Limpar</button>
              </div>
              <div class="col-md-6">
                <button class="w-100 btn btn-primary btn-lg rounded-pill px-3" type="submit">Enviar</button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    <?php include '../js/script.js'; ?>
  </script>

  <?php
  include 'mensagens.php';
  include 'footer.php';
  include 'js.php';
  ?>