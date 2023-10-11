<?php
header('Content-Type: application/json');

$database = "senatech";
$server = "localhost";
$user = "root";
$password = "";

$pdo = new PDO("mysql:dbname=$database;host=$server", $user, $password);

switch ($_GET['q']) {
    // Buscar Último Dato
    case 1:
        $statement = $pdo->prepare("SELECT capmot_vibracion, capmot_temperatura, capmot_hora FROM motor_captura");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        echo $json;
        break;
    // Buscar Todos los datos
    default:

        $statement = $pdo->prepare("SELECT capmot_vibracion, capmot_temperatura, capmot_hora FROM motor_captura");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        echo $json;
        break;

}
?>