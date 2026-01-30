<?php
// Simple Kontaktua page
?>
<!doctype html>
<html lang="eu">
<head>
  <meta charset="utf-8">
  <title>Kontaktua</title>
  <link rel="stylesheet" href="/ERRONKA_01/css/index.css">
  <link rel="stylesheet" href="/ERRONKA_01/css/produktua.css">
  <link rel="stylesheet" href="/ERRONKA_01/css/kontaktua.css">
  <link rel="stylesheet" href="/ERRONKA_01/css/nire_produktuak.css">
  <script src="/ERRONKA_01/js/main.js" defer></script>
</head>
<body>
  <?php include __DIR__ . '/../index_bar.php'; ?>
  <main>
    <div class="produktua-detail" style="flex-direction: column; align-items: center; text-align: center;">
        <h2>¿Zure jokoren bat saldu nahi diguzu?</h2>
        
    </div>

    <video controls style="max-width: 90%; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc;">
    <source src="bideoak/NavideñoERRONKA.mp4" type="video/mp4">

    Formato de video no soportado
    </video>

    <div style="text-align: center; margin: 30px 0;">
        <p class="lead">Laster Soundtrack-ak eta kontsolak ere salgai...</p>
        <div class="soundtrack-gallery">
            <div class="soundtrack-item">
                <img src="audioak/Tetris.png" alt="Tetris Soundtrack" onclick="toggleAudio('tetrisAudio')">
                <p>Tetris</p>
                <audio id="tetrisAudio" src="audioak/tetasdigotetris.mp3"></audio>
            </div>
            <div class="soundtrack-item">
                <img src="audioak/IMG_4455.png" alt="Mario Bros Soundtrack" onclick="toggleAudio('marioAudio')">
                <p>Mario Bros</p>
                <audio id="marioAudio" src="audioak/mariobros.mp3"></audio>
            </div>
            <div class="soundtrack-item">
                <img src="audioak/sonic.png" alt="Sonic Soundtrack" onclick="toggleAudio('sonicAudio')">
                <p>Sonic</p>
                <audio id="sonicAudio" src="audioak/sonic.mp3"></audio>
            </div>
        </div>
    </div>



    <div class="kontaktua-categories-wrapper">
        
        <div class="kontaktua-item productua-card">
            <h3>Kontsola</h3>
            
            <div class="thumb">
                <img src="/ERRONKA_01/irudiak/Consola.png" alt="Kontsola" loading="lazy">
            </div>
            
            <div class="card-content">
                <p class="desc">
                    Ekarri zure kontsola egoera onean eta balorazio azkarra egingo dizugu.
                </p>
                <p class="desc">Modelo guztiekin lan egiten dugu (PlayStation, Xbox, Nintendo…) eta prezio justu bat eskainiko dizugu bere erabilera eta egoera kontuan hartuta.</p>
                <p class="desc">Argazkiak prest badituzu, are hobeto — horrela berehala hasiko gara baloratzen!</p>
            </div>

            <a href="#formulariokontsola" class="btn-action">Bai, Kontsola da</a>
        </div>

        <div class="kontaktua-item productua-card">
            <h3>Bideojokoa</h3>
            
            <div class="thumb">
                <img src="/ERRONKA_01/irudiak/Bideojokoa.png" alt="Bideojokoa" loading="lazy">
            </div>

            <div class="card-content">
                <p class="desc">Zure bideojokoa saltzeko prest?</p>
                <p class="desc">Ekarri jatorrizko kutxa eta diskoa/txartela egoera onean badaude, ordaintzen dizugu berehala.</p>
                <p class="desc">Sagutzen ditugu plataforma guztiak (Nintendo, PlayStation, Xbox…) eta prezio eguneratu baten arabera baloratzen dugu.</p>
                <p class="desc">Ahal baduzu, bidali argazkiak edo idatzi laburpena bere egoeraz.</p>
            </div>
            
            <a href="#formulariojoko" class="btn-action">Bai, Bideojokoa da</a>
        </div>
        
    </div>
</main></body>
</html>
