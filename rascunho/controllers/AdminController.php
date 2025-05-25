<?php
require_once './config/database.php';
require_once './models/Admin.php';

$admin = new Admin($conn);

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$senha = $data['senha'] ?? '';

$result = $admin->login($email, $senha);

if($result) {
    echo json_encode(["message" => "Login bem-sucedido", "admin" => $result]);
} else {
    echo json_encode(["message" => "Credenciais inválidas"]);
}
?>