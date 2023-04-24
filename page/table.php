<form action="" class="form" method="post">
    <label class="form__label">
        <span class="form__text">Количество колонок</span>
        <input type="text" class="form__input" name="col">
    </label>
    <label class="form__label">
        <span class="form__text">Количество строк</span>
        <input type="text" class="form__input" name="row">
    </label>
    <button class="form__btn">Отправить</button>
</form>
<?
$col = $_POST['col'];
$row = $_POST['row'];
?>
<div class="table">
    <?
    for ($i=1; $i <=$row; $i++) { 
       ?>
       <div class="table__row">
        <?for ($j=1; $j <= $col ; $j++) { 
            ?>
            <div class="table__col"><?=$j*$i?></div>
            <?
        }?>
       </div>
       <?
    }
    ?>
</div>