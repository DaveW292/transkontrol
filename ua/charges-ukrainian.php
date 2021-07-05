<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Kontrol - ПЛАТЕЖІ</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="../styles/website.css">
    <link rel="stylesheet" href="fontello/css/fontello.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YWBTPHN0RL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YWBTPHN0RL');
    </script>
</head>
<body>
    <header><?php include "components/header.php"; ?></header>
    <nav>
        <div class="dropdown">
            <p class="icon-right-hand" id="dropButton">&nbsp; ПЛАТЕЖІ</p>
            <div class="tabs">
                <!-- <a href="/en/home">Home</a> -->
                <!-- <a href="/en/about-us">About Us</a> -->
                <!-- <a href="/en/services">Services</a> -->
                <a id="activeTab">ПЛАТЕЖІ</a>
                <a href="complaints-ukrainian">Скарги</a>
                <a href="appeals-ukrainian">Апеляції</a>
                <a href="lawsuits-ukrainian">Позови</a>
                <!-- <a href="/en/press">Press</a> -->
                <!-- <a href="/en/study">Study</a> -->
                <!-- <a href="/en/job">Job</a> -->
                <a href="contact-ukrainian">контакт</a>
                <div class="dropdown2">
                    <div onclick="myFunction2()" class="dropbtn2">PL / EN</div>
                    <div id="myDropdown2" class="dropdown-content2">
                        <a href="/">Polski</a>
                        <a href="/en/home">English</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <article class="center">
            <h3>
                Для виконання платежу за додатковий збір потрібно вплатити необхідну суму повністю на рахунок, вказаний нижче:
            </h3>
            <div class="board"><b>Trans Kontrol os. St. Batorego 101, 60-687 Poznań</b></div>
            <div class="board">
                <b>Основний рахунок для платежів за додаткові збори:</b>
                <p>80 1140 2004 0000 3502 7537 3045</p>
            </div>
            <div class="board">
                <b>Рахунок для оплати боргових належностей та судових платежів:</b>
                <p>10 1140 2004 0000 3102 7537 3046</p>
            </div>
        </article>
        <article class="center">
            <h3>ОПЛАТИ ШВИДКО БЛІКОМ!</h3>
            <p>Надійшли платіж на номер Trans Kontrol BLIK:</p>
            <div class="board"><b id="phone">531 833 177</b></div>
        </article>
        <article class="center">
            <h3>ОПЛАТА БЕЗКОНТАКТНОЮ КАРТКОЮ</h3>
            <p>Тепер ви можете платити карткою або телефоном! Також безконтактно! У нашому офісі або на місці у деяких контролерів!</p>
        </article>
        <article>
            <h3>УВАГА!</h3>
            <div class="li">
                <i class="icon-exclamation"></i>
                <p>
                Зменшення суми додаткового збору (до 7 днів) застосовується лише у випадку виконання 
                повного платежу, вказаного у платіжній вимозі, здійсненого з дотриманням вказаного терміну.
                </p>
            </div>
            <div class="li">
                <i class="icon-exclamation"></i>
                <p>
                    При здійсненні оплат необхідно вказати номер додаткового збору та ім’я та прізвище покараної особи
                </p>
            </div>
            <div class="li">
                <i class="icon-exclamation"></i>
                <b>ВАЖЛИВО! За дата платежу (отримання на наш банківський рахунок) ввжається термін виконання  платежу!</b>
            </div>
        </article>
    </main>
    <footer><?php include "components/footer.php"; ?></footer>
</body>
</html>