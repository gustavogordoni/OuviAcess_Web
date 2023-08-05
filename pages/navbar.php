<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom border-info" aria-label="Offcanvas navbar large">
    <div class="container-fluid mx-4">
      <a class="navbar-brand fs-3" href="#">Sistema de Ouvidoria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Sistema de Ouvidoria</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 fs-5 nav-pills">
            <li class="nav-item mx-2">
              <a class="nav-link<?= ativar ('home.php')?> p-2 text-center" aria-current="page" href="../.">Início</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link<?= ativar ('requerimento.php')?> p-2 text-center" href="requerimento.php">Requerimentos</a>
            </li>
            <li class="nav-item mx-2 dropdown">
              <a class="nav-link<?= ativar ('sla.php')?> p-2 text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>

          <div class="d-flex mt-3 mt-lg-0">
            <button  type="button" class="btn btn-outline-light me-2">Login</button>
            <button type="button" class="btn btn-outline-warning">Cadastre-se</button>
          </div>


          <!--
          
            -->

        </div>
      </div>
    </div>
  </nav>