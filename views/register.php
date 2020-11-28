
<h2>Страница регистраци</h2>
<div class="input-group input-group-prepend">
    <?php
   /* if($errors){
        print_r($errors);
        foreach($errors as $er){
            print $er;
        }
    }*/
    ?>
    <form action="" class="alert alert-warning" method="post">
        <p>
            <label>Создайте логин:<br></label>
            <input class="form-control form-control-file" name="login" type="text" size="15" maxlength="15">
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input class="form-control form-control-file" name="password" type="password" size="15" maxlength="15">
        </p>
        <p>
            <input class="btn btn-outline-secondary btn-light " type="submit" name="submit"
                   value="Зарегистрироваться">
            <br>
        </p>
    </form>
</div>
<div class="input-group input-group-prepend">
    <br>

</div>

