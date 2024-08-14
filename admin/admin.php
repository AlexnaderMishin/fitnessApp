<?php
require_once '../functions.php';
header('Content-Type: application/json; charset=utf-8');

$data = $_POST["data"];
$data = json_decode($data, TRUE);

$query = "INSERT INTO program_exercise (id_workout, exercise_id, weight, set_count, repeat_count) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);

foreach ($data as $exercise) {
    $id_workout = $exercise[0]; // Предположим, что id_workout у вас также есть в массиве данных
    $exercise_id = $exercise[1];
    $weight = $exercise[2];
    $set_count = $exercise[3];
    $repeat_count = $exercise[4];

    // Привязка параметров: bindValue используется в PDO
    $stmt->bindValue(1, $id_workout, PDO::PARAM_INT);
    $stmt->bindValue(2, $exercise_id, PDO::PARAM_INT);
    $stmt->bindValue(3, $weight, PDO::PARAM_INT);
    $stmt->bindValue(4, $set_count, PDO::PARAM_INT);
    $stmt->bindValue(5, $repeat_count, PDO::PARAM_INT);
    $stmt->execute();
}

// Закрываем подготовленный запрос и соединение
$stmt->close();
 

// Возвращаем ответ
$response = array("status" => "success");
echo json_encode($response);
exit();

?>



















<!-- запросы -->

 <!-- добавить новое упражнение
INSERT INTO `exercises`(`id`, `title`, `group_id`, `description`, `video`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

вывести группы мышц
SELECT * FROM `muscle_group` WHERE 1 -->