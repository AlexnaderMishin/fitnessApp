<?php
session_start();
require_once 'functions.php';
header('Content-Type: application/json; charset=utf-8');

$data = $_POST["data"];
$data = json_decode($data, TRUE);

$username = $data['username'];
$login = $data['login'];
$password1 = $data['password'];
$password2 = $data['passwordConf'];

// Получаем данные для проверки существования пользователя
$result = queryMysql("SELECT login FROM users WHERE login='$login'");
$row = $result->fetch();

// Паттерн для проверки входных данных 
$patternLogin = '/^[a-zA-Z][a-zA-Z0-9]{4,12}$/';
// $patternUsername = '/^[а-яА-Я]{4,12}$/';
$patternUsername = '/^[а-яА-Я]{4,12}$/u';
$patternPass = '/^[a-zA-Z0-9]{8,15}$/';

// Проверка логина на соответствие требованиям
if ($row && $login == $row['login']) {
    $response = [
        "message" => 'Логин занят!',
        "status" => false
    ];
    echo json_encode($response);
    exit();
}

if (!preg_match($patternUsername, $username)) {
    $response = [
        "message" => 'Имя пользователя должно состоять из кирилицы',
        "status" => false
    ];
    echo json_encode($response);
    exit();
}
// проверка имени пользователя
if (!preg_match($patternLogin, $login)) {
    $response = [
        "message" => 'Логин не соответствует требованиям',
        "status" => false
    ];
    echo json_encode($response);
    exit();
}

if (!preg_match($patternPass, $password1)) {
    $response = [
        "message" => 'Пароль не соответствует требованиям',
        "status" => false
    ];
    echo json_encode($response);
    exit();
}

if ($password1 !== $password2) {
    $response = [
        "message" => 'Пароли не совпадают',
        "status" => false
    ];
    echo json_encode($response);
    exit();
}

// Генерация хеша пароля
$passmd5 = md5($password1);

// Подготовленный запрос для защиты от SQL-инъекций
$query = "INSERT INTO users (login, forename, password) VALUES (:login, :forename, :password)";
$stmt = $pdo->prepare($query);

$stmt->bindParam(':forename', $username);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $passmd5);

if ($stmt->execute()) {
    // Получаем ID последней вставленной записи
    $userId = $pdo->lastInsertId();
    
    // Устанавливаем сессии для автологирования
    $_SESSION['login'] = $login;
    $_SESSION['username'] = $username;
    

 
    $response = [
        "message" => 'Пользователь успешно добавлен и вы автоматически вошли в систему',
        "status" => true
    ];

} else {
    $response = [
        "message" => 'Ошибка при добавлении пользователя',
        "status" => false
    ];
}

echo json_encode($response);
exit();
?>