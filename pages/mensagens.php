<?php
///////////////////////////  CONEXÃO COM BANCO DE DAODOS  ///////////////////////////////////////////////

if (isset($_SESSION["conexao_bd"]) && basename($_SERVER["PHP_SELF"]) == "inicio.php") {
    // SUCESSO CONEXÃO
    if ($_SESSION["conexao_bd"] == "sucesso") {
        $alert = "primary";
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" /></svg>';
        $titulo_conexao = "Sucesso ao conectar-se ao banco de dados ;)";
        $texto_conexao = "Conectado ao banco de dados <b>" . $_SESSION["sucesso_bd"] . "</b>";
        unset($_SESSION["sucesso_bd"]);
    }
    // FALHA CONEXÃO
    if ($_SESSION["conexao_bd"] == "falha") {
        $alert = "danger";
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" /></svg>';
        $titulo_conexao = "Erro ao se conectar no banco de dados. :(";
        $texto_conexao = $_SESSION["error_bd"];
        unset($_SESSION["error_bd"]);
    }
    unset($_SESSION["conexao_bd"]);
?>
    <div class="alert alert-<?= $alert ?> alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <strong class="text-center">
            <?= $svg ?>
            <?= $titulo_conexao ?>
        </strong>
        <p><?= $texto_conexao ?></p>
        <button type="button" class="btn-close my-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}


///////////////////////////  SUCESSO - REQUERIMENTO  ///////////////////////////////////////////////
if (isset($_SESSION["add_requerimento"]) || isset($_SESSION["excluir_requerimento"]) || isset($_SESSION["alterar_requerimento"])) {
    // ADD REQUERIMENTO
    if (isset($_SESSION["add_requerimento"]) && $_SESSION["add_requerimento"]) {
        $titulo_sucesso = "Requerimento realizado com <strong>SUCESSO</strong>";
        unset($_SESSION["add_requerimento"]);
    }

    // EXCLUIR REQUERIMENTO
    if (isset($_SESSION["excluir_requerimento"]) && $_SESSION["excluir_requerimento"]) {
        $titulo_sucesso = "Requerimento excluído com <strong>SUCESSO</strong>";
        unset($_SESSION["excluir_requerimento"]);
    }

    // ALTERAR REQUERIMENTO
    if (isset($_SESSION["alterar_requerimento"]) && $_SESSION["alterar_requerimento"]) {
        $titulo_sucesso = "Dados do requerimento alterados com <strong>SUCESSO</strong>";
        unset($_SESSION["alterar_requerimento"]);
    }
?>

    <div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <?= $titulo_sucesso ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}

// MANTEVE REQUERIMENTO
if (isset($_SESSION["manteve_requerimento"]) && $_SESSION["manteve_requerimento"]) {
?>
    <div class="alert alert-secondary alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </svg>
        NENHUMA informação foi alterada
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["manteve_requerimento"]);
}

///////////////////////////  SUCEESSO - CADASTRO  ////////////////////////////////////////////////
// ADICIONAR CADASTRO
if (isset($_SESSION["add_cadastro"]) && $_SESSION["add_cadastro"]) {
?>
    <div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        Cadastro do usuário realizado com sucesso
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["add_cadastro"]);
}

///////////////////////////  ERRO AO LOGAR  ////////////////////////////////////////////////
// FAÇA LOGIN
if (isset($_SESSION["historico_anonimo"]) && $_SESSION["historico_anonimo"]) {
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
    unset($_SESSION["historico_anonimo"]);
}

