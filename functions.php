<?php
$host = 'localhost';
$data = 'fitness';
$user = 'root';
$pass = '';
$chrs = 'utf8';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = 
[
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    
}
// запрос к БД
function queryMysql($query){
    global $pdo;
    return $pdo->query($query);
}

?>