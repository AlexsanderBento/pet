<?php
$request = $_GET['request'] ?? '';

switch ($request) {
    case 'animais':
        require '../controllers/AnimalController.php';
        break;
    case 'admin':
        require '../controllers/AdminController.php';
        break;
    default:
        echo json_encode(["message" => "Rota não encontrada"]);
        break;
}
?>