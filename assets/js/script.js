
const HEADER = document.querySelector("header");
const HEADERLEFT = document.querySelector("#headerLeft");
const HEADERRIGHT = document.querySelector("#headerRight");
const POSTERHEAD = document.querySelector("#POSTERACTUAL");

// Caroussel Header

let BACKGROUND = [];
let MOVIE_TRAILER = [];

let movie_id;
let count = 0;

//Background

let requete = new XMLHttpRequest();
requete.onload = function() {
  BACKGROUND = this.responseText.split(",");
};
requete.open("get", "head-down.php", false); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
requete.send();

HEADER.style.backgroundImage = `url('${BACKGROUND[count]}')`;

//Trailer
let movie = new XMLHttpRequest();
movie.onload = function() {
  MOVIE_TRAILER = this.responseText.split(",");
};
movie.open("get", "head-trail.php", false); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
movie.send();

function renderSearchMovie(data) {
movieSearchable.innerHTML = "";
const movies = data.results;
const movieBlock = createMovieContainer(movies);
movieSearchable.appendChild(movieBlock);
}
function createIframe(MOVIE_ID) {
const IFRAME = document.createElement("iframe");
IFRAME.src = MOVIE_ID;
IFRAME.width = 360;
IFRAME.height = 315;
IFRAME.allowFullscreen = true;
return IFRAME;
}

function createVideoTemplate(MOVIE_ID, CONTENT) {
CONTENT.innerHTML = "";
const iframeContainer = CONTENT;
const iframe = createIframe(MOVIE_ID);
iframeContainer.appendChild(iframe);
}



function update() {
    if (count == BACKGROUND.length) {
      count = 0;
    }
    HEADER.style.backgroundImage = `url('${BACKGROUND[count]}')`;
    count++;
  }

document.onclick = function(event) {
    const target = event.target;
    // Carousel
  
    if (target.id == "headerRight") {
      count++;
      if (count >= BACKGROUND.length - 1) {
        count = 0;
      }
      HEADER.style.backgroundImage = `url('${BACKGROUND[count]}')`;
    }
    if (target.id == "headerLeft") {
      count--;
      if (count < 0) {
        count = BACKGROUND.length - 2;
      }
      HEADER.style.backgroundImage = `url('${BACKGROUND[count]}')`;
    }
  
    // Au clic du bouton bande annonce
  
    if (target.id == "trailer") {
      const CONTENT = document.getElementById("trailer_content");
      const MOVIE_ID = MOVIE_TRAILER[count];
      createVideoTemplate(MOVIE_ID, CONTENT);
    }
  
    

  };
  setInterval(function() {
    if (count >= BACKGROUND.length - 2) {
      count = 0;
    } else {
      count = count + 1;
    }
    HEADER.style.backgroundImage = `url('${BACKGROUND[count]}')`;
  }, 8000);
  