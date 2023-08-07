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

    echo "<p><b>Nome:</b> $nome</p>";
    echo "<p><b>DDD:</b> $ddd</p>";
    echo "<p><b>Telefone:</b> $telefone</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Password:</b> $senha</p>";
    echo "<p><b>Confirme:</b> $confirme</p>";
  
    
    $sql = "INSERT INTO `Usuario`(`nome`, `ddd`, `telefone`, `email`, `senha`) VALUES (?, ?, ?, ?, ?)";

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
