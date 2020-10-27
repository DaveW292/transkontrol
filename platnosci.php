<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Trans Kontrol - płatności</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontello/css/fontello.css">
    <script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
    <header><?php include "items/naglowek.php"; ?></header>
    <nav>
        <div>
            <p class="icon-right-hand" id="dropButton" onclick="smartMenu()">&nbsp; Płatności</p>
            <div id="menu" class="tabs">
                <a href=<?php include "items/startTabLink.php"; ?>>Start</a>
                <a href="o-nas">O nas</a>
                <a href="uslugi">Usługi</a>
                <a id="activeTab">Płatności</a>
                <a href="skargi">Skargi</a>
                <a href="odwolania">Odwołania</a>
                <a href="pozwy">Pozwy</a>
                <a href="media">Media</a>
                <a href="incydenty">Incydenty</a>
                <a href="praca">Praca</a>
                <a href="kontakt">Kontakt</a>
                <a href="#">English</a>
            </div>
        </div>
    </nav>
    <main>
        <article class="center">
            <h3>W celu dokonania zapłaty za opłatę dodatkową należy wymaganą kwotę wpłacić w całości na odpowiednie niżej wymienione konto:</h3>
            <div class="board"><b>Trans Kontrol os. St. Batorego 101, 60-687 Poznań</b></div>
            <div class="board">
                <b>Konto główne do wpłat za Opłaty Dodatkowe:</b>
                <p>80 1140 2004 0000 3502 7537 3045</p>
            </div>
            <div class="board">
                <b>Konto do wpłat windykacyjnych i po sądowych:</b>
                <p>10 1140 2004 0000 3102 7537 3046</p>
            </div>
        </article>
        <article class="center">
            <h3>ZAPŁAĆ SZYBKO BLIKIEM!</h3>
            <p>Wyślij płatność na numer Trans Kontrol BLIK:</p>
            <div class="board" style="font-size: 40px; width: 300px;"><b>531 833 177</b></div>
        </article>
        <article class="center">
            <h3>PŁATNOŚCI KARTĄ I ZBLIŻENIOWE</h3>
            <p>Możesz już płacić kartą lub telefonem! Także zbliżeniowo! W naszym biurze lub na miejscu u niektórych kontrolerów!</p>
        </article>
        <article class="center" style="text-align: start;">
            <h3>UWAGA!</h3>
            <div class="li"><i class="icon-exclamation"></i><p>Obniżenie płatności opłaty dodatkowej (do 7 dni) przysługuje jedynie w przypadku dokonania pełnej płatności widocznej na wezwaniu do zapłaty w odpowiednim, nieprzekraczalnym terminie</p></div>
            <div class="li"><i class="icon-exclamation"></i><p>Podczas dokonywania wpłat należy koniecznie podać numer opłaty dodatkowej oraz imię i nazwisko osoby ukaranej</p></div>
            <div class="li"><i class="icon-exclamation"></i><p style="font-weight: bold;">WAŻNE! Data wpłaty (wpływu na nasz rachunek bankowy) decyduje o terminie zapłaty!</p></div>
        </article>
    </main>
    <footer><?php include "items/stopka.php"; ?></footer>
</body>
</html>