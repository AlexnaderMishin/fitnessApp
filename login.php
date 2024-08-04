<?php 
require_once 'header.php';
?>
<div class="container px-0">
<div class="row g-6 text-center m-0">
    

    <div class="form1" id="form1">
    <h1>Регистрация пользователя</h1>
    <form class="needs-validation" >
    <div class="col-auto">
            <label for="username" id="error_username" class="form-label"></label>
            <input type="text" class="form-control" id="username" name='username' placeholder="Имя :" required>
        </div>
        <div class="col-auto">
            <label for="login" id="error_login" class="form-label"></label>
            <input type="text" class="form-control" id="login" name='login' placeholder="Логин :" required>
        </div>
        <div class="col-auto">
            <label for="Password1" id="error_password" class="form-label"></label>
            <input type="password" class="form-control" id="password1" name='password1' placeholder="Пароль :" required>
        </div>
        <div class="col-auto">
            <label for="Password2" id="error_password2" class="form-label"></label>
            <input type="password" class="form-control" id="password2" name='password2' placeholder="Повторите пароль :" required>
        </div>
        <div class="col-auto">
            <p id="errorText"></p>
        </div>
        <div class="col">
            <button type="button" onclick="RegFunc()" class="btn btn-success">РЕГИСТРАЦИЯ</button>
            <button type="button" class="btn btn-outline-primary" id="form1btn">ВХОД</button>
        </div>
    </form>
    </div>
    
    <div class="form2" id="form2">
        <h1>Войти в профиль</h1>
    <form class="needs-validation" method="post" action="auth.php">

        <div class="col">
            <label for="validationCustom02" class="form-label"></label>
            <input type="text" class="form-control" id="validationCustom02" name='login' placeholder="Логин :"  required>
        </div>

        <div class="col">
            <label for="exampleInputPassword2" class="form-label"></label>
            <div class="input-group">            
                <div class="input-group-text" onclick="Toggle()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </div>
                <input type="password" class="form-control" id="exampleInputPassword2" name='password'  placeholder="Пароль :"  required>
            </div>
        </div>

        <div class="col">
            <p id="errorText"></p>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">ВХОД</button>
            <button type="button" class="btn btn-outline-primary" id="form2btn">РЕГИСТРАЦИЯ</button>
        </div>
    </form>
    </div>

</div> 

<script>
function Toggle() {
            let temp = document.getElementById("exampleInputPassword2");
             
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }


        $("#form2").css("display", "none"); 
        $("#form1btn").on("click", function() {
        $("#form1").css("display", "none");
        $("#form2").css("display", "block");
});
$("#form2btn").on("click", function() {
        $("#form2").css("display", "none");
        $("#form1").css("display", "block");
});


function RegFunc() {
       var username = $('#username').val();
       var login = $('#login').val();
       var password = $('#password1').val();
       var passwordConfirm = $('#password2').val();
       
       var loginRegex = /^[a-z][a-z0-9]{4,12}$/i;
       var usernameRegex = /^[а-яА-Я]{4,12}$/i;
       var passwordRegex = /^[a-zA-Z0-9]{8,16}$/;

       var toServer = {
           login: login,
           username: username,
           password: password,
           passwordConf: passwordConfirm
       }

       // проверка логина
       if (loginRegex.exec(login) !== null) {
           $('#login').css("color", "green");
           $('#error_login').css("color", "green");
           $('#login').css("border-color", "green");
           // Отправка AJAX-запроса
           $.ajax({
               url: 'signup.php',
               type: 'post',
               data: { data: JSON.stringify(toServer) },
               dataType: 'json',
               success: function(response) {
            console.log(response.message); // Логирование сообщения
            if (response.status === true) {
                // Успешная регистрация, перенаправляем на главную страницу
                window.location.href = '/'; // Здесь вы можете указать URL вашей главной страницы
            } else {
                $('#error_username').text(response.message);
                $('#error_username').css("color", "red");
                $('input').css("border-color", "red");
            }
        },
               error: function(xhr, status, error) {
                   console.log('AJAX Error: ' + status + error);
               }
           });
       } else {
           $('#error_login').text('Ошибка валидации логина!');
           $('#login').css("color", "red");
           $('#error_login').css("color", "red");
           $('#login').css("border-color", "red");
       }
   
}
</script>
