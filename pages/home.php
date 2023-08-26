    <?php
    include 'header.php';
    include 'navbar.php';

    include 'carrousel.php';
    ?>

    <div class="container marketing mt-5">
        <div class="row text-center my-4">
            <div class="col-lg-4">
                <h2 class="fw-normal" id="sobre">O que é OuviAcess?</h2>
                <p>O OuviAcess se trata de um sistema de ouvidoria criado com o intuito de facilitar o contato entre o órgão responsável pela garantia de acessibilidade no espaço urbano e os usuários que, principalmente, necessitam de ambientes adaptados. Dessa forma, nos dedicamos a receber denúncias e sugestões para contribuir com a garantia de ambientes acessíveis.</p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal">Requerimentos</h2>
                <p>A página de Requerimentos permite o cadastro de denúncias e sugestões relacionadas a problemas de acessibilidade em ambientes, sendo possível: selecionar o tipo do requerimento (opções de denúncia e de sugestão), além de ser necessário informar um título, a cidade, o CEP, o bairro, a rua, uma descrição. Como escolha opcional, pode-se anexar uma imagem para ilustrar o local em questão, e selecionar a opção de envio anonimo, o que permite que o requerimento seja enviado sem a identificação do remetente.</p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal">Histórico</h2>
                <p>A página de Histórico permite que o usuário: visualize, edite e exclua os requerimentos realizados por ele anteriormente. Deste modo, esta página apenas poderá ser acessada quando o usuário realizar sua autenticação, isto é, efetuar login. Caso não tenha uma conta, o usuário pode acessar a página de Cadastro, para que possa ser registrado no sistema</p>
            </div>
        </div>
    </div>

    <div class="container marketing mb-3">
        <div class="row text-center mt-4">
            <div class="col-lg-4">
                <h2 class="fw-normal">Login</h2>
                <p>Será na página de Login onde o usuário poderá efetuar sua autenticação, ou seja, poderá se identificar no sistema. Para isso, ele deve inserir o e-mail e a senha informados na página de Cadastro do usuário. É válido ressaltar que o usuário apenas poderá efetuar o login, caso já tenha realizado seu cadastro no sistema.</p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal">Cadastro</h2>
                <p>É na página de Cadastro que o usuário poderá, como o nome já induz, realizar seu cadastro no sistema. Para isso, é necessário que ele informe: seu nome completo, DDD e número de telefone, como forma de contato alternativa, além de e-mail e senha para a realização do login. <br> Com seu cadastro e login realizado, o usuário poderá inserir, editar, visualizar e excluir determinadas informações que dizem respeito a ele.</p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal">Perfil</h2>
                <p>Do mesmo modo que na página de Histórico, a página de Perfil necessita que o usuário estaja logado no sistema. Sendo assim, quando acessá-la, terá acesso aos dados informados por ele em seu cadastro, podendo visualizá-las, editá-las e excluí-las, caso desejar remover sua conta no sistema</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-3">
        <a href="#myCarousel"><button class="btn btn-outline-info rounded-pill px-3">Voltar ao topo</button></a>
    </div>

    <?php

    if (isset($_SESSION["bem_vindo"]) && $_SESSION["bem_vindo"]) {
    ?>
        <div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 " role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </svg>
            <strong>Seja bem-vindo <?= $_SESSION["nome"] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION["bem_vindo"]);
        unset($_SESSION["nome"]);
    }

    include 'footer.php';
    include 'js.php';
    ?>