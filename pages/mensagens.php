<?php
///////////////////////////  SUCESSO - REQUERIMENTO  ///////////////////////////////////////////////
if (isset($_SESSION["add_requerimento"]) || isset($_SESSION["excluir_requerimento"]) || isset($_SESSION["alterar_requerimento"])) {
    // ADD REQUERIMENTO
    if (isset($_SESSION["add_requerimento"]) && $_SESSION["add_requerimento"]) {
        $titulo_sucesso = "Dados do requerimento gravados com SUCESSO";
        unset($_SESSION["add_requerimento"]);
    }

    // EXCLUIR REQUERIMENTO
    if (isset($_SESSION["excluir_requerimento"]) && $_SESSION["excluir_requerimento"]) {
        $titulo_sucesso = "Requerimento excluído com SUCESSO";
        unset($_SESSION["excluir_requerimento"]);
    }

    // ALTERAR REQUERIMENTO
    if (isset($_SESSION["alterar_requerimento"]) && $_SESSION["alterar_requerimento"]) {
        $titulo_sucesso = "Dados do requerimento alterados com SUCESSO";
        unset($_SESSION["alterar_requerimento"]);
    }
?>

    <div class="alert alert-success alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <strong><?= $titulo_sucesso ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

// MANTEVE REQUERIMENTO
if (isset($_SESSION["manteve_requerimento"]) && $_SESSION["manteve_requerimento"]) {
?>
    <div class="alert alert-secondary alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </svg>
        <strong>NENHUM dado foi alterado</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["manteve_requerimento"]);
}

///////////////////////////  SUCEESSO - CADASTRO  ////////////////////////////////////////////////
// ADICIONAR CADASTRO
if (isset($_SESSION["add_cadastro"]) && $_SESSION["add_cadastro"]) {
?>
    <div class="alert alert-success alert-dismissible fade show position-absolute bottom-0 end-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <strong>Cadastro do usuário realizado com sucesso</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["add_cadastro"]);
}

///////////////////////////  ERRO AO LOGAR  ////////////////////////////////////////////////
// FAÇA LOGIN
if (isset($_SESSION["realizar_login"]) && $_SESSION["realizar_login"]) {
?>
    <div class="row d-flex align-items-center ps-4 h-75">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Efetue sua autenticação para ter acesso ao seu histórico de requerimentos</h2>
            <h2><a href="login.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-5 mt-2">Faça Login</a></h2>
        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/identifique-se.png" alt="" width="80%">
        </div>
    </div>

<?php
    unset($_SESSION["realizar_login"]);
}

///////////////////////////  HISTORICO VAZIO  ////////////////////////////////////////////////
// FAÇA REQURIMENTO
if (isset($_SESSION["historico_vazio"]) && $_SESSION["historico_vazio"]) {
?>
    <div class="row d-flex align-items-center ps-4 h-75">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Você ainda não realizou nenhum</h2>
            <a href="login.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-5 mt-2 fs-2">Requerimento</a>
        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/historico_vazio.png" alt="" width="80%">
        </div>
    </div>

<?php
    unset($_SESSION["historico_vazio"]);
}


///////////////////////////  ERROS - REQUERIMENTO  ////////////////////////////////////////////////
if (isset($_SESSION["error_requerimento"])) {
    //////// TITULO
    if ($_SESSION["error_requerimento"] == "titulo") {
        $titulo_erro = "Título inadequado";
        $texto_erro = "É necessário informar um título para que seu requerimento seja gravado no sistema!";
    }

    //////// TIPO
    if ($_SESSION["error_requerimento"] == "tipo") {
        $titulo_erro = "Tipo do requemento inadequado";
        $texto_erro = "É necessário informar um tipo de requerimento para ele seja gravado no sistema!";
    }

    //////// CIDADE
    if ($_SESSION["error_requerimento"] == "cidade") {
        $titulo_erro = "Nome da cidade está inadequado";
        $texto_erro = "É necessário informar o nome de sua cidade para que seu requerimento seja gravado no sistema!";
    }

    //////// CEP
    if ($_SESSION["error_requerimento"] == "cep") {
        $titulo_erro = "CEP está inadequado";
        $texto_erro = "É necessário informar o CEP de sua cidade para que seu requerimento seja gravado no sistema!";
    }

    //////// BAIRRO
    if ($_SESSION["error_requerimento"] == "bairro") {
        $titulo_erro = "Nome do bairro está inadequado";
        $texto_erro = "É necessário informar o nome de seu bairro para que seu requerimento seja gravado no sistema!";
    }

    ////////// DESCRICÃO
    if ($_SESSION["error_requerimento"] == "descricao") {
        $titulo_erro = "Descrição do requerimento está inadequado";
        $texto_erro = "É necessário informar uma descrição para que seu requerimento seja gravado no sistema!";
    }

    //////// ANONIMO
    if ($_SESSION["error_requerimento"] == "anonimo") {
        $titulo_erro = "Modo anonimo está inadequado";
        $texto_erro = "Não foi possível identificar se você deseja, ou não, se identificar!";
    }
?>

    <div class="row d-flex align-items-center ps-4 h-100">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger"><?= $titulo_erro ?></h1>
            <p><?= $texto_erro ?></p>
            <a href="requerimento.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-5 mt-2">Retornar à página de requerimento</a>
        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    </div>

<?php unset($_SESSION["error_requerimento"]);
}



