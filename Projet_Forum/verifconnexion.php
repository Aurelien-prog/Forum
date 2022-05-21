<?php
    session_start();
        $host = 'localhost';
        $bdd = 'projet2';
        $user = 'root';
        $passwd = 'root';

        try{
            $cnn = new PDO("mysql:host=$host;dbname=$bdd", $user, $passwd); //connexion à la base de donnée
            $cnn->exec("set names utf8");
        }
        catch(PDOException $e){
            echo "Erreur : ".$e->getMessage(); //en cas d'échec de la connexion au serveur
        }

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $query = 'SELECT * FROM membre WHERE idMemb="'.$email.'" and mdpMemb="'.$mdp.'"';
        echo $query;

        $resultat=$cnn->query($query);

        if($row=$resultat->fetch()){
            $_SESSION['id']=$row['idMemb'];
            $_SESSION['nom']=$row['nomMemb'];
            $_SESSION['prenom']=$row['prenomMemb'];
            $_SESSION['type']=$row['typeMemb'];
        }

        $cnn=null;                //fermeture de la connexion à la base et au serveur
        header('Location: index.php');
?>