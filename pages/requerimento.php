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
      <h2>Informe os dados solicitados para <br> registrar o requerimento no sistema</h2>
      <!--
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    -->
    </div>

    <div class="row">
      <div class="col-9 mx-auto">
 
        <form class="needs-validation" novalidate="" action="" method="POST">
          <div class="row g-3">

            <div class="col-sm-8">
              <label for="Name" class="form-label"><strong>Título do requerimento: </strong></label>
              <input type="text" class="form-control" id="Name" placeholder="Ex: Falta de rampas de acesso" value="" required>
              <div class="invalid-feedback">
                Informe um título para seu requerimento
              </div>
            </div>

            <div class="col-md-4">
              <label for="country" class="form-label"><strong>Tipo:</strong></label>
              <select class="form-select" id="country" required>
                <option value="">Escolha uma opção</option>
                <option>Denúncia</option>
                <option>Sugestão</option>
              </select>
              <div class="invalid-feedback">
                Selecione um tipo de requerimento
              </div>
            </div>

            <div class="col-md-8">
              <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
              <input type="text" class="form-control" id="cidade" placeholder="Ex: Votuporanga" required>
              <div class="invalid-feedback">
                Informe uma cidade válida
              </div>
            </div>

            <div class="col-md-4">
              <label for="cep" class="form-label"><strong>CEP: </strong></label>
              <input type="text" class="form-control" id="cep" placeholder="XXXXX-XXX" required>
              <div class="invalid-feedback">
                Informe um CEP válido
              </div>
            </div>        

            <div class="col-md-6">
              <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
              <input type="text" class="form-control" id="bairro" placeholder="Ex: Centro" required>
              <div class="invalid-feedback">
                Informe um bairro válido
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="zip" class="form-label"><strong>Rua: </strong></label>
              <input type="text" class="form-control" id="zip" placeholder="Ex: Rua Amazonas" required>
              <div class="invalid-feedback">
                Informe uma rua válida
              </div>
            </div>

            <div class="col-12 input-group mt-4">
                <label class="input-group-text" for="inputGroupFile01"><strong>Foto do local:</strong></label>
                <input type="file" class="form-control" id="inputGroupFile01" accept="image/*">
                <div class="invalid-feedback">
                  Informe uma imagem do local em discussão
                </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label"><strong>Descrição: </strong></label>
              <textarea class="form-control" placeholder="Insira uma descrição detalhada sobre o ambiente em discussão    " id="floatingTextarea2" style="height: 100px"></textarea>
              <div class="invalid-feedback">
                Insira uma descrição detalhada sobre o ambiente em discussão               
              </div>
            </div>
            

            <div class="col-12 form-check d-flex justify-content-center ">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                <label class="form-check-label ms-1" for="flexCheckChecked">
                    Enviar <strong>anonimamente</strong>
                </label>
            </div>


            <div class="col-md-6">
                <button class="w-100 btn btn-warning btn-lg mt-3" type="reset">Limpar</button>
            </div>
            <div class="col-md-6">
                <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Enviar</button>
            </div>


        </div>
        </form>
      </div>
    </div>
  </main>

<?php include 'footer.php'; ?>