if (isset($_SESSION["realizar_login"])) {
    if ($_SESSION["realizar_login"] == "visualizar-requerimento") {
        $texto_erro = "visualizar os detalhes de seus requerimentos";
    }
    if ($_SESSION["realizar_login"] == "editar-requerimento") {
        $texto_erro = "editar as informações de seus requerimentos";
    }
    if ($_SESSION["realizar_login"] == "alterar-requerimento") {
        $texto_erro = "alterar as informações de seus requerimentos";
    }
    if ($_SESSION["realizar_login"] == "excluir-requerimento") {
        $texto_erro = "excluir seus requerimentos";
    }
    if ($_SESSION["realizar_login"] == "perfil") {
        $texto_erro = "ter acessar seu perfil";
    }
    if ($_SESSION["realizar_login"] == "editar-perfil") {
        $texto_erro = "editar as informações do seu perfil";
    }
    if ($_SESSION["realizar_login"] == "alterar-perfil") {
        $texto_erro = "alterar as informações do seu perfil";
    }
    if ($_SESSION["realizar_login"] == "mostrar-imagem") {
        $texto_erro = "ter acesso aos detalhes de seus requerimentos";
    }
    if ($_SESSION["realizar_login"] == "alterar-senha") {
        $texto_erro = "alterar sua senha";
    }
?>
    <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <h6 class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <strong>Faça login</strong>
        </h6>
        Realize sua autenticação para <?= $texto_erro ?>
        <button type="button" class="btn-close my-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["realizar_login"]);
}


///////////////////////////  SUCESSO AO LOGAR  ////////////////////////////////////////////////
// BEM VINDO
if (isset($_SESSION["bem_vindo"]) && $_SESSION["bem_vindo"]) {
?>
    <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0 py-auto " role="alert">
        <h6>Seja bem-vindo <strong><?= $_SESSION["nome"] ?></strong> <span class="fs-5">&#128075;</span></h6>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION["bem_vindo"]);
    unset($_SESSION["nome"]);
}

///////////////////////////  HISTORICO VAZIO  ////////////////////////////////////////////////
// FAÇA REQURIMENTO
if (isset($_SESSION["historico_vazio"]) && $_SESSION["historico_vazio"]) {
?>
    <div class="row d-flex align-items-center ps-4 h-75">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Você ainda não realizou nenhum</h2>
            <a href="requerimento.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-5 mt-2 fs-2">Requerimento</a>
        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/historico_vazio.png" alt="" width="80%">
        </div>
    </div>

<?php
    unset($_SESSION["historico_vazio"]);
}


