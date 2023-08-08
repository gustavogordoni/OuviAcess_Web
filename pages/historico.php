<?php
    require 'header.php';
    require 'navbar.php';

    require '../database/conexao.php';

    $sql = "SELECT `id_requerimento`, `titulo`, `tipo`, `situacao`, `data`, `descricao`, `cep`, `cidade`, `bairro`, `rua` FROM `requerimento` WHERE 1 ORDER BY data"; 
    $stmt = $conn -> query($sql);

?>

    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr class="table text-center">
                    <th scope="col" style="width:5%;"><strong>ID</strong></th>
                    <th scope="col" style="width:15%;"><strong>Título</strong></th>
                    <th scope="col" style="width:10%;"><strong>Tipo</strong></th>
                    <th scope="col" style="width:10%;"><strong>Situação</strong></th>
                    <th scope="col" style="width:10%;"><strong>Data</strong></th>
                    <th scope="col" style="width:10%;" colspan = "2"></th>
                </tr>
            </thead>

            <tbody class="text-center">

                <?php 
                    while($row =  $stmt -> fetch()){                   
                ?>

                <tr>
                    <td><?= $row["id_requerimento"] ?></td>
                    <td><?= $row["titulo"] ?></td>
                    <td><?= $row["tipo"] ?></td>
                    <td><?= $row["situacao"] ?></td>
                    <td><?= $row["data"]?></td>
                    <td>
                        <!--
                        <a href="#" class="btn btn-sm btn-primary">
                            <span data-feather = "edit"></span>
                            Visualizar
                        </a>
                        -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Detalhes</button>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">
                            <span data-feather = "trash-2"></span>
                            Excluir
                        </a>
                    </td>
                    </tr>

                <?php 
                }
                ?>

            </tbody>

        </table>

        <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel">Requerimento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
        </div>


    </div>

<?php require 'footer.php';?>