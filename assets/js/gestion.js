const ADMINHEAD = document.querySelector("#formhead");

// API

const API_KEY = "e86daba233e00eaa826fc6e8f337623d";
const url =
  "https://api.themoviedb.org/3/search/movie?api_key=e86daba233e00eaa826fc6e8f337623d&language=fr";
const IMG_URL = "https://image.tmdb.org/t/p/w200";
const movieSearchable = document.getElementById("movie-searchable");

// Function API

function movieSection(movies) {
  return movies.map(movie => {
    if (movie.poster_path) {
      return `<img class="poster" src=${IMG_URL + movie.poster_path} id=${
        movie.id
      }>`;
    }
  });
}
function generateUrl(path) {
  const URL = `https://api.themoviedb.org/3${path}?api_key=e86daba233e00eaa826fc6e8f337623d&language=fr`;
  return URL;
}
function createMovieContainer(movies) {
  const movieElement = document.createElement("div");
  movieElement.setAttribute("class", "movie");

  const movieTemplate = `
     <section class="section">
         ${movieSection(movies)}
     </section>
     <div class="content">
         <p id="content-close">x</p>
     </div>
    `;

  movieElement.innerHTML = movieTemplate;
  return movieElement;
}

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



// Rechercher
let search = document.getElementById("search");

search.addEventListener("keydown", () => {
  if (event.key == "Enter") {
    const path = "/search/movie";
    const NEW_URL = generateUrl(path) + "&query=" + search.value;
    fetch(NEW_URL)
      .then(res => res.json())
      .then(renderSearchMovie)
      .catch(error => {
        console.log("Erreur: ", error);
      });
    search.value = "";
  }
});

document.onclick = function(event){
  const target= event.target;
  if(target.value == "Supprimer"){
    let to_do= document.getElementsByClassName('to-do');

    for(let i=0; i<to_do.length;i++){
      let classe = to_do[i];
      classe.value="delete";
      console.log(classe);
    }
  }
  else if(target.value== "Modifier"){
    let to_do= document.getElementsByClassName('to-do');

    for(let i=0; i<to_do.length;i++){
      let classe = to_do[i];
      classe.value="update";
      console.log(classe);
    }
  }
// Administration, au clic du film correspondant à la recherche
  if (target.tagName.toLowerCase() == "img" && target.classList != "POSTERACTUAL") {
    movie_id = target.id;
    movieSearchable.innerHTML = "";
    ADMINHEAD.classList.remove("disabled");
    ADMINHEAD.classList.add("activated");

    const URL = `https://api.themoviedb.org/3/movie/${movie_id}?api_key=${API_KEY}&language=fr`;

    fetch(URL)
      .then(res => res.json())
      .then(data => {
        document.getElementById("mid").value = data.id;
        document.getElementById("poster-id").value = data.poster_path;
        document.getElementById("backdrop-id").value = data.backdrop_path;
        document.getElementById("content-id").value = data.overview;
        document.getElementById("title-id").value = data.title;
      })
      .catch(error => {
        console.log("Erreur: ", error);
      });

    const NEW_URL = `https://api.themoviedb.org/3/movie/${movie_id}/videos?api_key=${API_KEY}&language=fr`;

    fetch(NEW_URL)
      .then(res => res.json())
      .then(data => {
        document.getElementById("movie-id").value = data.results[0].key;
      })
      .catch(error => {
        console.log("Erreur: ", error);
      });
  }
};