///////////////////////////  ERROS - REQUERIMENTO  ////////////////////////////////////////////////
if (isset($_SESSION["error_requerimento"]) || isset($_SESSION["caracteres_requerimento"]) || isset($_SESSION["error_cadastro"]) || isset($_SESSION["caracteres_cadastro"]) || isset($_SESSION["error_perfil"]) ||isset($_SESSION["caracteres_perfil"])) {
    
    if (isset($_SESSION["error_requerimento"]) || isset($_SESSION["caracteres_requerimento"])) {
        if (isset($_SESSION["error_requerimento"])) {
            //////// ACESSO POR URL
            if ($_SESSION["error_requerimento"] == "acesso_url") {
                $titulo_erro = "Nenhum campo completo";
                $texto_erro = "Complete as informações solicitadas para que você possa realizar um requerimento no sistema!";
            }

            //////// TITULO
            if ($_SESSION["error_requerimento"] == "titulo") {
                $titulo_erro = "Título inadequado";
                $texto_erro = "Informe um título para que seu requerimento seja gravado no sistema!";
            }

            //////// TIPO
            if ($_SESSION["error_requerimento"] == "tipo") {
                $titulo_erro = "Tipo do requemento inadequado";
                $texto_erro = "Informe um tipo de requerimento para que ele seja gravado no sistema!";
            }

            //////// CIDADE
            if ($_SESSION["error_requerimento"] == "cidade") {
                $titulo_erro = "Nome da cidade está inadequado";
                $texto_erro = "Informe o nome da cidade para que seu requerimento seja gravado no sistema!";
            }

            //////// CEP
            if ($_SESSION["error_requerimento"] == "cep") {
                $titulo_erro = "CEP está inadequado";
                $texto_erro = "Informe o CEP da cidade para que seu requerimento seja gravado no sistema!";
            }

            //////// BAIRRO
            if ($_SESSION["error_requerimento"] == "bairro") {
                $titulo_erro = "Nome do bairro está inadequado";
                $texto_erro = "Informe o nome do bairro para que seu requerimento seja gravado no sistema!";
            }

            //////// RUA
            if ($_SESSION["error_requerimento"] == "logradouro") {
                $titulo_erro = "Nome da logradouro está inadequada";
                $texto_erro = "Informe o nome da logradouro para que seu requerimento seja gravado no sistema!";
            }

            ////////// DESCRICÃO
            if ($_SESSION["error_requerimento"] == "descricao") {
                $titulo_erro = "Descrição do requerimento está inadequado";
                $texto_erro = "Informe uma descrição do(a) problema/sugestão para que seu requerimento seja gravado no sistema!";
            }

            //////// ANONIMO
            if ($_SESSION["error_requerimento"] == "anonimo") {
                $titulo_erro = "Modo anonimo está inadequado";
                $texto_erro = "Não foi possível identificar se você deseja, ou não, se identificar!";
            }
            unset($_SESSION["error_requerimento"]);
        }

        if (isset($_SESSION["caracteres_requerimento"])) {

            //////// TITULO
            if ($_SESSION["caracteres_requerimento"] == "titulo_pequeno") {
                $titulo_erro = "Título está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe um título com, no mínimo, 10 caracteres.";
            } elseif ($_SESSION["caracteres_requerimento"] == "titulo_grande") {
                $titulo_erro = "Título está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe um título com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_requerimento"] == "titulo_inadequado") {
                $titulo_erro = "Título inadequado";
                $texto_erro = "O título informado não atende ao formato necessário: <br> Apenas letras, espaços e caracteres acentuados";
            }

            //////// TIPO
            if ($_SESSION["caracteres_requerimento"] == "tipo_invalido") {
                $titulo_erro = "Tipo de requerimento inválido: " . $_SESSION["caracteres"];
                $texto_erro = "Selecione o tipo de requerimento - Denúnicia ou Sugestão";
            }

            //////// CIDADE
            if ($_SESSION["caracteres_requerimento"] == "cidade_pequeno") {
                $titulo_erro = "Nome da cidade está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe o nome de uma cidade com, no mínimo, 3 caracteres.";
            } elseif ($_SESSION["caracteres_requerimento"] == "cidade_grande") {
                $titulo_erro = "Nome da cidade está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe o nome de uma cidade com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_requerimento"] == "cidade_inadequada") {
                $titulo_erro = "Cidade inadequada";
                $texto_erro = "A cidade informada não atende ao formato necessário: <br> Apenas letras, espaços e caracteres acentuados";
            }

            //////// CEP
            if ($_SESSION["caracteres_requerimento"] == "cep_inadequado") {
                $titulo_erro = "CEP inadequado";
                $texto_erro = "O CEP " . $_SESSION["caracteres"] . " não atende ao formato XX.XXX-XXX";
            }

            //////// BAIRRO
            if ($_SESSION["caracteres_requerimento"] == "bairro_pequeno") {
                $titulo_erro = "Nome do bairro está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe o bairro com, no mínimo, 3 caracteres.";
            } elseif ($_SESSION["caracteres_requerimento"] == "bairro_grande") {
                $titulo_erro = "Nome do bairro está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe o bairro com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_requerimento"] == "bairro_inadequado") {
                $titulo_erro = "Bairro inadequado";
                $texto_erro = "O bairro informado não atende ao formato necessário: <br> Apenas letras e/ou números, espaços e caracteres acentuados";
            }

            //////// RUA
            if ($_SESSION["caracteres_requerimento"] == "logradouro_pequena") {
                $titulo_erro = "Nome da logradouro está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe a logradouro com, no mínimo, 2 caracteres.";
            } elseif ($_SESSION["caracteres_requerimento"] == "logradouro_grande") {
                $titulo_erro = "Nome da logradouro está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe a logradouro com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_requerimento"] == "logradouro_inadequada") {
                $titulo_erro = "Logradouro inadequada";
                $texto_erro = "A logradouro informada não atende ao formato necessário: <br> Apenas letras e/ou números, espaços e caracteres acentuados";
            }

            //////// DESCRIÇÃO
            if ($_SESSION["caracteres_requerimento"] == "descricao_pequena") {
                $titulo_erro = "A descrição está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe uma descrição com, no mínimo, 50 caracteres.";
            } elseif ($_SESSION["caracteres_requerimento"] == "descricao_grande") {
                $titulo_erro = "A descrição está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe uma descrição com, no máximo, 2000 caracteres.";
            }

            unset($_SESSION["caracteres_requerimento"]);
            unset($_SESSION["caracteres"]);
        }
    }

    ///////////////////////////  ERROS - CADASTRO USUÁRIOS ////////////////////////////////////////////////
    if (isset($_SESSION["error_cadastro"]) || isset($_SESSION["caracteres_cadastro"])) {
        if (isset($_SESSION["error_cadastro"])) {
            //////// ACESSO POR URL
            if ($_SESSION["error_cadastro"] == "acesso_url") {
                $titulo_erro = "Nenhum campo completo";
                $texto_erro = "Complete as informações solicitadas para que você possa realizar seu cadastro de no sistema!";
            }

            //////// NOME
            if ($_SESSION["error_cadastro"] == "nome") {
                $titulo_erro = "Nome está inadequado";
                $texto_erro = "Informe seu nome completo para que seu perfil seja editado!";
            }

            //////// DDD
            if ($_SESSION["error_cadastro"] == "ddd") {
                $titulo_erro = "DDD está inadequado";
                $texto_erro = "Informe o DDD do seu número de telefone para que seu perfil seja editado!";
            }

            //////// TELEFONE
            if ($_SESSION["error_cadastro"] == "telefone") {
                $titulo_erro = "Telefone está inadequado";
                $texto_erro = "Informe o seu número de telefone para que seu perfil seja editado!";
            }

            //////// EMAIL
            if ($_SESSION["error_cadastro"] == "email") {
                $titulo_erro = "E-mail está inadequado";
                $texto_erro = "Informe seu e-mail para que seu perfil seja editado!";
            }

            //////// SENHA
            if ($_SESSION["error_cadastro"] == "senha") {
                $titulo_erro = "Senha está inadequada";
                $texto_erro = "Informe a sua senha de autenticação (login) para que seu perfil seja editado!";
            }

            ////////// CONFRIMAR SENHA
            if ($_SESSION["error_cadastro"] == "confirme") {
                $titulo_erro = "A confirmação da senha está inadequada";
                $texto_erro = "Informe a confirmação da senha para que seu perfil seja editado!";
            }

            //////// EMAIL JÁ EXISTE
            if ($_SESSION["error_cadastro"] == "email_inexistente") {
                $titulo_erro = "E-mail já existe";
                $texto_erro = "O e-mail informado já está cadastrado em nosso sistema!";
            }
            unset($_SESSION["error_cadastro"]);
        }

        if (isset($_SESSION["caracteres_cadastro"])) {
            //////// NOME
            if ($_SESSION["caracteres_cadastro"] == "nome_pequeno") {
                $titulo_erro = "Nome está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no mínimo, 4 caracteres.";
            } elseif ($_SESSION["caracteres_cadastro"] == "nome_grande") {
                $titulo_erro = "Nome está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_cadastro"] == "nome_inadequado") {
                $titulo_erro = "Nome inadequado";
                $texto_erro = "O nome informado não atende ao formato necessário: <br> Apenas letras, espaços e caracteres acentuados";
            }

             //////// DDD
            if ($_SESSION["caracteres_cadastro"] == "ddd_inadequado") {
                $titulo_erro = "DDD inadequado";
                $texto_erro = "O DDD informado não atende ao formato: (XX)";
            }

             //////// TELEFONE
             if ($_SESSION["caracteres_cadastro"] == "telefone_inadequado") {
                $titulo_erro = "Telefone inadequado";
                $texto_erro = "O telefone informado não atende ao formato: XXXXX-XXXX";
            }
            
            //////// EMAIL
            if ($_SESSION["caracteres_cadastro"] == "email_pequeno") {
                $titulo_erro = "Email está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no mínimo, 7 caracteres.";
            } elseif ($_SESSION["caracteres_cadastro"] == "email_grande") {
                $titulo_erro = "Email está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu email com, no máximo, 150 caracteres.";
            }

            if ($_SESSION["caracteres_cadastro"] == "senhas_diferentes") {
                $titulo_erro = "As senhas informadas não estão iguais";
                $texto_erro = "Informe novamente sua senha e confirme-a";
            }

            unset($_SESSION["caracteres_cadastro"]);
            unset($_SESSION["caracteres"]);
        }
    }


    ///////////////////////////  ERROS - ALTERER PERFIL ////////////////////////////////////////////////
    if (isset($_SESSION["error_perfil"]) ||isset($_SESSION["caracteres_perfil"])) {

        if (isset($_SESSION["error_perfil"])) {
            //////// ACESSO POR URL
            if ($_SESSION["error_perfil"] == "acesso_url") {
                $titulo_erro = "Nenhum campo completo";
                $texto_erro = "Complete as informações solicitadas para que você possa alterar seu perfil!";
            }

            //////// NOME
            if ($_SESSION["error_perfil"] == "nome") {
                $titulo_erro = "Nome está inadequado";
                $texto_erro = "Informe seu nome completo para que seu perfil seja editado!";
            }

            //////// DDD
            if ($_SESSION["error_perfil"] == "ddd") {
                $titulo_erro = "DDD está inadequado";
                $texto_erro = "Informe o DDD do seu número de telefone para que seu perfil seja editado!";
            }

            //////// TELEFONE
            if ($_SESSION["error_perfil"] == "telefone") {
                $titulo_erro = "Telefone está inadequado";
                $texto_erro = "Informe o seu número de telefone para que seu perfil seja editado!";
            }

            //////// EMAIL
            if ($_SESSION["error_perfil"] == "email") {
                $titulo_erro = "E-mail está inadequado";
                $texto_erro = "Informe seu e-mail para que seu perfil seja editado!";
            }

            //////// SENHA
            if ($_SESSION["error_perfil"] == "senha") {
                $titulo_erro = "Senha está inadequada";
                $texto_erro = "Informe a sua senha de autenticação (login) para que seu perfil seja editado!";
            }

            ////////// CONFRIMAR SENHA
            if ($_SESSION["error_perfil"] == "confirme") {
                $titulo_erro = "A confirmação da senha está inadequada";
                $texto_erro = "Informe a confirmação da senha para que seu perfil seja editado!";
            }

            //////// EMAIL JÁ EXISTE
            if ($_SESSION["error_perfil"] == "email_inexistente") {
                $titulo_erro = "E-mail já existe";
                $texto_erro = "O e-mail informado já está cadastrado em nosso sistema!";
            }
            unset($_SESSION["error_perfil"]);
        }

        
        if (isset($_SESSION["caracteres_perfil"])) {
            //////// NOME
            if ($_SESSION["caracteres_perfil"] == "nome_pequeno") {
                $titulo_erro = "Nome está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no mínimo, 4 caracteres.";
            } elseif ($_SESSION["caracteres_perfil"] == "nome_grande") {
                $titulo_erro = "Nome está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no máximo, 150 caracteres.";
            }elseif ($_SESSION["caracteres_perfil"] == "nome_inadequado") {
                $titulo_erro = "Nome inadequado";
                $texto_erro = "O nome informado não atende ao formato necessário: <br> Apenas letras, espaços e caracteres acentuados";
            }

             //////// DDD
            if ($_SESSION["caracteres_perfil"] == "ddd_inadequado") {
                $titulo_erro = "DDD inadequado";
                $texto_erro = "O DDD informado não atende ao formato: (XX)";
            }

             //////// TELEFONE
             if ($_SESSION["caracteres_perfil"] == "telefone_inadequado") {
                $titulo_erro = "Telefone inadequado";
                $texto_erro = "O telefone informado não atende ao formato: XXXXX-XXXX";
            }
            
            //////// EMAIL
            if ($_SESSION["caracteres_perfil"] == "email_pequeno") {
                $titulo_erro = "Email está com apenas " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu nome com, no mínimo, 7 caracteres.";
            } elseif ($_SESSION["caracteres_perfil"] == "email_grande") {
                $titulo_erro = "Email está com " . $_SESSION["caracteres"] . " caracteres";
                $texto_erro = "Informe seu email com, no máximo, 150 caracteres.";
            }

            if ($_SESSION["caracteres_perfil"] == "senhas_diferentes") {
                $titulo_erro = "As senhas informadas não estão iguais";
                $texto_erro = "Informe novamente sua senha e confirme-a";
            }

            unset($_SESSION["caracteres_perfil"]);
            unset($_SESSION["caracteres"]);
        }
    }
    
