<?php include('header.php'); ?>

<div class="row m-0">
        <div class="offset-md-4 col-md-6 flex-column text-center">
            <h4>Ajouter un film à la programmation</h2>
            <p>Dans ce panneau, vous pouvez choisir le(s) film(s) à ajouter</p>            
            <input class="mb-3" id="search" type="text" placeholder="Rechercher &#128269;">

            <form method="POST" action="submit.php" id="formhead" class="disabled col-md-12">
                <input type="text" name="IDM" id="mid" hidden>

                <input class="col-md-8" type="text" name="idmovie" id="movie-id" hidden>
                <input class="col-md-8" type="text" name="idposter" id="poster-id" hidden>
                <input class="col-md-8" type="text" name="idbackdrop" id="backdrop-id" hidden>

                <label for="title-id" class="col-md-3">Titre</label>
                <input class="col-md-8" type="text" name="idtitle" id="title-id">

                <label for="content-id" class="col-md-3">Description</label>
                <textarea class="col-md-8" type="text" name="idcontent" id="content-id">
                </textarea>

                <input type="text" name="todo" value="prog" hidden>

                <input type="submit" value="Envoyer" id="save">
            </form> 
            <div id="movie-searchable">

            </div>
        </div>
</div>

<div class="row m-0 mt-3">
        <div class="offset-md-3 col-md-8 text-center">
            <h2>Programmation ciné</h2>
            <p>Dans ce panneau, vous pouvez gérer votre programmation cinéma</p>            
            <div class="col-md-12">
            <?php 
                include("connect.php");
                $reponse = $bdd->query('SELECT ID,TITLEID, MOVIEID, CONTENTID, POSTERID, BACKDROPID  FROM progrcine');

                // On affiche chaque entrée une à une

                while ($donnees = $reponse->fetch())
                { 
                    ?> 
                    <img data-toggle='modal' data-target="#model<?=$donnees['ID']?>" class='POSTERACTUAL' src="<?=$donnees['POSTERID']?>" id="<?=$donnees['ID']?>" >
                    
                    <!-- Modal -->
                    <div class="modal fade" id="model<?=$donnees['ID']?>" tabindex="-1" role="dialog" aria-labelledby="model<?=$donnees['TITLEID']?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title"><?= $donnees['TITLEID']?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                <!-- Body du MODAL DE MODIFICATION -->
                                <div class="modal-body">
                                    <div class="container-fluid row">
                                        <img class='POSTERACTUAL' src="<?=$donnees['BACKDROPID']?>" style="width:100%;">

                                        <form method="POST" action="update.php" class="col-12 col-md-12">

                                            <input type="text" name="movie" value="<?= $donnees['ID'] ?>" id="tete<?= $donnees['ID'] ?>" hidden> 
                                            <input type="text" name="target-category" value="progr" hidden>
                                            <input type="text" name="to-do" class="to-do" hidden>
                                            
                                            <input type="text" name="movieid" value="<?=$donnees['ID']?>" hidden>

                                            <label class="col-2 col-md-3" for="title_<?=$donnees['ID']?>">Titre</label>
                                            <input class="col-10 col-md-8" type="text" id="title_<?=$donnees['ID']?>" name="title" size="30" value="<?= $donnees['TITLEID']?>">
                                            
                                            <label class="col-2 col-md-3" for="overview_<?=$donnees['ID']?>">Description</label>
                                            <textarea class="col-10 col-md-8" id="overview_<?=$donnees['ID']?>" name="overview"><?= $donnees['CONTENTID']?></textarea>
                                            
                                            <label class="col-2 col-md-3" for="movielink_<?=$donnees['ID']?>">Lien vidéo</label>
                                            <input class="col-10 col-md-8" type="text" id="movielink_<?=$donnees['ID']?>" name="movielink" size="30" value="<?= $donnees['MOVIEID']?>">
            
                                    </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                        <input type="submit" value="Modifier" class="btn btn-primary">
                                        <input type="submit" value="Ajouter" class="btn btn-success">
                                        <input type="submit" value="Supprimer" class="btn btn-danger">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>