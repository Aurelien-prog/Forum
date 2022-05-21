<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForumSIO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php" id="titre"><img src="img\logo_mathias.jpg" alt="logo mathias">Forum du BTS SIO</a>
        <?php
            if(isset($_SESSION['id'])){
                echo '<span class="connect2">'.$_SESSION['prenom'].' '.$_SESSION['nom'].'</span>'.'<span class="connect"> connecté en tant que  '.'</span>';
                ?><br><a href="deconnexion.php"><button id="btndisconnect">Se déconnecter</button></a><?php
            }
            else{
                ?><a href="connexion.php"  class="connect"><button class="btnconnect">Déjâ un compte ?</button></a>
                <a href="newaccount.php" class="connect"><button class="btnconnect">S'inscrire</button></a><?php
            }
        ?>
    </header>
    <?php
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
    ?>