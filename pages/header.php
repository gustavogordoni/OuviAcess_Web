<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ouvidoria</title>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    
    <?php 
        function ativar ($pagina){
            if (basename($_SERVER["PHP_SELF"]) == $pagina){
                return " active";
            }
            else{
                return null;
            }
        }               

    ?>