?>
    <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
        <h6 class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <strong><?= $titulo_erro ?></strong>
        </h6>
        <?= $texto_erro ?>
        <button type="button" class="btn-close my-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
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
        $texto_erro = "Retorne à página de histórico e selecione um requerimento para alterar suas informações";
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


///////////////////////////  ERROS MANIPULAÇÃO IMAGEM  ////////////////////////////////////////////////
if (isset($_SESSION["mostrar_imagem"]) && basename($_SERVER["PHP_SELF"]) == "mostrar-imagem.php") {
    if ($_SESSION["mostrar_imagem"] == "acesso_url") {
        $titulo_erro = "Página inacessível";
        $texto_erro = "A página <code>mostrar-imagem.php</code> não pode ser acessada por URL.
        <br>Ela apenas é utilizada para retornar as imagens dos requerimentos <br> para a página <code>visualizar-requerimento.php</code>";
    }
    include 'header.php';
?>

    <div class="row d-flex align-items-center h-100">
        <div class="col-md-6 text-center">
            <h2 class="mt-2 text-danger"><?= $titulo_erro ?></h2>
            <p><?= $texto_erro ?></p>
        </div>
        <div class="mx-auto col-md-6">
            <img src="../image/warning.png" alt="" width="75%" class="d-block mx-auto">
        </div>
    </div>

<?php
    include 'js.php';
    unset($_SESSION["mostrar_imagem"]);
}

