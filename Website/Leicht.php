<?php
$min = 1;
$max = 20; 

$usereingabe = filter_input(INPUT_POST, 'UserInput', FILTER_VALIDATE_INT, [
    "options" => ["min_range" => $min, "max_range" => $max]
]);

$gueltig = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($usereingabe === false || $usereingabe === null) {
        $meldung = "Bitte gebe eine Ganzzahl zwischen $min und $max ein.";
    } else {
        $gueltig = true;
    }
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
                    <span class="Hinweis">Die geheime Zahl liegt zwischen <?php echo $min; ?> und <?php echo $max; ?>. Die gesuchte Zahl ist eine Ganzzahl</span>

                    <form method="POST" action="">
                        <input type="number" name="UserInput" min="<?php echo $min; ?>" max="<?php echo $max; ?>" step="1" required
                               value="<?php echo ($usereingabe !== null && $usereingabe !== false) ? htmlspecialchars($usereingabe, ENT_QUOTES, 'UTF-8') : ''; ?>">
                        <button type="submit" class="StartButton">Zahl einloggen</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
