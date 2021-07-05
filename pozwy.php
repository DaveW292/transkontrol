<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Kontrol - pozwy</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="styles/website.css">
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
    <header><?php include "components/naglowek.php"; ?></header>
    <nav>
        <div class="dropdown">
            <p class="icon-right-hand" id="dropButton">&nbsp; Pozwy</p>
            <div class="tabs">
                <a href="/">Start</a>
                <a href="o-nas">O nas</a>
                <a href="uslugi">Usługi</a>
                <a href="platnosci">Płatności</a>
                <a href="skargi">Skargi</a>
                <a href="odwolania">Odwołania</a>
                <a id="activeTab">Pozwy</a>
                <a href="media">Media</a>
                <a href="studium">Studium</a>
                <a href="praca">Praca</a>
                <a href="kontakt">Kontakt</a>
                <div class="dropdown2">
                    <div onclick="myFunction2()" class="dropbtn2">EN / UA</div>
                    <div id="myDropdown2" class="dropdown-content2">
                        <a href="en/home">English</a>
                        <a href="ua/charges-ukrainian">Український</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <article>
            <h4>UWAGA! Przy składaniu pisma dot. e-pozwu należy obowiązkowo podać swój aktualny adres zameldowania oraz korespondencyjny i numer PESEL w celu właściwej weryfikacji osoby</h4>
            <p>W przypadku otrzymania pozwu sądowego w sprawie zapłacenia opłaty dodatkowej (opłat dodatkowych) należy zastosować się do informacji wskazanych w piśmie przez Sąd. Należy uiścić kwotę wskazaną w Nakazie Zapłaty w postępowaniu upominawczym w terminie tam wskazanym.</p>
            <p>Przekroczenie terminu lub brak wpłaty spowoduje skierowanie sprawy do właściwego miejscowo Komornika celem egzekucji należności. Odsetki należy obliczyć samodzielnie, można w tym celu skorzystać z kalkulatora odsetek ustawowych.</p>
            <section class="buttons">
                <a href="https://kalkulatory.gofin.pl/Kalkulator-odsetek-ustawowych,12.html" target="_blank" class="button">Kalkulator odsetek ustawowych</a>
            </section>
            <p>Każda wpłata w pierwszej kolejności księgowana jest w sposób następujący:</p>
            <ol>
                <li>odsetki</li>
                <li>koszty pełnomocnictwa</li>
                <li>koszty sądowe</li>
                <li>opłata dodatkowa</li>
            </ol>
            <p>W przypadku niedopłaty zawsze pozostanie zaległość z tytułu opłaty dodatkowej podlegająca dalszej egzekucji, z komorniczą włącznie.</p>
            <p>Niezastosowanie się do nakazu zapłaty lub wniesienie sprzeciwu wiązać się będzie z powstaniem dodatkowych kosztów związanych z postępowaniem sądowym. Dodatkowy koszt zastępstwa procesowego w przypadku drogi sądowej to kwota co najmniej 120 zł. Koszty sądowe mogą być również wyższe w zależności od wysokości roszczenia.</p>
        </article>
    </main>
    <footer><?php include "components/stopka.php"; ?></footer>
</body>
</html>