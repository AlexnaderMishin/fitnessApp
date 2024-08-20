<?php
require_once '../functions.php';
header('Content-Type: application/json; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idUser = $_SESSION['id'];
$data = $_POST["data"];
$data = json_decode($data, TRUE);

$confExercises = $data['exercises'];
$timeValue = $data['timeValue'];

$query = "INSERT INTO training_history (`id_user`, `id_program`, `id_exercise`, `weight`, `repeat_count`, `training_time`, `date`) VALUES (?, ?, ?, ?, ?, ?, NOW())";
$stmt = $pdo->prepare($query);

foreach ($confExercises as $exercise) {
    $id_program = $exercise[0];
    $id_exercise = $exercise[1];
    $weight = $exercise[2];
    $repeat_count = $exercise[3];

    // Привязка параметров: bindValue используется в PDO
    $stmt->bindValue(1, $idUser, PDO::PARAM_INT);
    $stmt->bindValue(2, $id_program, PDO::PARAM_INT);
    $stmt->bindValue(3, $id_exercise, PDO::PARAM_INT);
    $stmt->bindValue(4, $weight, PDO::PARAM_INT);
    $stmt->bindValue(5, $repeat_count, PDO::PARAM_INT);
    $stmt->bindValue(6, $timeValue, PDO::PARAM_STR); // Если это строка (например, '00:39'), используйте PDO::PARAM_STR
    $stmt->execute();
}

// Поэтому, мы не можем использовать $stmt->close();, рекомендуется не закрывать подготовленные запросы явно, PHP должен делать это автоматически.

// Возвращаем ответ
$response = array("status" => "success");
echo json_encode($response);

exit();
