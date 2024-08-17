<?php
require_once '../functions.php';
header('Content-Type: application/json; charset=utf-8');

$data = $_POST["data"];
$data = json_decode($data, TRUE);

$query = "INSERT INTO exercises (`title`, `group_id`, `description`) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);

foreach ($data as $newExercise) {
    $exercise = $newExercise[0]; // Предположим, что id_workout у вас также есть в массиве данных
    $group = $newExercise[1];
    $description = $newExercise[2];

    // Привязка параметров: bindValue используется в PDO
    $stmt->bindValue(1, $exercise, PDO::PARAM_INT);
    $stmt->bindValue(2, $group, PDO::PARAM_INT);
    $stmt->bindValue(3, $description, PDO::PARAM_INT);
    $stmt->execute();
}

// Закрываем подготовленный запрос и соединение
$stmt->close();
 

// Возвращаем ответ
$response = array("status" => "success");
echo json_encode($response);
exit();

?>
