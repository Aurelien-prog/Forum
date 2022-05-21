<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="newaccount.php" class="connect"><button class="btnconnect">S'inscrire</button></a>
        <a href="index.php" id="titre"><img src="img\logo_mathias.jpg" alt="logo mathias">Forum du BTS SIO</a>
    </header>
    <form action="verifconnexion.php" method="POST" name="Connexion">
        <fieldset>
                <input type="email"    class="formulaire" name="email"  placeholder="E-mail" required><br>
                <input type="password" class="formulaire" name="mdp"    placeholder="Mot de passe"required><br>
                <br>
                <input type="submit" value="Se connecter" id="BtnSubmit" class="bouton">
                <input type="reset"  value="Effacer" id="BtnReset" class="bouton">
        </fieldset>
    </form>
</body>
</html>