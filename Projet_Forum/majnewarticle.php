<?php
    session_start();
    $host = 'localhost';
    $bdd = 'projet2';
    $user = 'root';
    $passwd = 'root';

    try{
        $cnn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $cnn->exec("set names utf8");
    }
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage();
    }

    $titreArt = $_POST['titreArt'];
    $contenuArt = $_POST['contenuArt'];
    $idRub = $_GET['idRub'];
    $idMemb = $_SESSION['id'];

    $query = 'INSERT INTO article (titreArt, dateArt, contenuArt, idMemb, idRub) VALUES ("'.$titreArt.'",NOW(),"'.$contenuArt.'","'.$idMemb.'",'.$idRub.')';
    echo $query;
    $cnn->exec($query);

    $cnn=null;
?>
<meta http-equiv="refresh" content="1; url=index.php"/>