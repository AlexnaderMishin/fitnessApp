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
      <div class="accordion-body">
        
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
      <div class="accordion-body">
        <form>
          <!-- Название тренировки -->
          <br>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Название тренировки"><br>
          <!-- Выбор упражнения -->
            <select class="form-select" aria-label="Default select example">
              <option selected>Упражнение</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select><br>
          <!-- Рабочий вес -->
          <div class="row">
            <div class="col">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Вес"><br>
            </div>
            <!-- Количество подходов -->
            <div class="col">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Подходы"><br>
            </div>
            <!-- Количество повторений -->
            <div class="col">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Повт."><br>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-success" type="button">ДОБАВИТЬ</button>
          </div>
          <div class="list_exercise">
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Упражнение</th>
      <th scope="col">Вес</th>
      <th scope="col">П/п</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Жим штанги лёжа</td>
      <td>100</td>
      <td>3х4</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Жим сидя в тренажёре</td>
      <td>110</td>
      <td>3х10</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Отжимания брусья</td>
      <td>20</td>
      <td>3х10</td>
    </tr>
  </tbody>
</table>
          </div>
          <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-success" type="button">СОЗДАТЬ</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Назначить тренировку
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

      </div>
    </div>
  </div>
</div>

</div><!-- конец row -->
</div><!-- конец container -->