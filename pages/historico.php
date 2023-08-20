<?php
include 'header.php';
include 'navbar.php';

if (!isset($_SESSION["email"])) {
?>
    <div class="row cor_tema d-flex align-items-center">
        <div class="col-md-6 text-center">
            <h2 class="mt-2">Efetue sua autenticação para ter acesso ao seu histórico de requerimentos</h2>
            <h2><a href="login.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-3 mt-2">Faça Login</a></h2>

        </div>
        <div class=" mx-auto col-md-6">
            <img src="../image/identifique-se.png" alt="" class="w-75">
        </div>

    </div>
    <?php
} else {

    require '../database/conexao.php';

    $sql = "SELECT id_requerimento, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua FROM requerimento WHERE 1 ORDER BY id_requerimento";
    $stmt = $conn->query($sql);

    $cont = $stmt->rowCount();


    if ($cont == 0) {
    ?>
        <div class="d-flex text-center cor_tema">
            <div class="d-block my-auto mx-auto">
                <div class="w-100 mx-auto">
                    <?php include '../image/historico.svg'; ?>
                </div>

                <h2 class="mt-2">Você ainda não realizou nenhum <br> <a href="requerimento.php" class="btn btn-outline-info p-2 px-4 rounded-pill fs-2 mt-2">Requerimento</a></h2>
            </div>
        </div>
    <?php
        exit;
    }
    ?>

    <div class="table-responsive mt-2">
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

    </div>

    <?php
    include 'footer.php';
    include 'js.php';
    ?>

<?php
}
?>