///////////////////////////  ERROS - CADASTRO USUÁRIOS ////////////////////////////////////////////////
if (isset($_SESSION["error_cadastro"])) {
    //////// NOME
    if ($_SESSION["error_cadastro"] == "nome") {
        $titulo_erro = "Nome está inadequado";
        $texto_erro = "É necessário informar seu nome completo para que seu cadastro seja efetuado no sistema!";
    }

    //////// DDD
    if ($_SESSION["error_cadastro"] == "ddd") {
        $titulo_erro = "DDD está inadequado";
        $texto_erro = "É necessário informar o DDD do seu número de telefone para que seu cadastro seja efetuado no sistema!";
    }

    //////// TELEFONE
    if ($_SESSION["error_cadastro"] == "telefone") {
        $titulo_erro = "Telefone está inadequado";
        $texto_erro = "É necessário informar o seu número de telefone para que seu cadastro seja efetuado no sistema!";
    }

    //////// EMAIL
    if ($_SESSION["error_cadastro"] == "email") {
        $titulo_erro = "E-mail está inadequado";
        $texto_erro = "É necessário informar seu e-mail para que seu cadastro seja efetuado no sistema!";
    }

    //////// SENHA
    if ($_SESSION["error_cadastro"] == "senha") {
        $titulo_erro = "Senha está inadequada";
        $texto_erro = "É necessário informar a sua senha de autenticação (login) para que seu cadastro seja efetuado no sistema!";
    }

    ////////// CONFRIMAR SENHA
    if ($_SESSION["error_cadastro"] == "confirme") {
        $titulo_erro = "A confirmação da senha está inadequada";
        $texto_erro = "É necessário informar a confirmação da senha para que seu cadastro seja efetuado no sistema!";
    }
?>

    <div class="row d-flex align-items-center ps-4 h-100">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger"><?= $titulo_erro ?></h1>
            <p><?= $texto_erro ?></p>
            <a href="cadastro.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-5 mt-2">Retornar à página de cadastro</a>
        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    </div>

<?php unset($_SESSION["error_cadastro"]);
}


///////////////////////////  ERROS MANIPULAÇÃO REQUERIMENTOS  ////////////////////////////////////////////////
if (isset($_SESSION["crud_requerimento"])) {
    //////// VISULIZAR - ID NÃO EXISTE
    if ($_SESSION["crud_requerimento"] == "visualizar_id") {
        $titulo_erro = "O valor do identificador de um requerimento não foi instanciado";
        $texto_erro = "Retorne à página de histórico e selecione um requerimento para visualizar seus detalhes";
    }

    //////// EDITAR - ID NÃO EXISTE
    if ($_SESSION["crud_requerimento"] == "editar_id") {
        $titulo_erro = "O valor do identificador de um requerimento não foi instanciado";
        $texto_erro = "Retorne à página de histórico e selecione um requerimento para editar suas informações";
    }

    //////// ALTERAR - ID NÃO EXISTE
    if ($_SESSION["crud_requerimento"] == "alterar_id") {
        $titulo_erro = "O valor do identificador de um requerimento não foi instanciado";
        $texto_erro = "Retorne à página de histórico e selecione um requerimento para excluir suas informações";
    }

    //////// EXCLUIR - ID NÃO EXISTE
    if ($_SESSION["crud_requerimento"] == "excluir_id") {
        $titulo_erro = "O valor do identificador de um requerimento não foi instanciado";
        $texto_erro = "Retorne à página de histórico e selecione um requerimento para deletar suas informações";
    }
?>

    <div class="row d-flex align-items-center ps-4 h-100">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger"><?= $titulo_erro ?></h2>
            <p><?= $texto_erro ?></p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Acessar histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>
    </div>

<?php
    unset($_SESSION["crud_requerimento"]);
}

//////// ID INFORMADO NÃO ESTÁ NO BANCO DE DADOS
if (isset($_SESSION["id_requerimento_inexistente"])) {
?>
    <div class="row d-flex align-items-center ps-4 h-100">
        <div class="col-md-6 text-center">
            <h1 class="mt-2 text-danger">Falha ao buscar pelo requerimento</h1>
            <p class="fs-5s">Não foi econtrado nenhum requerimento com o ID = <?= $id_requerimento ?></p>
            <h2><a href="historico.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Retornar ao histórico</a></h2>

        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="80%" class="d-block mx-auto">
        </div>

    <?php
    unset($_SESSION["id_requerimento_inexistente"]);
}
    ?>