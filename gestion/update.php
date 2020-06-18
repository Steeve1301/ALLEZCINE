	
<?php
try
{

  $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema;charset=UTF8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
  $title= addslashes($_POST['title']);
  $overview= addslashes($_POST['overview']);
  $movielink= $_POST['movielink'];
  $movie = $_POST['movie'];
  $ID= $_POST['movieid'];

  if($_POST['target-category']=="head"){
        if($_POST['to-do'] == 'delete'){
                $req = "DELETE FROM headermovie WHERE ID=$movie";
                $bdd->query($req);
        }
        elseif($_POST['to-do']=='update'){
                $req= "UPDATE headermovie SET MOVIEID='$movielink' WHERE ID = $ID";
                $bdd->query($req);
        }
        header('location:customize.php');

  }
  elseif($_POST['target-category']=="progr"){

    if($_POST['to-do'] == 'delete'){
            $req = "DELETE FROM progrcine WHERE ID=$movie";
            $bdd->query($req);  
    }
    elseif($_POST['to-do']=='update'){
        $req= "UPDATE progrcine SET MOVIEID='$movielink', CONTENTID='$overview', TITLEID='$title' WHERE ID = $ID";
        $bdd->query($req);
    }
    header('location:program.php');
  }
  elseif($_POST['target-category']=="next"){

    if($_POST['to-do'] == 'delete'){
            $req = "DELETE FROM prochcine WHERE ID=$movie";
            $bdd->query($req);
    }
    elseif($_POST['to-do']=='update'){
        $req= "UPDATE prochcine SET MOVIEID='$movielink', CONTENTID='$overview', TITLEID='$title' WHERE ID = $ID";
        $bdd->query($req);
    }
    header('location:coming.php');
  }
  else{
          echo "404";
  }
 }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
