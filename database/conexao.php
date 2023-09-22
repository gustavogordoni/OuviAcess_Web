<?php
$conf = parse_ini_file("config_POSTGRE.ini");

$string_connection = $conf["driver"] .
    ":dbname=" . $conf["database"] .
    ";host=" . $conf["server"] .
    ";port=" . $conf["port"];

try {
    $conn = new PDO(
        $string_connection,
        $conf["user"],
        $conf["password"]
    );
    if ($conf["debug"] == "true") {
        //echo "<h2>Sucesso!</h2>";
        //echo "<p>Conectado ao banco <b>" . $conf["database"] . "</b></p>";
        $_SESSION["conexao_bd"] = "sucesso";
        $_SESSION["sucesso_bd"] = $conf["database"];
    }
} catch (Exception $e) {
    //echo "<p>Erro ao se conectar no banco de dados. </p>";
    //echo $e->getMessage();
    $_SESSION["conexao_bd"] = "falha";
    $_SESSION["error_bd"] = $e->getMessage();
}


// MOSTRAR IMAGEM
$host = $conf["server"];
$port= $conf["port"];
$dbname= $conf["database"];
$user= $conf["user"];
$password= $conf["password"];

$conn_imagem = pg_connect("host=$host port=5432 dbname=$dbname user=$user password=$password");