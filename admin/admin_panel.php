<?php include('../header.php'); ?>

<div class="row">
<div class="text-bg-primary p-3"><p class="h6 text-center">ПАНЕЛЬ АДМИНИСТРАТОРА</p></div>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Добавить упражнение
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body text-center">
        <!-- Ваш контент внутри аккордеона -->
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Название упражнения</label>
          <input type="text" class="form-control" id="exercise_title" placeholder="Становая тяга">
        </div>
        <div class="mb-3">
          <label for="choise_group" class="form-label">Группа мышц</label>
          <select class="form-select" id="choise_group">
                    <?php
                    $result = queryMysql("SELECT id, category FROM muscle_group");
                    while ($row = $result->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                    }
                    ?>
                </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Методические указания</label>
          <textarea class="form-control" id="exercise_desk" rows="3" placeholder="Необязательно"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-success" type="button" onclick="addExercise()">ДОБАВИТЬ</button>
            </div>
        

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Новая программа тренировок
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body text-center">
          <form action="#" class="accordion-body">
          <label for="example-select" class="form-label"><strong>Программа</strong></label>
              <div class="custom-select-container">
                <select class="form-select" id="choise_program">
                    <?php
                    $result = queryMysql("SELECT id, title FROM workouts");
                    while ($row = $result->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                    }
                    ?>
                </select>
                
              </div>
            <label for="example-select" class="form-label"><strong>Выбор упражнения</strong></label>
              <div class="custom-select-container">
                <select class="custom_select" id="example-select">
                    <?php
                    $result = queryMysql("SELECT id, title FROM exercises");
                    while ($row = $result->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                    }
                    ?>
                </select>
                
              </div>
              <label for="" class="form-label"><strong>Настроить :</strong></label>
            <div class="container">
              <div class="row">
              <div class="col">
                <input type="number" class="form-control" id="weightProgram" placeholder="Вес">
              </div>
            <!-- Количество подходов -->
              <div class="col">
                <input type="number" class="form-control" id="setCount" placeholder="Подходы">
              </div>
            <!-- Количество повторений -->
              <div class="col">
                <input type="number" class="form-control" id="repeatCount" placeholder="Повт."><br>
              </div>
              </div>
            </div>
            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-primary" type="button" onclick="addProgram()">ДОБАВИТЬ</button>
            </div>
          </form>
          <div class="table_info">
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Упражнение</th>
                    <th scope="col">Вес</th>
                    <th scope="col">П/п</th>
                </tr>
            </thead>
            <tbody id="exerciseTable">
                
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-success" type="button" onclick="sendProgram()">СОЗДАТЬ</button>
            </div>
          </div>
        </div>
    </div>
  </div>

</div> <!-- Конец #accordionFlushExample -->

<!-- Подключите jQuery и Bootstrap JS -->


</div><!-- конец row -->
</div><!-- конец container -->

<script type="text/javascript">

        $(document).ready(function() {
            $('#example-select, [aria-label="Default select example"]').select2({
                theme: 'bootstrap-5'
            });
        });
        var dataExercise = [];
        // сохраняю упражнения в массив для препросмотра
        function addProgram(){
          var program = $('#choise_program').val();
          var exercise = $('#example-select').val();
          var exerciseTable = $('#example-select option:selected').html();;
          var weight = $('#weightProgram').val();
          var sets = $('#setCount').val();
          var repeat = $('#repeatCount').val();
          // пушу список упражнений в массив
          dataExercise.push([program, exercise, weight, sets, repeat]);
          console.log(dataExercise);
          // вывожу список упражнений в таблицу
          var tbody = document.getElementById('exerciseTable');
          var rowNumber = tbody.rows.length + 1;

            var newRow = tbody.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = rowNumber;
            cell2.innerHTML = exerciseTable;
            cell3.innerHTML = weight;
            cell4.innerHTML = sets + 'х' + repeat;
            cell5.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Удалить</button>';
        }
        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            dataExercise.pop();
            // console.log(dataExercise);
             // Перенумерация строк
             var tbody = document.getElementById('exerciseTable');
            for (var i = 0; i < tbody.rows.length; i++) {
                tbody.rows[i].cells[0].innerHTML = i + 1;
            }
        }
        // отправляю полученные данные о тренировке 
        function sendProgram(){
          $.ajax({
               url: 'admin.php',
               type: 'post',
               data: { data: JSON.stringify(dataExercise) },
               dataType: 'json',
               success: function() {
            console.log(); // Логирование сообщения
            
        },
               error: function() {
                   console.log('error');
               }
           });
          // console.log(dataExercise);
        }

      var newExercise = [];
      function addExercise(){
      var exercise_title = $('#exercise_title').val();
      var exercise_group = $('#choise_group').val();
      var exercise_desk = $('#exercise_desk').val();
      
      newExercise.push([exercise_title, exercise_group, exercise_desk]);
      console.log(newExercise);

      $.ajax({
               url: 'admin.php',
               type: 'post',
               data: { data: JSON.stringify(newExercise) },
               dataType: 'json',
               success: function() {
            console.log(); // Логирование сообщения
            
        },
               error: function() {
                   console.log('error');
               }
           });
      }
    </script>