<?php
    $host = 'localhost';
    $bdd = 'projet2';
    $user = 'root';
    $passwd = 'root';

    try{
        $cnn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connexion à la base de donnée
        $cnn->exec("set names utf8");
    }
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage(); //en cas d'échec de la connexion au serveur
    }

    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];
    
    $query = 'INSERT INTO membre (idMemb, nomMemb, prenomMemb, mdpMemb, dateins, typeMemb) VALUES ("'.$email.'","'.$nom.'","'.$prenom.'","'.$mdp.'",NOW(),2)';
    echo $query;
    $cnn->exec($query);

    $cnn=null; //fermeture de la connexion à la base et au serveur
?>
<meta http-equiv="refresh" content="1; url=index.php"/>