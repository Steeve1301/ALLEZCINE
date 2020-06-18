<div class="row m-0">
        <div class="offset-md-4 col-md-6 flex-column text-center">
            <h4>Recherche de film</h2>
            <p>Dans ce panneau, vous pouvez choisir le(s) film(s) à ajouter</p>            
            <input class="mb-3" id="search" type="text" placeholder="Rechercher &#128269;">
            <form method="POST" action="submit.php" id="formhead" class="disabled">
                <input type="text" name="IDM" id="mid" hidden>
                <input type="text" name="idmovie" id="movie-id" hidden>
                <input type="text" name="idposter" id="poster-id" hidden>
                <input type="text" name="idbackdrop" id="backdrop-id" hidden>
                <input type="text" name="idcontent" id="content-id" hidden>
                <input type="text" name="idtitle" id="title-id" hidden>
                <input type="text" name="todo" value="prog" hidden>
                <input type="submit" value="Sauvegarder" id="save">
            </form> 
            <div id="movie-searchable">

            </div>
        </div>
    </div>