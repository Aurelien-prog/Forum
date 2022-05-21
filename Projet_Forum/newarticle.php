<?php
    include('header.php');

    $idRub = $_GET['idRub'];
    ?>
    <fieldset>
        <legend>Nouvel article</legend>
        <form action="majnewarticle.php?idRub=<?php echo $idRub; ?>" method="POST" name="newarticle">
            <input type="text" id="titreArt" name="titreArt" class="newart" maxlength="60" placeholder="Titre de l'article">
            <br>
            <textarea id="contenuArt" name="contenuArt" cols="30" rows="10" class="newart textareanewart" maxlength="2000" placeholder="Contenue de l'aricle (2000 caractères maximum)"></textarea>
            <br>
            <?php echo '<a href="majnewarticle.php?idRub='.$idRub.'"><button class="newart">Créer</button></a>'; ?>
        </form>
    </fieldset>
    <?php
    include('footer.php');
?>