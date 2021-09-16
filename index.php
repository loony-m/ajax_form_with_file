<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/local/templates/romana/vendor/jquery-1.8.1.min.js"></script>
<script src="./js/script.js?v3"></script>
<link rel="stylesheet" href="./css/style.css">

<form class="general__form" action="./ajax.php" method="POST" enctype="multipart/form-data">
    <div class="general-form">
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="Фамилия *" name="surname" value="">
        </div>
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="Имя *" name="name" value="">
        </div>
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="Отчество *" name="last_name" value="">
        </div>
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="Город *" name="city" value="">
        </div>
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="Телефон *" name="phone" value="">
        </div>
        <div class="general-form__field">
            <input type="text" class="inputtext" placeholder="E-mail *" name="email" value="">
        </div>
        <div class="general-form__field">
            Добавить вложение 
            <input type="file" class="inputtext" placeholder="Добавить вложение" name="file" value="">
        </div>
        <div class="general-form__field">
            <textarea name="comment" cols="40" rows="5" class="inputtextarea" placeholder="Комментарий"></textarea>
        </div>
        <div class="general-form__btn">
            <input type="submit" name="web_form_submit" value="Отправить">
        </div>
    </div>
    <p><font color="red"><span class="form-required starrequired">*</span></font> - Поля, обязательные для заполнения </p>
</form>

