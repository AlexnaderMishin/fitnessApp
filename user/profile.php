<?php include('../header.php'); ?>
<div class="text-bg-success p-3"><p class="h6 text-center">ПРОФИЛЬ</p></div>
    <label for="fio" class="form-label">ФАМИЛИЯ ИМЯ :</label>
    <input type="text" class="form-control" id="fio" value="<?php echo $_SESSION['surname'] .' '.$_SESSION['username']; ?>">
    <label for="phone" class="form-label">НОМЕР ТЕЛЕФОНА :</label>
    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="79200432979" required />

</div>
</div>