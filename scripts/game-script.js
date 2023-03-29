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
  
  let currentWord = rnd(0, words.length);
  let hiddenCurrentWord = "";
  
  const maxErrorCount = 12;
  let errorCount = 0;
  
  const letterElement = document.getElementById("letter");
  const img = document.getElementById("hangman");
  const hiddenWordElement = document.getElementById("hiddenWord");
  const btn = document.getElementById("button");
  
  letterElement.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("button").click();
      document.getElementById("");
      document.getElementById("");
    }
  });
  
  startGame();
  
  function startGame() {
 currentWord = rndWord(words);
    hiddenCurrentWord = getHiddenWord(currentWord);
    document.getElementById("usedLetters").innerHTML = "Použitá písmena: "
  
    errorCount = 0;
  
    clearScreen();
    updateUI();
  }
  
  function updateUI() {
    hiddenWordElement.innerHTML = hiddenCurrentWord;
    letterElement.value = "";
    img.src = "../asdasdasd/" + errorCount + ".png";
  }
  
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
  
    if (error) {
      errorCount++;
      document.getElementById("usedLetters").innerHTML+=letter+", "
    }
  
    updateUI();
  
    setTimeout(() => {
      if (didUserWin()) {
        win();
      }
      if (didUserLose()) {
        lose();
      }
    }, 100);
  }
  function clearScreen() {
    document.getElementById("overGame").innerHTML = "";
    document.getElementById("overGame").className = "";
  }



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
  function onGuessClick() {
    guess(letterElement.value);
  }
  
  function didUserWin() {
    return currentWord === hiddenCurrentWord;
  }
  
  function didUserLose() {
    return errorCount >= maxErrorCount;
  }
  
  function getHiddenWord(word) {
    let hiddenWord = "";
    for (let i = 0; i < word.length; i++) {
      hiddenWord += "-";
    }
    return hiddenWord;
  }
  
  function rndWord(words) {
    return words[rnd(0, words.length)];
  }
  
  function rnd(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  