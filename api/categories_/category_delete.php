<?php
require_once __DIR__ .'/../auth/middleware.php';
require_once __DIR__ .'/middleware.php';
require_once __DIR__ .'/../db/db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
$payload = rights_auth_check(['admin']);
$cat_id = check_get_catid();

$conn = create_conn();
$stmt=$conn->prepare('DELETE FROM categories WHERE ID = :id');
$stmt->execute(['id'=>$cat_id]);
$answer = ['error' => null, 'error_descr' => null];
http_response_code(200);
echo json_encode($answer);
