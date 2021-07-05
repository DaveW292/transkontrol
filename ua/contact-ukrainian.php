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
                <a href="charges-ukrainian">ПЛАТЕЖІ</a>
                <a href="complaints-ukrainian">Скарги</a>
                <a href="appeals-ukrainian">Апеляції</a>
                <a href="lawsuits-ukrainian">Позови</a>
                <!-- <a href="/en/press">Press</a> -->
                <!-- <a href="/en/study">Study</a> -->
                <!-- <a href="/en/job">Job</a> -->
                <a id="activeTab">контакт</a>
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
    <main id="contact">
        <article class="center">
            <h4>Відділ обслуговування клієнтів обслуговує клієнтів у понеділок, вівторок та четвер (в робочі дні) з 12:00 до 16:00 за адресою:</h4>
            <p>Trans Kontrol</p>
            <p>Os. Stefana Batorego 101, 60-687 Poznań</p>
            <i>(територія початкової школи № 67 /гімназії № 12, вхід від спортивного майданчика)</i>
        </article>
        <article class="center">
            <h4>Вирішення питань  з BOK по телефону є можливе з понеділка по п’ятницю (у робочі дні) з 11:00 до 16:00 за номером:</h4>
            <p>(61) 65 62 115</p>
            <i>*якщо необхідно вирішити питання в іншому терміні, слід узгодити дату з Відділом обслуговування клієнтів</i>
        </article>
        <!-- <article>
            <h4 style="text-align: center;">Ви також знайдете нас у соціальних мережах</h4>
            <section class="buttons" style="font-size: 80px;">
                <a href="https://www.facebook.com/transkontrol1" target="_blank" class="button"><i class="icon-facebook-squared"></i></a>
                <a href="https://twitter.com/TransKontrol1" target="_blank" class="button"><i class="icon-twitter-squared"></i></a>
            </section>
        </article> -->
        <article class="center">
            <h4>Ми також заохочуємо Вас зв’язатися з окремими відділами за допомогою електронної пошти:</h4>
            <div class="buttons" style="flex-direction: column;">
                <div class="board">
                    <b>Бухгалтерія</b>
                    <p>ksiegowosc@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Загальні справи</b>
                    <p>biuro@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Контроль якості</b>
                    <p>pelnomocnik@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Скарги</b>
                    <p>skargi@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Апеляціі</b>
                    <p>odwolania@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Примусове стягнення</b>
                    <p>windykacja@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Позови</b>
                    <p>epozwy@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Інспектор з захисту персональних даних</b>
                    <p>iodo@transkontrol.pl</p>
                </div>
            </div>
        </article>
        <article id="maps" class="center">
            <h4>КАРТИ</h4>
            <img src="../img/map1.jpg">
            <img src="../img/map2.jpg">
            <iframe data-src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8V96sGgzrasorg2xPOlrlp-cpQFPLSxM&amp;q=os.%20St.%20Batorego%20101%2C%20os.%20St.%20Batorego%20101%2C%20Pozna%C5%84%2C%2060-687&amp;zoom=15" allowfullscreen="" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8V96sGgzrasorg2xPOlrlp-cpQFPLSxM&amp;q=os.%20St.%20Batorego%20101%2C%20os.%20St.%20Batorego%20101%2C%20Pozna%C5%84%2C%2060-687&amp;zoom=15" style="border: medium none;" width="100%" height="500" frameborder="0"></iframe>
        </article>
    </main>
    <footer><?php include "components/footer.php"; ?></footer>
</body>
</html>