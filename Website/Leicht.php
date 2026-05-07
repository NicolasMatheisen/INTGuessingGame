<?php
$usereingabe = $POST_['UserInput'] ?? null;
$gueltig = false;
$min = 1;
$max = 20;

if (filter_var($usereingabe, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Bitte gebe eine Ganzzahl zwischen" + $min + "und" + $max + "ein.");
} else {
    $gueltig = true;
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zahl erraten - Leicht</title>
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
                <div class="User-Interface">
                    <div class="UI-Input">
                        <span class="Hinweis">Die geheime Zahl liegt zwischen 1 und 10. Die gesuchte Zahl ist eine Ganzzahl</span> 
                        <span class="UI-Input">
                            <form>
                                <input type="number" name="UserInput" min="1" max="20" step="1" required>
                            </form>
                        </span>
                    </div>    
                </div>
                <a class="StartButton" href="schwierigkeitsgrad.php">Zahl einloggen</a>
            </div>
        </div>
    </body>
</html>
