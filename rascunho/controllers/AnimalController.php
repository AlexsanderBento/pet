<?php
require_once './config/database.php';
require_once './models/Animal.php';

$animal = new Animal($conn);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $result = $animal->listar();
        $animais = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($animais);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if($animal->cadastrar($data)) {
            echo json_encode(["message" => "Animal cadastrado com sucesso."]);
        } else {
            echo json_encode(["message" => "Erro ao cadastrar."]);
        }
        break;

    default:
        echo json_encode(["message" => "Método não permitido."]);
        break;
}
?>