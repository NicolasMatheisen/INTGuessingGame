const readline = require('readline');

/*
Konfiguration des Zahlenbereichs
INT bedeutet Integer (Ganzzahl)
*/
const minINT = 1;
const maxINT = 100;

/*
Math.random() gibt eine Fließkommazahl zwischen 0 (einschließlich) und 1 (ausschließlich) zurück.
Beispiele: 0, 0.12, 0.87, 0.003, 0.999
maxINT - minINT + 1
Das ist die Anzahl der möglichen ganzzahligen Werte im Bereich.
Beispiel: von 5 bis 10 sind das 10−5+1=6 Werte (5,6,7,8,9,10)
+ minINT vrchiebt das ganze in den gewünschten Wertebereich
Beipsiel: wenn man von 1 bis 10 zählt, zählt das von 0 bis 9 (Math.floor schneiddet die Fließkommazahl ab da wo das Komma ist). Wir wollen aber 1 bis 10. Darum muss am ende die +1 (in dem spezielem Fall minINT)
*/
function getRandomInteger(minINT, maxINT) {
  return Math.floor(Math.random() * (maxINT - minINT + 1)) + minINT;
}

// Erzeugt die "geheime" Zahl
const secretNumber = getRandomInteger(minINT, maxINT);

// Lesbares Interface-Objekt für Ein-/Ausgabe
const consoleInterface = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

// die Funktion fragt den Benutzer asynchron und liefert später die Eingabe zurück.
function askQuestion(promptText) {
  return new Promise((resolve) => {
    consoleInterface.question(promptText, (answer) => {
      resolve(answer);
    });
  });
}

// Hauptlogik: wiederholt Fragen, bis die Zahl erraten wurde
async function startGuessingGame() {
  console.log(`Errate eine Zahl zwischen ${minINT} und ${maxINT}.`);
  let guessedCorrectly = false;

  while (!guessedCorrectly) {
    const userInput = await askQuestion(`Deine Vermutung: `);
    const normalizedInput = userInput.trim().replace(',', '.');
    const userGuess = Number(normalizedInput);

    // Eingabevalidierung
    if (Number.isNaN(userGuess)) {
      console.log("Das war keine gültige Zahl. Bitte erneut versuchen.");
      continue;
    }

    // nur ganze Zahlen erlauben
    if (!Number.isInteger(userGuess)) {
      console.log("Bitte nur ganze Zahlen (keine Kommazahlen) eingeben.");
      continue;
    }

    if (userGuess < minINT || userGuess > maxINT) {
      console.log(`Bitte nur Zahlen zwischen ${minINT} und ${maxINT} eingeben.`);
      continue;
    }

    // Vergleich mit der geheimen Zahl
    if (userGuess === secretNumber) {
      console.log("Richtig! Du hast die Zahl erraten.");
      guessedCorrectly = true;
    } else if (userGuess < secretNumber) {
      console.log(`${userGuess} ist zu klein. Versuch es noch einmal.`);
    } else {
      console.log(`${userGuess} ist zu groß. Versuch es noch einmal.`);
    }
  }

  // Interface schließen, Programm beenden
  consoleInterface.close();
  console.log("(Spiel beendet)");
}

//versuchen das Spiel zu starten, wenn es nicht klappt, wird ein Error zurück gegeben.
async function main() {
  try {
    await startGuessingGame();
  } catch (error) {
    console.error("Ein Fehler ist aufgetreten:", error);
    consoleInterface.close();
  }
}

main();
