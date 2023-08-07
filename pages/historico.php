<?php
    require 'header.php';
    require 'navbar.php';

    require '../database/conexao.php';

    /*
    $sql = "SELECT `id`, `titulo`, `tipo`, `situacao`, `data` FROM `historico` WHERE 1 ORDER BY nome"; 
    $stmt = $conn -> query($sql);
    */
?>

    <div class="table-responsive">
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

                <tr>
                    <td>001</td>
                    <td>Título genérico</td>
                    <td>Denúncia</td>
                    <td>Pendente</td>
                    <td>01/01/2001</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <span data-feather = "edit"></span>
                            Visualizar
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">
                            <span data-feather = "trash-2"></span>
                            Excluir
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>001</td>
                    <td>Título genérico</td>
                    <td>Denúncia</td>
                    <td>Pendente</td>
                    <td>01/01/2001</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <span data-feather = "edit"></span>
                            Visualizar
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">
                            <span data-feather = "trash-2"></span>
                            Excluir
                        </a>
                    </td>
                </tr>

            
                <?php /*
                    while($row =  $stmt -> fetch()){           */          
                ?>

                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["titulo"] ?></td>
                    <td><?= $row["tipo"] ?></td>
                    <td><?= $row["situacao"] ?></td>
                    <td><?= $row["data"]?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <span data-feather = "edit"></span>
                            Visualizar
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">
                            <span data-feather = "trash-2"></span>
                            Excluir
                        </a>
                    </td>
                </tr>

                <?php 
                /*}*/
                ?>

            </tbody>

        </table>

    </div>

<?php require 'footer.php';?>