<?php
    $host = 'localhost';
    $bdd = 'projet2';
    $user = 'root';
    $passwd = 'root';

    try{
        $cnn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connexion à la base de donnée
        $cnn->exec("set names utf8");
        echo "connexion réussi";
    }
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage(); //en cas d'échec de la connexion au serveur
    }

    $idMemb = $_SESSION['id'];
    $idArt = $_POST['idArt'];
    $contenuRep = $_POST['contenurep'];
    

    $query = 'INSERT INTO membre (idMemb, idArt, dateRep, contenuRep) VALUES ("'.$idMemb.'","'.$idArt.'",NOW(),"'.$contenuRep.'"';
    echo $query;
    $cnn->exec($query);

    $cnn=null; //fermeture de la connexion à la base et au serveur
?>
<meta http-equiv="refresh" content="1; url=index.php"/>