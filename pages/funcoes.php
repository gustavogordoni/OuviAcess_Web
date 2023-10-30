<?php 

function autenticado(){
    if (isset($_SESSION["id_usuario"])) {
        return true;
    } else {
        return false;
    }
}

function redireciona ($pagina = null){

    if(empty($pagina)){
        $pagina = "index.php";
    }
    header("Location: " . $pagina);
}

?>