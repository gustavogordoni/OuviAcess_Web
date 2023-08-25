<?php
include 'header.php';
include 'navbar.php';
?>

<div class="container mx-auto">
  <main>
    <div class="py-3 text-center mt-4">

      <strong>
        <h2>Informe os dados para <br> efetuar seu cadastro no sistema</h2>
      </strong>

    </div>

    <div class="row">
      <div class="col-11 mx-auto">

        <form class="needs-validation" action="add_cadastro.php" method="POST">
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="nome" class="form-label"><strong>Nome completo: </strong></label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Carlos Alberto" required pattern="[A-Za-zÀ-ÿ\s]+" title="Não informe caracteres que não sejam letras">
              <div class="invalid-feedback">
                Informe seu nome completo
              </div>
            </div>

            <div class="col-sm-3">
              <label for="ddd" class="form-label"><strong>DDD: </strong></label>
              <input type="tel" class="form-control" id="ddd" name="ddd" required pattern="\([0-9]{2}\)$" title="Digite o DDD no formato (DD)" placeholder="Ex: (17)" maxlength="4">

              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-9">
              <label for="telefone" class="form-label"><strong>Número de telefone: </strong></label>
              <input type="tel" class="form-control" id="telefone" name="telefone" required pattern="[0-9]{4,6}-[0-9]{3,4}$" title="Digite o telefone no formato XXXXX-XXXX" placeholder="Ex: 99999-9999" maxlength="10">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label"><strong>Email: </strong><span class="text-body-secondary">(Para efetuar login)</span></label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="email" name="email" placeholder="voce@exemplo.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                <div class="invalid-feedback">
                  Por favor, insira um endereço de e-mail válido para efetuar login
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="senha" class="form-label"><strong>Senha: </strong><span class="text-body-secondary">(Para efetuar login)</span></label>
              <input type="password" class="form-control" id="senha" name="senha" required>
              <div class="invalid-feedback">
                Informe uma senha para efetuar login
              </div>
            </div>

            <div class="col-12">
              <label for="confirme" class="form-label"><strong>Confirme a senha: </strong></label>
              <input type="password" class="form-control" id="confirme" name="confirme" required>
              <div class="invalid-feedback">
                Confirme sua senha para efetuar login
              </div>
            </div>

            <div class="mt-4 col-12 row">
              <div class="col-md-6 mb-3">
                <button class="w-100 btn btn-warning btn-lg rounded-pill px-3" type="reset">Limpar</button>
              </div>
              <div class="col-md-6">
                <button class="w-100 btn btn-primary btn-lg rounded-pill px-3" type="submit">Enviar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </main>

  <?php
  include 'footer.php';
  include 'js.php';
  ?>