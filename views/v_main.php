<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/css/styles.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title><?=$title?></title>
</head>

<body>
<div id="wrapper">
    <header>
        <div class="header line">
            <div class="wrapper">
                <div class="logo"></div>
                <div class="slogan">
                    <div class="title">Рога и копыта</div>
                    <div class="subtitle">Всем по рогам, всем по копытам.</div>
                </div>
                <div class="phone">8 800 800 80 80</div>
            </div>
        </div>
        <div class="menu line">
            <div class="wrapper">
                <nav>
                    <div class="show_menu">Меню</div>
                    <ul>
                        <?= $menu ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section>
        <div class="content line">
            <div class="wrapper">
                <aside class="left">
                    <div class="col fl-l">
                        <span class="h3">Оптовикам</span>
                        <ul>
                            <li><a href="#">Прайсы</a></li>
                            <li><a href="#">Сорта рогов</a></li>
                            <li><a href="#">Сроки поставки</a></li>
                        </ul>
                    </div>
                    <div class="col fl-r">
                        <span class="h3">Простым покупателям</span>
                        <ul>
                            <li><a href="#">Прайсы</a></li>
                            <li><a href="#">Сорта рогов</a></li>
                            <li><a href="#">Сроки поставки</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </aside>
                <section class="right">
                    <?= $content ?>
                </section>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer line">
            <div class="wrapper">
                <span class="copy">&copy; ООО Рога и Копыта, Москва 2017, все права защищены!</span>
            </div>
        </div>
    </footer>
</div>
<script src="<?=ROOT?>/js/scripts.js" type="text/javascript"></script>
</body>
</html>
