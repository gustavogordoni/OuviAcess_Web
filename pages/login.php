<?php
include 'header.php';
?>
<div class="d-flex align-items-center py-4 bg-body-tertiary login_form">

  <main class="mx-auto d-flex">
    <form action="verificar-login.php" method="POST" class="needs-validation">
      <!--<img class="mb-4 d-block mx-auto" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->

      <img src="../image/OuviAcess.png" alt="" width="200vw" class="mb-4 d-block mx-auto">

      <!--
    <h1 class="h3 mb-3 fw-normal text-center fs-1"><strong class="shadow text-light">Bem-vindo!</strong></h1>
    -->
      <div class="form-floating mb-1">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com name=" required name="email">
        <label for="floatingInput">Endereço de email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="senha">
        <label for="floatingPassword">Senha</label>
      </div>

      <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Acessar</button>
      <p class="mt-5 mb-3 text-body-secondary text-center">Não está registrado? <a href="cadastro.php" class="link-primary">Cadastre-se</a></p>
    </form>
  </main>

</div>

<?php
include 'js.php';
?>