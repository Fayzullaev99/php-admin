<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style/all.css">
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <a href="/" class="logo">PROWEB</a>
            <?if ($_SESSION['login']) {?>
            <div class="user">
                <div class="user__profile">
                    <img src="/img/2.jpg" alt="" class="user__profile-img">
                    <h4 class="user__profile-name"><?=$_SESSION['name']?></h4>
                </div>
                <ul class="user__menu">
                    <li><a href="/exit" class="user__menu-link"><i class="far fa-external-link"></i>Выход</a></li>
                </ul>
            </div>
            <?}else{?>
            <div class="singIn">
                <a href="/login" class="singIn__link">Вход</a>
                <a href="/registration" class="singIn__link">Регистрация</a>
            </div>
            <?}?>


        </header>
        <aside class="menu">
            <div class="menu__reviews">
                <span class="menu__reviews_span" data-href="https://proweb.uz/">
                    <i class="far fa-chevron-right"></i>
                </span>
                <span class="menu__reviews_text">Оставить озыв</span>
            </div>
            <?
                $pageList = [
                    'home' => ['name'=>'Главная','icon'=>'fa-home', 'user'=>false],
                    'contact' => ['name'=>'Контакты','icon'=>'fa-address-book', 'user'=>false],
                    'table' => ['name'=>'Таблица умножения','icon'=>'fa-times', 'user'=>true],
                    'calc' => ['name'=>'Калькулятор','icon'=>'fa-calculator-alt', 'user'=>true],
                    'slide' => ['name'=>'Слайдер','icon'=>'fa-presentation', 'user'=>false],
                    'guest' => ['name'=>'Гостевая книга','icon'=>'fa-books', 'user'=>false],
                    'test' => ['name'=>'Тест','icon'=>'fa-vial', 'user'=>false]
                ]
            ?>
            <ul class="menu__list">
                <?=navList($pageList)?>
            </ul>
        </aside>
        <main class="main">
            <section class="head">
                <?
                if ($pageList[$_GET['page']]):?>
                    <h2 class="head__title"><?= $pageList[$_GET['page']]['name']?></h2>
                <?else:?>
                    <h2 class="head__title"><?= $_GET['page']?></h2>
                <?endif
                ?>
                <p class="head__date"><?=showDate()?></p>
            </section>