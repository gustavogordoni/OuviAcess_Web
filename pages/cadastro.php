<?php
        include 'header.php';
        include 'navbar.php';
?>

<div class="container mx-auto mt-5">
  <main>
  <div class="py-5 text-center">
  <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bank d-block mx-auto mb-3" viewBox="0 0 16 16">
                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg>
      <h2>Informe seus dados para <br> efetuar seu cadastro no sistema</h2>
      <!--
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    -->
    </div>

    <div class="row">
      <div class="col-9 mx-auto">
 
        <form class="needs-validation" novalidate="" action="" method="POST">
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="Name" class="form-label"><strong>Nome completo: </strong></label>
              <input type="text" class="form-control" id="Name" placeholder="Ex: Carlos Alberto" value="" required>
              <div class="invalid-feedback">
                Informe seu nome completo
              </div>
            </div>
    
            <div class="col-sm-3">
              <label for="ddd" class="form-label"><strong>DDD: </strong></label>
              <input type="text" class="form-control" id="ddd" placeholder="Ex: 17" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-9">
              <label for="phone" class="form-label"><strong>Número de telefone: </strong></label>
              <input type="text" class="form-control" id="phone" placeholder="Ex: 99999-9999" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label"><strong>Email: </strong><span class="text-body-secondary">(Para efetuar login)</span></label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="email" required placeholder="voce@exemplo.com">
              <div class="invalid-feedback">
                Por favor, insira um endereço de e-mail válido para efetuar login
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label"><strong>Senha: </strong><span class="text-body-secondary">(Para efetuar login)</span></label>
              <input type="password" class="form-control" id="password">
              <div class="invalid-feedback">
                Informe uma senha para efetuar login                
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label"><strong>Confirme a senha: </strong></label>
              <input type="password" class="form-control" id="password">
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