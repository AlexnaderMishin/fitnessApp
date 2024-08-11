<?php
require_once 'functions.php';

// вывожу данные по группам мышц
$result = queryMysql("SELECT * FROM `muscle_group`");
$arrGroup = array();
while ($row = $result->fetch()) {
    $arrGroup[] = $row['category'];
    // $post_dataGroup = json_encode($arrGroup);
    $response = [
        "data" => $arrGroup,
        "message" => 'данные отправлены',
        "status" => true
    ];
    
  
}
echo json_encode($response);
exit();
?>



















<!-- запросы -->

 <!-- добавить новое упражнение
INSERT INTO `exercises`(`id`, `title`, `group_id`, `description`, `video`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

вывести группы мышц
SELECT * FROM `muscle_group` WHERE 1 -->