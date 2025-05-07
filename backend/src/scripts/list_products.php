<?php 
include 'config.php'; 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
$limit = 5; 
$offset = ($page - 1) * $limit; 
$sql = "SELECT * FROM produtos LIMIT ? OFFSET ?"; 
$stmt = $pdo->prepare($sql); 
$stmt->execute([$limit, $offset]); 
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
echo json_encode($produtos); 
?> 
