<?php include('../header.php');  

?>
<style>
        .accordion-body {
            padding: 15px;
        }

        .text-center {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
    </style>
<div class="p-3">
    <p class="h4" id="workoutID" data-value="<?php echo $_GET['id']; ?>">ТРЕНИРОВКА</p>
    <span id="">Время тренировки : </span><span id="timerid">0:00</span><br />
   
    
</div>
<section class="container">

<div class="accordion accordion-flush" id="accordionFlushExample">
<?php
$exerciseQuery = "
SELECT e.id AS `exercise_id`, e.title AS `exercise_title`, pe.weight AS `weight`, pe.set_count AS `sets`, pe.repeat_count AS `repeat`
FROM exercises e
JOIN program_exercise pe ON e.id = pe.exercise_id
WHERE pe.id_workout = " . $_GET['id'];
$exerciseResult = queryMysql($exerciseQuery);

$index = 0;
while ($exerciseRow = $exerciseResult->fetch()) {
    $uniqueId = 'flush-collapse' . $index;
    echo '<div class="accordion-item">
        <h2 class="accordion-header" id="heading' . $index . '">
            <button class="accordion-button collapsed" type="button"  data-bs-toggle="collapse" data-bs-target="#' . $uniqueId . '" aria-expanded="false" aria-controls="' . $uniqueId . '">
                '.$exerciseRow['exercise_title'].'
            </button>
        </h2>
        <div id="' . $uniqueId . '" class="accordion-collapse collapse" aria-labelledby="heading' . $index . '" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">';
                
            for ($i = 0; $i < $exerciseRow['sets']; $i++) {
                echo '<div class="d-flex align-items-center mb-3">
                    <div class="form-check me-3">
                            <input class="form-check-input exercise-checkbox" type="checkbox" value="'.$exerciseRow['exercise_id'].'" id="exercise-'.$index.'-'.$i.'">
                        </div>
                    <div class="d-flex align-items-center me-3">
                            <input type="text" class="form-control me-2 weight-input" id="weight-'.$index.'-'.$i.'" value="'.$exerciseRow['weight'].'">
                            <p class="mb-0">вес</p>
                        </div>
                    <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2 repeat-input" id="repeat-'.$index.'-'.$i.'" value="'.$exerciseRow['repeat'].'">
                            <p class="mb-0">повт.</p>
                        </div>
                </div>';
            }
                
    echo '</div>
        </div>
    </div>';
    $index++;
}
?>
<div class="d-grid gap-2">
  <button class="btn btn-success" onclick="sendProg()" type="button">Закончить тренировку</button>
</div>
</div>

</section>
<script>
    // var confExercises = [];
    document.addEventListener("DOMContentLoaded", function () {
    // Переменные для отслеживания времени
    let totalSeconds = 0;
    // Функция для обновления таймера
    function updateTimer() {
        // Увеличиваем количество секунд
        totalSeconds++;
        // Вычисляем минуты и секунды
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        // Форматируем секунды для отображения с ведущим нулем, если меньше 10
        const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;
        // Обновляем содержимое элемента с ID timerid
        document.getElementById('timerid').textContent = `${minutes}:${formattedSeconds}`;
    }
    // Запуск функции updateTimer каждую секунду
    setInterval(updateTimer, 1000);
});




//массив данных о тренировке
var confExercises = [];
// время тренировки

var workoutID = $('#workoutID').data('value')
$(document).ready(function() {

    // Объявляем массив для хранения данных


    // Прикрепить обработчик события click к чекбоксам
    $('.form-check-input').on('click', function() {
        // Находим родительский элемент, который содержит текущие элементы формы
        var $row = $(this).closest('.d-flex');

        // Получаем значение кликнутого чекбокса и соответствующих полей ввода
        var exerciseId = $(this).val();
        var timeValue = $('#timerid').text();
        var weight = $row.find('.weight-input').val();
        var repeat = $row.find('.repeat-input').val();

        // Добавляем данные в массив
        confExercises.push([workoutID, exerciseId, weight, repeat]);
        
        // Выводим массив в консоль для проверки
        console.log(confExercises);
    });
});

 function sendProg() {
    var dataToSend = {
        exercises: confExercises,
        timeValue: $('#timerid').text() // Получаем timeValue непосредственно перед отправкой
    };
    $.ajax({
               url: '../back/confirmProgram.php',
               type: 'post',
               data: { data: JSON.stringify(dataToSend)  },
               dataType: 'json',
               success: function() {
                console.log('сукес'); // Логирование сообщения
            
        },
               error: function() {
                   console.log('error');
               }
           });
          
    // console.log(confExercises);
    
 }

</script>