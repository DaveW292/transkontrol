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
                <a id="activeTab">Позови</a>
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
        <article>
            <h4>
                УВАГА! В листі електронного позову з метою ідентифікацііі особи обов’язково потрібно вказати свою актуальну адресу проживання, а також адресу для надання кореспонденціі та номер PESEL.
            </h4>
            <p>
                Якщо ви отримаєте судовий позов про оплату додаткового збору, дотримуйтися інформації, наданої судом. Потрібно заплатити суму, зазначену в Платіжному наказі у зв'язку з попереджувальною процедурою протягом зазначеного строку.
            </p>
            <p>
                У разі недотримання терміну або невиконання платежу, справа буде передана до відповіднього судового пристава з метою стягнення заборгованості. Відсотки потрібно розрахувати самостійноза допомогою калькулятора відсотків.
            </p>
            <section class="buttons">
                <a href="https://kalkulatory.gofin.pl/Kalkulator-odsetek-ustawowych,12.html" target="_blank" class="button">Калькулятор відсотків</a>
            </section>
            <p>Кожен платіж зараховується таким чином:</p>
            <ol>
                <li>відсотки</li>
                <li>витрати на довіреність</li>
                <li>судові витрати</li>
                <li>додатковий збір</li>
            </ol>
            <p>
                У разі недоплати завжди залишається заборгованість по додатковому збору, що підлягає подальшому стягненню, в тому числі судовим приставом.
            </p>
            <p>
                Невиконання наказу оплати або подання заперечення призведе до додаткових витрат, пов’язаних 
                із судовим розглядом. Додаткові витрати на юридичне представництво у судових справах становлять 
                щонайменше 120 злотих. Судові витрати також можуть бути вищими залежно від суми позову.
            </p>
        </article>
    </main>
    <footer><?php include "components/footer.php"; ?></footer>
</body>
</html>