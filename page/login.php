<?
if (isset($_POST['login']) && isset($_POST['pass'])) {
    $result = confirm('users','','WHERE login=:login', ['login'=>$_POST['login']]);
    if (!$result) {
        $message = "login or password is wrong!";
    }else{
        $result = $result[0];
        $password = md5($_POST['pass']);
        if ($result['password'] === $password) {
            $_SESSION['login'] = $result['login'];
            $_SESSION['name'] = $result['name'];
            ?>
            <script>location="/"</script>
            <?
        }
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
        <span class="form__text">Пароль</span>
        <input type="password" class="form__input" name="pass">
        <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
    </label>
    <button class="form__btn">Вход</button>
</form>
        