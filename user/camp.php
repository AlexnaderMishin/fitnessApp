<?php include('../header.php'); 
$user_id = $_SESSION['id'];

?>


<div class="p-3"><p class="h4">ТРЕНИРОВКА</p></div>

<div class="container mt-4">
<div class="row justify-content-center">
<?php
$query = "
    SELECT workouts.title AS workout_title, user_program.id_program, COUNT(pe.exercise_id) AS exercise_count
    FROM user_program
    JOIN workouts ON workouts.id = user_program.id_program
    LEFT JOIN program_exercise pe ON user_program.id_program = pe.id_workout
    WHERE user_program.id_user = $user_id
    GROUP BY workouts.title, user_program.id_program
";
$result = queryMysql($query);
while ($row = $result->fetch()) {
    echo '
    <div class="col-12 col-md-6" id="'.$row['id_program'].'" onclick="startWorkout(this)">
        <div class="content-block">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h6 font-weight-bold">'.$row['workout_title'].'</h1>
                <h1 class="h6 font-weight-bold">17 Августа 2024</h1>
            </div>
            <p class="mb-3">Упражнений: '.$row['exercise_count'].'</p>';
        
            // Выполняем дополнительный запрос для получения упражнений
            $exerciseQuery = "
                SELECT e.title AS exercise_title, pe.weight AS `weight`, pe.set_count AS `sets`, pe.repeat_count AS `repeat`
                FROM exercises e
                JOIN program_exercise pe ON e.id = pe.exercise_id
                WHERE pe.id_workout = " . $row['id_program'];
            $exerciseResult = queryMysql($exerciseQuery);

            while ($exerciseRow = $exerciseResult->fetch()) {
                echo '
                <div class="d-flex justify-content-between exercise-item">
                    <p class="mb-0">'.$exerciseRow['exercise_title'].'</p>
                    <p class="mb-0">'.$exerciseRow['weight'].'kg - '.$exerciseRow['sets'].'x'.$exerciseRow['repeat'].'</p>
                </div>';
            }

            echo '
        </div><br>
    </div>';
}
?>
</div>
</div>

<script>
function startWorkout(element) {
    var divID = element.id;
    window.location.href = 'training.php?id=' + divID;
}
</script>