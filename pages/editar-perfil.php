<?php
require 'header.php';

function facaLogin($pagina = null)
{
    if (empty($pagina)) {
        $pagina = "login.php";
    }
    header("Location: " . $pagina);
}

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
} elseif (!isset($_SESSION["id_usuario"])) {
    $_SESSION["realizar_login"] = "editar-perfil";
    facaLogin();
    die();
}

require '../database/conexao.php';

$sql = "SELECT nome, ddd, telefone, email, senha FROM usuario WHERE id_usuario = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usuario]);
$rowUsuario = $stmt->fetch();
$cont =  $stmt->rowCount();

require 'navbar.php';
?>

<div class="container mx-auto">
    <main>
        <div class="py-3 text-center mt-4">
            <strong>
            <h2>Olá <strong><?= $rowUsuario['nome'] ?></strong>  <span class="fs-2">&#128075;</span></h2>
            </strong>
        </div>

        <div class="row">
            <div class="col-11 mx-auto mb-4">

                <form class="needs-validation" action="alterar-perfil.php" method="POST">
                    <div class="row g-3">

                        <div class="col-sm-12">
                            <label for="nome" class="form-label" id="label_nome"><strong>Nome completo: </strong></label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Carlos Alberto" required pattern="[A-Za-zÀ-ÿ\s]+" title="Não informe caracteres que não sejam letras" onblur="nome();"  value="<?= $rowUsuario["nome"] ?>"maxlength="150">
                            <div class="invalid-feedback">
                                Informe seu nome completo
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="ddd" class="form-label"><strong>DDD: </strong></label>
                            <input type="tel" class="form-control" id="ddd" name="ddd" required pattern="\([0-9]{2}\)$" title="Digite o DDD no formato (DD)" placeholder="Ex: (17)" value="<?= $rowUsuario["ddd"] ?>" maxlength="4">

                            <div class="invalid-feedback">
                                Informe um valor válido
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <label for="telefone" class="form-label"><strong>Número de telefone: </strong></label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required pattern="[0-9]{4,6}-[0-9]{3,4}$" title="Digite o telefone no formato XXXXX-XXXX" placeholder="Ex: 99999-9999" maxlength="10" value="<?= $rowUsuario["telefone"] ?>" maxlength="10">
                            <div class="invalid-feedback">
                                Informe um valor válido
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label"><strong>E-mail: </strong></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="voce@exemplo.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?= $rowUsuario["email"] ?>"maxlength="150">
                                <div class="invalid-feedback">
                                    Por favor, insira um endereço de e-mail válido para efetuar login
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 col-12 row">
                            <div class="col-md-6 mb-3">
                                <button class="w-100 btn btn-secondary btn-lg rounded-pill px-3" type="reset">Limpar</button>
                            </div>
                            <div class="col-md-6">
                                <button class="w-100 btn btn-primary btn-lg rounded-pill px-3" type="submit">Enviar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

    </main>
</div>

<script>
    //function validacaoUsuarios();

    document.addEventListener("DOMContentLoaded", function() {
        const dddInput = document.getElementById("ddd");
        const labelDdd = document.querySelector("label[for='ddd']");
        const telefoneInput = document.getElementById("telefone");
        const labelTelefone = document.querySelector("label[for='telefone']");

        dddInput.addEventListener("input", function() {
            const inputValue = dddInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
            const maxLength = 2;
            const truncatedValue = inputValue.slice(0, maxLength);
            const formattedValue = formatDDD(truncatedValue);
            dddInput.value = formattedValue;
        });

        telefoneInput.addEventListener("input", function() {
            const inputValue = telefoneInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
            const maxLength = 10;
            const truncatedValue = inputValue.slice(0, maxLength);
            const formattedValue = formatTelefone(truncatedValue);
            telefoneInput.value = formattedValue;
        });

        function formatDDD(value) {
            const regex = /^(\d{2})$/;
            const formattedValue = value.replace(regex, "($1)");
            return formattedValue;
        }

        function formatTelefone(value) {
            const regex = /^(\d{5})(\d{4})$/;
            const formattedValue = value.replace(regex, "$1-$2");
            return formattedValue;
        }
    });

    function verifica_senhas() {
        var senha = document.getElementById("senha");
        var confirme = document.getElementById("confirme");
        var label_senha = document.getElementById("label_senha");
        var label_confirme = document.getElementById("label_confirme");

        if (senha.value && confirme.value) {
            if (senha.value != confirme.value) {
                senha.classList.add("is-invalid");
                confirme.classList.add("is-invalid");
                confirme.value = null;

                label_senha.classList.add("text-danger");
                label_confirme.classList.add("text-danger");

            } else {
                senha.classList.remove("is-invalid");
                confirme.classList.remove("is-invalid");
                label_senha.classList.remove("text-danger");
                label_confirme.classList.remove("text-danger");
            }
        }
    }

    const nomeInput = document.getElementById("nome");
    const labelNome = document.querySelector("label[for='nome']");

    nomeInput.addEventListener("keydown", function(event) {
        if (event.key >= '0' && event.key <= '9') {
            event.preventDefault();
        }
    });

    nomeInput.addEventListener("input", function() {
        const inputValue = nomeInput.value.replace(/\s+/g, "");
        const minLength = 4;
        const patternRegex = /^[A-Za-zÀ-ÿ\s]+$/;

        if (inputValue.length >= minLength && patternRegex.test(inputValue)) {
            nomeInput.setCustomValidity("");
            nomeInput.classList.remove("is-invalid");
            labelNome.classList.remove("text-danger");
        } else {
            nomeInput.classList.add("is-invalid");
            labelNome.classList.add("text-danger");

            if (inputValue.length < minLength) {
                nomeInput.setCustomValidity(`Informe um nome com pelo menos ${minLength} caracteres, sem contar os espaços.`);
            } else if (!patternRegex.test(inputValue)) {
                nomeInput.setCustomValidity("O nome deve conter apenas letras e espaços.");
            }
        }
    });
</script>

<?php
require 'footer.php';
require 'js.php';
?>