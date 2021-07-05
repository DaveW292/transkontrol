<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trans Kontrol - kontakt</title>
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
            <p class="icon-right-hand" id="dropButton">&nbsp; Kontakt</p>
            <div class="tabs">
                <a href="/">Start</a>
                <a href="o-nas">O nas</a>
                <a href="uslugi">Usługi</a>
                <a href="platnosci">Płatności</a>
                <a href="skargi">Skargi</a>
                <a href="odwolania">Odwołania</a>
                <a href="pozwy">Pozwy</a>
                <a href="media">Media</a>
                <a href="studium">Studium</a>
                <a href="praca">Praca</a>
                <a id="activeTab">Kontakt</a>
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
    <main id="contact">
        <article class="center">
            <h4>Biuro Obsługi Klienta obsługuje interesantów w poniedziałki, wtorki i czwartki (dni robocze) w godzinach 12:00 - 16:00 pod adresem:</h4>
            <p>Trans Kontrol</p>
            <p>os. St. Batorego 101, 60-687 Poznań</p>
            <i>(teren szkoły SP nr 67/Gimnazjum nr 12, wejście od strony boiska, od szczytu)</i>
        </article>
        <article class="center">
            <h4>Załatwianie spraw telefonicznie z BOK możliwe od poniedziałku do piątku (w dni robocze) w godzinach 11:00-16:00 pod numerem:</h4>
            <p>(61) 65 62 115</p>
            <i>*w przypadku konieczności załatwienia sprawy w innym terminie, należy uzgodnić termin z BOK</i>
        </article>
        <article>
            <h4 style="text-align: center;">Znajdziecie nas również w mediach społecznościowych</h4>
            <section class="buttons" style="font-size: 80px;">
                <a href="https://www.facebook.com/transkontrol1" target="_blank" class="button"><i class="icon-facebook-squared"></i></a>
                <a href="https://twitter.com/TransKontrol1" target="_blank" class="button"><i class="icon-twitter-squared"></i></a>
            </section>
        </article>
        <article class="center">
            <h4>Zachęcamy również do kontaktu mailowego z poszczególnymi działami:</h4>
            <div class="buttons" style="flex-direction: column;">
                <div class="board">
                    <b>Księgowość</b>
                    <p>ksiegowosc@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Sprawy ogólne</b>
                    <p>biuro@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Kontrola jakości</b>
                    <p>pelnomocnik@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Skargi</b>
                    <p>skargi@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Odwołania</b>
                    <p>odwolania@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Windykacja</b>
                    <p>windykacja@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Pozwy</b>
                    <p>epozwy@transkontrol.pl</p>
                </div>
                <div class="board">
                    <b>Inspektor Ochrony Danych Osobowych</b>
                    <p>iodo@transkontrol.pl</p>
                </div>
            </div>
        </article>
        <article id="maps" class="center">
            <h4>MAPY</h4>
            <img src="img/map1.jpg">
            <img src="img/map2.jpg">
            <iframe data-src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8V96sGgzrasorg2xPOlrlp-cpQFPLSxM&amp;q=os.%20St.%20Batorego%20101%2C%20os.%20St.%20Batorego%20101%2C%20Pozna%C5%84%2C%2060-687&amp;zoom=15" allowfullscreen="" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8V96sGgzrasorg2xPOlrlp-cpQFPLSxM&amp;q=os.%20St.%20Batorego%20101%2C%20os.%20St.%20Batorego%20101%2C%20Pozna%C5%84%2C%2060-687&amp;zoom=15" style="border: medium none;" width="100%" height="500" frameborder="0"></iframe>
        </article>
    </main>
    <footer><?php include "components/stopka.php"; ?></footer>
    <!-- <script>window.alert("Drodzy Państwo, uprzejmie informujemy, iż dnia 04.06.2021 nasze biuro będzie nieczynne!");</script> -->
</body>
</html>