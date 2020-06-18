<header class="row m-0">
  <div class="navb row m-0 col-md-12">
    <h1 class="col-4 col-md-4 "><span>CINE-</span>ECRAN<span>.NET</span></h1>
    <nav class="col-8 col-md-8 nav">
      <ul>
        <li class="col-md-2"><a href="#">Accueil</a></li>
        <li class="col-md-3"><a href="#movie-week">Programmation</a></li>
        <li class="col-md-2"><a href="#">TARIF</a></li>
        <li class="col-md-3"><a href="#">CONTACT</a></li>
        <li class="col-md-2"><a href="gestion/customize.php">Administration</a></li>
      </ul>
    </nav>
  </div>
  <div class="filter-head row m-0 col-md-12">
    <h2
      class="col-12 col-md-12 text-center text-uppercase font-weight-bold"
      id="yours"
    >
      Votre <span>So</span>rtie <span>Ci</span>né
    </h2>

    <span class="offset-md-1 col-md-2" id="headerLeft">&#10096;</span>
    <span class="offset-md-7 col-md-2" id="headerRight">&#10095;</span>

    <button
      class="col-md-2 offset-md-5 text-center"
      id="trailer"
      data-toggle="modal"
      data-target="#VideoModal"
    >
      Regarder la bande annonce
    </button>

    <!-- Trailer -->
    <div
      class="modal fade"
      id="VideoModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bande annonce</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="trailer_content"></div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Fermer
            </button>
          </div>
        </div>
      </div>
    </div>
    <a
      class="text-center col-md-12 text-white text-decoration-none bottom-direction"
      href="#movie-week"
      >&#9660;</a
    >
  </div>
</header>
