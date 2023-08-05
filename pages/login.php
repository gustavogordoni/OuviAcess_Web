<?php
        include 'header.php';
?>
<div class="d-flex align-items-center py-4 bg-body-tertiary login_form">
    
<main class="mx-auto d-flex">
  <form>
        <!--<img class="mb-4 d-block mx-auto" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-bank d-block mx-auto mb-3" viewBox="0 0 16 16">
                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg>
    <h1 class="h3 mb-3 fw-normal text-center fs-1">Bem-vindo ao<br><strong class="shadow text-light">OuviAcess</strong></h1>
    

    <div class="form-floating mb-1">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com name=" required>
      <label for="floatingInput">Endereço de email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Senha</label>
    </div>
    
    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Acessar</button>
    <p class="mt-5 mb-3 text-body-secondary text-center">Não está registrado? <a href="cadastro.php" class="link-primary">Cadastre-se</a></p>
  </form>
</main>    

</div>