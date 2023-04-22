const words = [
  "kubin",
  "párátko",
  "kolotoč",
  "kosik",
  "tabule",
  "dědictví",
  "ragby",
  "ptakopysk",
  "mrak",
  "klan",
  "signál",
  "kleště",
  "česko",
  "hřebec",
  "topol",
  "báseň",
  "řasa",
  "záškolák",
  "zápalky",
  "vítěz",
  "lentilka",
  "mráček",
  "duch",
  "sekunda",
  "část",
];

//getting random word and defiing hidden word
let currentWord = rnd(0, words.length);
let hiddenCurrentWord = "";

//defiing errors
const maxErrorCount = 12;
let errorCount = 0;

//inicializing elements
const letterElement = document.getElementById("letter");
const img = document.getElementById("hangman");
const hiddenWordElement = document.getElementById("hiddenWord");
const btn = document.getElementById("button");

//Listener for ENTER on input
letterElement.addEventListener("keyup", function (event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("button").click();
  }
});

//starting game
startGame();

function startGame() {
  currentWord = rndWord(words);
  hiddenCurrentWord = getHiddenWord(currentWord);

  document.getElementById("usedLetters").innerHTML = "Použitá písmena: ";

  errorCount = 0;

  clearScreen();
  updateUI();
}

//update of components on the screen
function updateUI() {
  hiddenWordElement.innerHTML = hiddenCurrentWord;
  letterElement.value = "";
  img.src = "../hangman-images/" + errorCount + ".png";
}

//function for buttons which take char parameter which is char that user inputed
function guess(letter) {
  if (letter.length !== 1) {
    if (letter.length == 0) {
      alert("musis zadat alespon jedno pismeno");
      return;
    } else {
      alert("zadej jen jedno pismeno");
      return;
    }
  }

  //Logic that i dont understand
  letter = letter.toLowerCase();
  let hWord = "";
  let error = true;
  for (let i = 0; i < currentWord.length; i++) {
    const letterInCurrentWord = currentWord[i].toLowerCase();

    if (letterInCurrentWord === letter) {
      hWord += currentWord[i];
      error = false;
    } else {
      hWord += hiddenCurrentWord[i];
    }
  }
  hiddenCurrentWord = hWord;

  //adding used letters
  if (error) {
    errorCount++;
    document.getElementById("usedLetters").innerHTML += letter + ", ";
  }

  updateUI();

  //Win/Lose logic which is started after 0.1s
  setTimeout(() => {
    if (didUserWin()) {
      win();
    }
    if (didUserLose()) {
      lose();
    }
  }, 100);
}
//clearing screen
function clearScreen() {
  document.getElementById("overGame").innerHTML = "";
  document.getElementById("overGame").className = "";
}
//win over all screen
function win() {
  const element = document.getElementById("overGame");
  element.className += "win";

  const text = document.createElement("h1");
  text.className += "text";
  text.innerHTML += "VYHRAL JSI!";
  element.appendChild(text);

  const slovo = document.createElement("h3");
  slovo.className += "text";
  slovo.innerHTML += "";
  element.appendChild(slovo);

  const button = document.createElement("button");
  button.className += "btn btn-sm btn-outline-secondary ";
  button.innerHTML = "Play Again";
  button.addEventListener("click", startGame);

  element.appendChild(button);
}
//loose over all screen
function lose() {
  const element = document.getElementById("overGame");
  element.className += "lose";

  const text = document.createElement("h1");
  text.className += "text";
  text.innerHTML += "PROHRAL JSI!";
  element.appendChild(text);

  const slovo = document.createElement("h3");
  slovo.className += "text";
  slovo.innerHTML += "Hadané slovo bylo: " + currentWord;
  element.appendChild(slovo);

  const button = document.createElement("button");
  button.className += "playAgain btn btn-secondary rounded-pill px-3";
  button.type = "button";
  button.innerHTML = "Play Again";
  button.addEventListener("click", startGame);

  element.appendChild(button);
}
//function on click
function onGuessClick() {
  guess(letterElement.value);
}
//checker of win
function didUserWin() {
  return currentWord === hiddenCurrentWord;
}
//checker of loose
function didUserLose() {
  return errorCount >= maxErrorCount;
}
//get hidden world in -
function getHiddenWord(word) {
  let hiddenWord = "";
  for (let i = 0; i < word.length; i++) {
    hiddenWord += "-";
  }
  return hiddenWord;
}
//get random world
function rndWord(words) {
  return words[rnd(0, words.length)];
}
//defining random
function rnd(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
