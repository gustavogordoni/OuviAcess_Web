<?php
        include 'header.php';
        include 'navbar.php';
?>

<div class="container mx-auto mt-5">
  <main>
  <div class="py-5 text-center">
    <!--
    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bank d-block mx-auto mb-3" viewBox="0 0 16 16">
                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg>
      -->
      <strong>
        <h2>Informe seus dados para <br> efetuar seu cadastro no sistema</h2>
      </strong>
      <!--
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    -->
    </div>

    <div class="row">
      <div class="col-9 mx-auto">
 
        <form class="needs-validation" action="add_cadastro.php" method="POST">
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="nome" class="form-label"><strong>Nome completo: </strong></label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Carlos Alberto" required 
                pattern="[a-zA-Z\s]" title="Não informe caracteres que não sejam letras"
              >
              <div class="invalid-feedback">
                Informe seu nome completo
              </div>
            </div>
    
            <div class="col-sm-3">
              <label for="ddd" class="form-label"><strong>DDD: </strong></label>
              <input type="tel" class="form-control" id="ddd" name="ddd" required
                pattern="\([0-9]{2}\)$" title="Digite o DDD no formato (DD)" placewholder="Ex: (17)">

              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-9">
              <label for="telefone" class="form-label"><strong>Número de telefone: </strong></label>
              <input type="tel" class="form-control" id="telefone" name="telefone" required
                pattern="[0-9]{4,6}-[0-9]{3,4}$" title="Digite o telefone no formato XXXXX-XXXX" placeholder="Ex: 99999-9999">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label"><strong>Email: </strong><span class="text-body-secondary">(Para efetuar login)</span></label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="email" name="email" placeholder="voce@exemplo.com" required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                >
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
            
            <div class="col-md-6">
                <button class="w-100 btn btn-warning btn-lg mt-3" type="reset">Limpar</button>
            </div>
            <div class="col-md-6">
                <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Enviar</button>
            </div>
        </form>
      </div>
    </div>
  </main>

<?php include 'footer.php'; ?>