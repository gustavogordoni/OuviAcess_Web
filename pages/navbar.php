<nav class="navbar navbar-expand-md navbar-<?= $tema ?> bg-<?= $tema ?> sticky-top border-2 border-bottom border-info p-1" aria-label="Offcanvas navbar large">
    <div class="container-fluid mx-3 d-flex">
      <a href="../." class="mx-auto">
      <img src="../image/OuviAcess.png" alt="" width="120vw" class="d-flex mx-auto ms-2">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start text-bg-<?= $tema ?>" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title mx-auto" id="offcanvasNavbar2Label">
            <a href="../.">
              <img src="../image/OuviAcess.png" alt="" width="120vw">
            </a>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 nav-pills">

            <li class="nav-item mx-2">
              <a href="../." class="nav-link<?= ativar ('home.php')?> text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="bi d-block mx-auto mb-1" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
              </svg>
                Início
              </a>
            </li>

            <li class="nav-item mx-2">
              <a href="requerimento.php" class="nav-link<?= ativar ('requerimento.php')?> text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="bi d-block mx-auto mb-1" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
              </svg>
                Requerimentos
              </a>
            </li>

            <li class="nav-item mx-2">
              <a href="historico.php" class="nav-link<?= ativar ('historico.php')?> text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="bi d-block mx-auto mb-1" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/>
              </svg>
                Histórico
              </a>
            </li>

          </ul>

          <div class="d-flex my-auto justify-content-evenly">
            <a href="login.php"><button type="button" class="btn btn-outline-primary mx-1">Login</button></a> 
            <a href="cadastro.php"><button type="button" class="btn btn-outline-danger mx-1">Cadastre-se</button></a>
            <form action="" method = "POST" class="my-auto">
              <button value = "<?= $value ?>" type="submit" class="btn <?= $class ?> mx-1 rounded-circle p-2" id="alterar_tema" name = "tema"><?= $Dark_Light ?></button>
            </form>
          </div>


        </div>
      </div>
    </div>
  </nav>