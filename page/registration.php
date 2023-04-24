<?
    if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['pass']) &&  $_POST['pass'] === $_POST['confirmpass']) {
        $result = confirm('users','','WHERE login=:login',['login'=>$_POST['login']]);
        if (!$result) {
         regist();
         ?>
         <script>location = '/?page=login'</script>
         <?
        }else{
            $message = "login already token!";
        }
    }
?>
<form action="" class="form" method="post">
    <p style="color:red;text-align:center;font-size:20px;font-weight:500;text-transform:uppercase;"><?=$message?></p>
    <label class="form__label">
        <span class="form__text">Логин</span>
        <input type="text" class="form__input" name="login" autocomplete="off">
    </label>
    <label class="form__label">
        <span class="form__text">Имя</span>
        <input type="text" class="form__input" name="name" autocomplete="off">
    </label>
    <label class="form__label">
        <span class="form__text">Пароль</span>
        <input type="password" class="form__input" name="pass">
        <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
    </label>
    <label class="form__label">
        <span class="form__text">Повторите пароль</span>
        <input type="password" class="form__input" name="confirmpass">
        <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
    </label>
    <span class="form__error">* Пароли не совподают</span>
    <button class="form__btn" disabled>Зарегистрироваться</button>
</form>