<?php 
include 'config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$email = $data->email; 
$senha = $data->senha; 
$sql = "SELECT * FROM usuarios WHERE email = ?"; 
$stmt = $pdo->prepare($sql); 
$stmt->execute([$email]); 
$user = $stmt->fetch(PDO::FETCH_ASSOC); 
if ($user && password_verify($senha, $user['senha'])) { 
echo json_encode(["message" => "Login bem-sucedido!", "user" => $user]); 
} else { 
echo json_encode(["error" => "Credenciais inválidas"]); 
} 
?>