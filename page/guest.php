<?
foreach ($_POST as $key => $value) {
    $GLOBALS[$key] = $value;
}
if ($descr && $name && $login) {
    if ($_GET['command'] === 'edit') {
        editComment();
        ?><script>location="/guest"</script><?
    }else{
        addComment();
    }
}
if ($_GET['command'] === 'del') {
    delComment();
}

$result = confirm('comments','ORDER BY id DESC');

?>
<form action="" class="form" method="post">
    <?if ($_SESSION['login']) {?>
        <input type="hidden" name="name" value="<?=$_SESSION['name']?>">
        <input type="hidden" name="login" value="<?=$_SESSION['login']?>">
    <?}else{?>
    <label class="form__label">
        <span class="form__text">Введите имя</span>
        <input type="text" class="form__input" name="name">
        <input type="hidden" class="form__input" name="login" value="unknown">
    </label>
    <?}?>
    
    <label class="form__label">
        <span class="form__text">Оставте отзыв</span>
        <textarea class="form__input" name="descr">
            <?
            if ($_GET['command'] == 'edit') {
                foreach ($result as $key => $value) {
                    if ($value['id'] == $_GET['id']) {
                        echo $value['text'];
                        break;
                    }
                }
            }
            ?>
        </textarea>
    </label>
    <button class="form__btn">Отправить</button>
</form>
<div class="comments">
    <?
    if (count($result)) {
    foreach ($result as $key => $comment) {
        ?>
        <div class="comments__item">
            <p class="comments__item-time"><?=$comment['time']?></p>
            <section class="comments__body">
                <div class="comments__head">
                    <h2 class="comment__head-title"><?=$comment['name']?></h2>
                    <img src="/img/1.jpg" alt="" class="comments__head-img">
                </div>
                <p class="comments__body-descr"><?=$comment['text']?></p>
                <div class="comments__footer">
                    <?
                    if ($_SESSION['login'] === $comment['login']) {
                        ?>
                        <a href="/guest/edit/<?=$comment['id']?>" class="comments__footer-link"><i class="fal fa-edit"></i></a>
                        <a href="/guest/del/<?=$comment['id']?>" class="comments__footer-link"><i class="fal fa-trash"></i></a>
                        <?
                    }
                    ?>
                    
                </div>
            </section>
        </div>
        <?
    }
    }else{
        echo "<p>No Comment</p>";
    }
    ?>
    
</div>
        