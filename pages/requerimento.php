<?php
include 'header.php';
include 'navbar.php';
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
              <input type="text" class="form-control" id="titulo" placeholder="Ex: Falta de rampas de acesso" value="" name="titulo" required pattern="[A-Za-zÀ-ÿ\s]+" title="Insira um título que contenha apenas letras. Nenhum outro tipo de caracter será válido">
              <div class="invalid-feedback">
                Informe um título formado apenas por letras, tendo como mínimo de 10 caracteres.
              </div>
            </div>

            <div class="col-md-4">
              <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
              <select class="form-select" id="tipo" name="tipo" required title="Selecione um tipo de requerimento">
                <option value="">Escolha uma opção</option>
                <option value="Denúncia">Denúncia</option>
                <option value="Sugestão">Sugestão</option>
              </select>
              <div class="invalid-feedback">
                Selecione um tipo de requerimento
              </div>
            </div>

            <div class="col-md-8">
              <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
              <input type="text" class="form-control" id="cidade" placeholder="Ex: Votuporanga" name="cidade" required pattern="[A-Za-zÀ-ÿ\s]+">
              <div class="invalid-feedback">
                Será aceito apenas letras, tendo como mínimo 3 caracteres.
              </div>
            </div>

            <div class="col-md-4">
              <label for="cep" class="form-label"><strong>CEP: </strong></label>
              <input type="text" class="form-control" id="cep" name="cep" required title="Digite o CEP no formato XX.XXX-XXX" placeholder="XX.XXX-XXX" pattern="\d{2}\.\d{3}-\d{3}" maxlength="10">
              <div class="invalid-feedback">
                Informe o CEP no formato XX.XXX-XXX
              </div>
            </div>

            <div class="col-md-6">
              <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
              <input type="text" class="form-control" id="bairro" placeholder="Ex: Centro" name="bairro" required pattern="[A-Za-zÀ-ÿ0-9\s]+">
              <div class="invalid-feedback">
                Informe um bairro válido
              </div>
            </div>

            <div class="col-md-6">
              <label for="rua" class="form-label"><strong>Rua: </strong></label>
              <input type="text" class="form-control" id="rua" placeholder="Ex: Rua Amazonas" name="rua" required pattern="[A-Za-zÀ-ÿ0-9\s]+">
              <div class="invalid-feedback">
                Informe uma rua válida
              </div>
            </div>

            <div class="col-12 input-group mt-4">
              <label class="input-group-text" for="imagem"><strong>Foto do local:</strong></label>
              <input type="file" class="form-control" id="imagem" accept="image/*" name="imagem">
              <div class="invalid-feedback">
                Informe uma imagem do local em discussão
              </div>
            </div>

            <div class="col-12">
              <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
              <textarea class="form-control" placeholder="Insira uma descrição detalhada sobre o ambiente em discussão" id="descricao" style="height: 100px" name="descricao" required max="1000"></textarea>
              <div class="invalid-feedback">
                Insira uma descrição, com no mínimo 50 caracteres, sobre o ambiente em discussão
              </div>
            </div>

            <div class="col-12 form-check d-flex justify-content-center">
              <?php if (!isset($_SESSION["id_usuario"])) {
                $checked  = 'checked disabled';
              } elseif (isset($_SESSION["id_usuario"])) {
                $checked = 'value = "true" ';
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
  include 'footer.php';
  include 'js.php';
  ?>