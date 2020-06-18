
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>AllezCine - Bienvenue</title>
</head>
<body>
    <?php include("header.php"); ?>

    <div id="movie-week" class="row m-0 text-center d-flex justify-content-center pb-5 border-5">
    
            <h3 class="col-md-10 p-3 text-white text-uppercase text-left offset-md-1">Les films à l'affiche</h3>

            <?php 
            include("connect.php"); 
            $reponse = $bdd->query('SELECT ID,TITLEID, MOVIEID, POSTERID, CONTENTID FROM progrcine');

                // On affiche chaque entrée une à une

                while ($donnees = $reponse->fetch())
                { 
                    ?> <figure>
                <?="<img class='p-2' src=".$donnees['POSTERID']." data-toggle='modal' data-target='#modal".$donnees['ID']."'>";
                ?><figcaption class="text-white"><?= $donnees['TITLEID']; ?></figcaption>
                </figure>
                <!-- Modal -->

                <div class="modal fade" id="modal<?php echo $donnees['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo $donnees['TITLEID']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                            <iframe
                                width="400"
                                height="300"
                                src="<?php echo $donnees['MOVIEID']; ?>">
                            </iframe>
                            <p class="mt-2"><?php echo $donnees['CONTENTID']; ?></p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>        
                <a class="text-center col-md-12 text-white text-decoration-none mt-5 bottom-direction" href="#movie-next">&#9660;</a>
        
    </div>

    <div id="movie-next" class="row m-0 text-center d-flex justify-content-center pb-5 border-5">
        
            <h3 class="col-md-10 p-3 text-white text-uppercase text-left offset-md-1">Bientôt dans votre Ciné écran</h3>

            <?php 
            include("connect.php");
            $reponse = $bdd->query('SELECT ID,TITLEID, MOVIEID, POSTERID, CONTENTID FROM prochcine');

                // On affiche chaque entrée une à une

                while ($donnees = $reponse->fetch())
                { 
                    ?> <figure>
                <?="<img class='p-2' src=".$donnees['POSTERID']." data-toggle='modal' data-target='#modal".$donnees['ID']."'>";
                ?><figcaption class="text-white"><?= $donnees['TITLEID']; ?></figcaption>
                <p class="text-white">Le 25 avril</p>
                </figure>
                <!-- Modal -->

                <div class="modal fade" id="modal<?php echo $donnees['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo $donnees['TITLEID']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                            <iframe
                                width="400"
                                height="300"
                                src="<?php echo $donnees['MOVIEID']; ?>">
                            </iframe>
                            <p class="mt-2"><?php echo $donnees['CONTENTID']; ?></p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>        
        
    </div>

    <footer class="m-0 p-0">
        <h3 class="text-center enable mb-0">Ciné-Ecran.NET - 2020 | Tout droits réservés.</h3>
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

