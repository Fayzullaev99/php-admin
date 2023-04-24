<?
    $one = $_POST['one'];
    $two = $_POST['two'];
    $symbol = $_POST['symbol'];
    $answer = 0;
    if ($one && $two) {
        switch ($symbol) {
            case '+':
                $answer = $one + $two;
                break;
            case '-':
                $answer = $one - $two;
                break;
            case '*':
                $answer = $one * $two;
                break;
            case '/':
                $answer = $one / $two;
                break;
        }
    }
?>
<form action="" class="form" method="post">
    <label class="form__label">
        <span class="form__text">Число 1</span>
        <input type="text" class="form__input" name="one" data-type="number">
    </label>
    <div class="form__mySelect">
        <div class="form__select">
            <div class="form__select-name">Выбирите знак</div>
            <div class="form__select-option">
                
            </div>
        </div>
        <select name="symbol">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
    </div>
    <label class="form__label">
        <span class="form__text">Число 2</span>
        <input type="text" class="form__input" name="two" data-type="number"> 
    </label>
    <p style="color:red;text-align:center;font-size:20px;font-weight:500;text-transform:uppercase;">Javob: <?=$answer?></p>
    <button class="form__btn">Посчитать</button>
</form>