<?php 
include 'config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$nome = $data->nome; 
$email = $data->email; 
$senha = password_hash($data->senha, PASSWORD_DEFAULT); 
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)"; 
$stmt = $pdo->prepare($sql); 
if ($stmt->execute([$nome, $email, $senha])) { 
echo json_encode(["message" => "Usuário cadastrado!"]); 
} else { 
echo json_encode(["error" => "Erro ao cadastrar."]); 
} 
?>