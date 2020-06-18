	
<?php
try
{

  $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema;charset=UTF8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $id= $_POST['IDM'];
  $idmovie = "http://youtube.com/embed/".$_POST['idmovie'];
  $idposter = "https://image.tmdb.org/t/p/w200".$_POST['idposter'];
  $idbackdrop = "https://image.tmdb.org/t/p/original".$_POST['idbackdrop'];
  $idcontent = addslashes($_POST['idcontent']);
  $idtitle = addslashes($_POST['idtitle']);

  if($_POST['todo']=="head"){
        $req = "INSERT INTO headermovie (ID, MOVIEID, POSTERID, BACKDROPID, CONTENTID, TITLEID) VALUES('$id','$idmovie','$idposter','$idbackdrop','$idcontent','$idtitle')";
        header('location:customize.php');
      }
  elseif($_POST['todo']=="prog"){
        $req = "INSERT INTO progrcine (ID, MOVIEID, POSTERID, BACKDROPID, CONTENTID, TITLEID) VALUES('$id','$idmovie','$idposter','$idbackdrop','$idcontent','$idtitle')";
        header('location:program.php');
      }
  elseif($_POST['todo']=="next"){
        $req = "INSERT INTO prochcine (ID, MOVIEID, POSTERID, BACKDROPID, CONTENTID, TITLEID) VALUES('$id','$idmovie','$idposter','$idbackdrop','$idcontent','$idtitle')";
        header('location:coming.php');
      }
  elseif($_POST['todo']=="out"){
        $req = "INSERT INTO outsceance (ID, MOVIEID, POSTERID, BACKDROPID, CONTENTID, TITLEID) VALUES('$id','$idmovie','$idposter','$idbackdrop','$idcontent','$idtitle')";
  }

  $bdd->query($req);

 }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