//////////////////////////////////////////////// ID INFORMADO NÃO ESTÁ NO BANCO DE DADOS 
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

///////////////////////////   ERROS DE LOGIN  ////////////////////////////////////////////////
if (isset($_SESSION["error_login"])) {
    //////// ACESSO POR URL
    if ($_SESSION["error_login"] == "email") {
        $titulo_erro = "Informe seu e-mail para efetuar login!";
    }
    //////// TITULO
    if ($_SESSION["error_login"] == "senha") {
        $titulo_erro = "Informe sua senha para efetuar login!";
    }
    //////// TITULO
    if ($_SESSION["error_login"] == "acesso_url") {
        $titulo_erro = "Informe suas credenciais para efetuar login!";
    }
    ?>

        <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <?= $titulo_erro ?>
            <button type="button" class="btn-close my-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
    unset($_SESSION["error_login"]);
}

/////////////////////////// EMAIL OU SENHA INCORRETA /////////////////////////////////////////////////////
if (isset($_SESSION["senha_invalida"]) || isset($_SESSION["email_invalido"])) {
    echo "GERAL";
    //////// EMAIL ERRADO
    if (isset($_SESSION["email_invalido"])) {
        $titulo_erro = 'O e-mail <b class="text-danger">' . $_SESSION["email_invalido"] . "</b> não existe!";
        unset($_SESSION["email_invalido"]);
        echo "email";
    }
    //////// SENHA ERRADA
    if (isset($_SESSION["senha_invalida"])) {
        $titulo_erro = "A senha informada está incorreta!";
        unset($_SESSION["senha_invalida"]);
        echo "senha";
    }
    ?>
        <div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 py-auto" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <?= $titulo_erro ?>
            <button type="button" class="btn-close my-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
}
