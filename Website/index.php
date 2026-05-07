<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zahl erraten - Startbildschirm</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="Hintergrund">
            <video autoplay loop muted playsinline>
                <source src="HintergrundVideo.mp4" type="video/mp4">
                Ihr Browser unterstützt kein Video.
            </video>
            <div class="Hauptcontainer">
                <h1>Zahlen erraten</h1>
                <p class="Untertitel">>> Errate eine geheime Zahl <<</p>
                <div class="Info-div">
                    <div class="Info">
                        <span class="Info-Name">Spielername</span>
                        <span class="Info-Wert">Nico</span>  
                    </div>
                    <div class="Info">
                        <span class="Info-Name">Gesammtversuche</span>
                        <span class="Info-Wert">23</span>
                    </div>
                    <div class="Info">
                        <span class="Info-Name">Siegesserie</span>
                        <span class="Info-Wert">12</span>
                    </div>
                </div>
                <a class="StartButton" href="schwierigkeitsgrad.php">Spiel starten</a>
            </div>
        </div>
    </body>
</html>
