<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="connexion.php"  class="connect"><button class="btnconnect">Déjâ un compte ?</button></a>
        <a href="index.php" id="titre"><img src="img\logo_mathias.jpg" alt="logo mathias">Forum du BTS SIO</a>
    </header>
    <form action="maj.php" method="POST" name="NewAccount">
        <fieldset>
            <legend style="color:#649baf"><strong>Vos coordonnées</strong></legend>
                <input type="email" class="formulaire" name="email"  placeholder="Votre e-mail" required><br>
                <input type="name" class="formulaire" name="nom"    placeholder="Votre nom"required><br>
                <input type="name" class="formulaire" name="prenom" placeholder="Votre prénom"required><br>
                <input type="password" class="formulaire" name="mdp"    placeholder="Votre mot de passe"required><br>
                <br>
                <input type="submit" value="Créer"   id="BtnSubmit" class="bouton">
                <input type="reset"  value="Effacer" id="BtnReset"  class="bouton">
        </fieldset>
    </form>
</body>
</html>