<?php 
    require 'header.php';
    require 'navbar.php';

    require '../database/conexao.php';

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $ddd = filter_input(INPUT_POST, "ddd", FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirme = filter_input(INPUT_POST, "confirme", FILTER_SANITIZE_SPECIAL_CHARS);

    echo "<h5><b>Nome:</b> $nome</h5>";
    echo "<h5><b>DDD:</b> $ddd</h5>";
    echo "<h5><b>Telefone:</b> $telefone</h5>";
    echo "<h5><b>Email:</b> $email</h5>";
    echo "<h5><b>Password:</b> $senha</h5>";
    echo "<h5><b>Confirme:</b> $confirme</h5>";
  
    
    $sql = "INSERT INTO Usuario(nome, ddd, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    $result = $stmt->execute([$nome, $ddd, $telefone, $email, $senha]);
    

    if($result == true){
        ?>
            <div class="alert alert-success" role="alert">
               <h4 class="text-success">Dados gravados com SUCESSO!</h4>
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
