<?php 
    require 'header.php';
    require 'navbar.php';

    require '../database/conexao.php';

    $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
    $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
    $image = filter_input(INPUT_POST, "image", FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
    $anonimo = filter_input(INPUT_POST, "anonimo", FILTER_SANITIZE_SPECIAL_CHARS);

    $situacao = "Em andamento";
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('d/m/Y');

    echo "<p><b>Titulo:</b> $titulo</p>";
    echo "<p><b>Tipo:</b> $tipo</p>";
    echo "<p><b>Situação:</b> $situacao</p>";
    echo "<p><b>Data:</b> $data</p>";
    echo "<p><b>Cidade:</b> $cidade</p>";
    echo "<p><b>CEP:</b> $cep</p>";
    echo "<p><b>Bairro:</b>: $bairro</p>";
    echo "<p><b>Rua:</b> $rua</p>";
    echo "<p><b>Imagem:</b> $imagem</p>";
    echo "<p><b>Descrição:</b> $descricao</p>";
    echo "<p><b>Anonimo:</b> $anonimo</p>";  
    
    $sql = "INSERT INTO `requerimento`(`titulo`, `tipo`, `situacao`, `data`, `descricao`, `cep`, `cidade`, `bairro`, `rua`) VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = $conn -> prepare($sql);

    $result = $stmt -> execute([$titulo, $tipo, $situacao, $data , $descricao , $cep , $cidade , $bairro , $rua]);

    if($result == true){
        ?>
            <div class="alert alert-success" role="alert">
               <h4>Dados gravados com SUCESSO!</h4>
            </div>
        <?php
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
                <h4>FALHA ao efetuar a gravação dos dodos</h4>
                <p><?= $stmt -> error; ?></p>
            </div>  
        <?php

    }
    require 'footer.php';?>
