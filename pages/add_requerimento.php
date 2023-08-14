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

    echo "<h5><b>Titulo:</b> $titulo</h5>";
    echo "<h5><b>Tipo:</b> $tipo</h5>";
    echo "<h5><b>Situação:</b> $situacao</h5>";
    echo "<h5><b>Data:</b> $data</h5>";
    echo "<h5><b>Cidade:</b> $cidade</h5>";
    echo "<h5><b>CEP:</b> $cep</h5>";
    echo "<h5><b>Bairro:</b>: $bairro</h5>";
    echo "<h5><b>Rua:</b> $rua</h5>";
    echo "<h5><b>Imagem:</b> $imagem</h5>";
    echo "<h5><b>Descrição:</b> $descricao</h5>";
    echo "<h5><b>Anonimo:</b> $anonimo</h5>";
    
    $sql = "INSERT INTO requerimento(titulo, tipo, situacao, data, descricao, cep, cidade, bairro, rua) VALUES (?,?,?,?,?,?,?,?,?)";

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
