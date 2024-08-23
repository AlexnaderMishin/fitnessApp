<?php
require_once '../functions.php';
header('Content-Type: application/json; charset=utf-8');

$data = $_POST["data"];
$data = json_decode($data, TRUE);

$user = $data['user'];
$program = $data['program'];


$query = "INSERT INTO user_program (id_user, id_program) VALUES (:username, :program)";
$stmt = $pdo->prepare($query);

$stmt->bindParam(':username', $user);
$stmt->bindParam(':program', $program);

$stmt->execute();
// Возвращаем ответ
$response = array("status" => "success");
echo json_encode($response);
exit();

?>














