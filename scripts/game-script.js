let buttons = [

]
// Store the letters as an array in a constant
const alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
let tempAlpha = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
let numOfButtons = 26;
// Output the letters in the console

function generateButton(){
  for (let i = 0; i < 26; i++) {
    const button = document.createElement("button");
    button.innerHTML = alphabet[i].toUpperCase();
    button.id = alphabet[i]
    button.classList += "btn btn-outline-success me-2"
    button.addEventListener("click", () => guess(alphabet[i]));
    document.getElementById("buttons").appendChild(button);
    buttons.push(button);
  }
}
function deleteButton(letter){

  buttons[tempAlpha.indexOf(letter)].remove();
  buttons.splice(tempAlpha.indexOf(letter),1)
  tempAlpha.splice(tempAlpha.indexOf(letter),1)
  numOfButtons--;
}
function deleteAllButons(){
  buttons.forEach(btn => {
    btn.remove();
  });
  buttons = [];
  tempAlpha = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
}


let currentWord;
//getting random word and defiing hidden word

async function getWorld(){
  await axios.get("../api/words/get.php").then(response => {
    currentWord = response.data;
  })
}
let hiddenCurrentWord = "";

//defiing errors
const maxErrorCount = 12;
let errorCount = 0;

//inicializing elements
const img = document.getElementById("hangman");
const hiddenWordElement = document.getElementById("hiddenWord");
const btn = document.getElementById("button");


//starting game
startGame();


// function startGame() {
//   getWorld()
//   setTimeout(() => {  
//     hiddenCurrentWord = getHiddenWord(currentWord);
//     updateUI()

//   }, 20)

//   errorCount = 0;

//   clearScreen();
//   updateUI();
//   generateButton()
// }

function startGame() {
  clearScreen();
  getWorld().then(() => {
    hiddenCurrentWord = getHiddenWord(currentWord);
    updateUI()

    errorCount = 0;

    updateUI();
    generateButton()
  })
}

//update of components on the screen
function updateUI() {
  hiddenWordElement.innerHTML = hiddenCurrentWord;

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
  
  deleteButton(letter)


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
  deleteAllButons()
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
  button.className += "playAgain btn btn-secondary rounded-pill px-3";
  button.type = "button";
  button.innerHTML = "Play Again";
  button.addEventListener("click", startGame);
  element.appendChild(button);
  sendData(true);

}
//loose over all screen
function lose() {
  deleteAllButons()
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

  //odesilani zaznamu do databaze
  //dotazat se na to jestli je lognuty
  
  sendData(false);
}

function sendData(win) {
  userWin = 0;
  win ? userWin = 1 : userWin =0;
  axios.post("../api/results/send.php", {
    win: userWin
  },{headers: { "Content-Type": "multipart/form-data" }})
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
//defining random
function rnd(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
