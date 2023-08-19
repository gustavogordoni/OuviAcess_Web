<?php
require 'header.php';

if (!isset($_SESSION["email"])) {
?>
    <div class="alert alert-danger h-100 mb-0 text-center" role="alert">
        <h4>Você não está autenticado</h4>
        <p>Efetue sua autenticação para ter acesso ao seu histórico de requerimentos</p>
        <a href="login.php" class="mx-auto btn btn-outline-danger rounded-pill">LOGIN</a>
    </div>
    <?php
} else {

    require '../database/conexao.php';

    $sql = "SELECT id_requerimento, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE 1 ORDER BY id_requerimento";
    $stmt = $conn->query($sql);

    $cont = $stmt->rowCount();

    if ($cont == 0) {
    ?>
        <div class="d-flex h-75 text-center cor_tema">
            <div class="d-block my-auto mx-auto">
                <h1 class="mb-5 mt-3">Você ainda não realizou nenhum requerimento</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" fill="currentColor" class="bi bi-emoji-smile-upside-down" viewBox="0 0 16 16">
                    <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0-1a8 8 0 1 1 0 16A8 8 0 0 1 8 0z" />
                    <path d="M4.285 6.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 4.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 3.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 9.5C7 8.672 6.552 8 6 8s-1 .672-1 1.5.448 1.5 1 1.5 1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5.448 1.5 1 1.5 1-.672 1-1.5z" />
                </svg>
                <br><br>
                <a href="requerimento.php" class="mt-5 btn btn-outline-info rounded-pill p-3 fs-5">Realize agora!</a>
            </div>
        </div>
    <?php
        exit;
    }

    require 'navbar.php';

    ?>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-md mb-0">
            <thead>
                <tr class="table text-center">
                    <th scope="col" style="width:5%;"><strong class="modal-title">ID</strong></th>
                    <th scope="col" style="width:15%;"><strong class="modal-title">Título</strong></th>
                    <th scope="col" style="width:10%;"><strong class="modal-title">Tipo</strong></th>
                    <th scope="col" style="width:10%;"><strong class="modal-title">Situação</strong></th>
                    <th scope="col" style="width:10%;"><strong class="modal-title">Data</strong></th>
                    <th scope="col" style="width:1%;" colspan="3"></th>
                </tr>
            </thead>

            <tbody class="text-center">

                <?php
                while ($row =  $stmt->fetch()) {
                ?>

                    <tr>
                        <td><?= $row["id_requerimento"] ?></td>
                        <td><?= $row["titulo"] ?></td>
                        <td><?= $row["tipo"] ?></td>
                        <td><?= $row["situacao"] ?></td>
                        <td><?= $row["data"] ?></td>
                        <td>
                            <!--
                        <a href="visualizar-requerimento.php?id=<?= $row["id_requerimento"] ?>"" type="button" class="btn btn-outline-primary my-auto">
                        -->
                            <form action="visualizar-requerimento.php" method="POST" class="form my-auto">
                                <button class="btn btn-outline-primary my-auto mx-1 rounded-circle p-2" type="submit" value="<?= $row["id_requerimento"] ?>" name="visualizar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <!--<a href="#" type="button" class="d-block my-auto mx-auto">-->
                            <form action="editar-requerimento.php" method="POST" class="form my-auto">
                                <button class="btn btn-outline-warning my-auto mx-1 rounded-circle p-2" type="submit" value="<?= $row["id_requerimento"] ?>" name="id">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <!--<a href="#" type="button" class="d-block my-auto mx-auto">-->
                            <form action="excluir-requerimento.php" method="POST" class="form my-auto">
                                <button class="btn btn-outline-danger my-auto mx-1 rounded-circle p-2" type="submit" value="<?= $row["id_requerimento"] ?>" name="id" onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>

                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

        <?php
        /*
            $id_requerimento = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            

            if(empty($id_requerimento)){
                $show = "";
                ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>FALHA ao abrir os dados do requerimento</h4>
                        <p>ID do requerimento está vazio</p>
                    </div>  
                <?php
                exit;
            }
            else{
                $show = " show";

                $sql = "SELECT titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE id = ?";

                $stmt = $conn -> prepare($sql);
                $result = $stmt -> execute([$id]);

                $rowProduto = $stmt -> fetch();
            }

            
           */
        ?>

        <div class="modal fade <?php echo $show ?>" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4 d-block" id="exampleModalFullscreenLabel">Requerimento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-10 mx-auto">

                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label for="titulo" class="form-label"><strong>Título do requerimento: </strong></label>
                                        <input type="text" class="form-control" id="titulo" value="<?= $id_requerimento ?>" name="titulo">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                                        <input type="text" class="form-control" id="tipo" value="<?= $rowProduto['tipo'] ?>" name="tipo">
                                    </div>

                                    <div class="col-md-8">
                                        <label for="cidade" class="form-label"><strong>Cidade: </strong></label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $rowProduto['cidade'] ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="cep" class="form-label"><strong>CEP: </strong></label>
                                        <input type="text" class="form-control" id="cep" name="cep" value="<?= $rowProduto['cep'] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="bairro" class="form-label"><strong>Bairro: </strong></label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $rowProduto['bairro'] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="rua" class="form-label"><strong>Rua: </strong></label>
                                        <input type="text" class="form-control" id="rua" name="rua" value="<?= $rowProduto['rua'] ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="descricao" class="form-label"><strong>Descrição: </strong></label>
                                        <textarea class="form-control" id="descricao" style="height: 100px" name="descricao"><?= $rowProduto['descricao'] ?></textarea>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <!--
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    include 'js.php';
    ?>

<?php
}
?>