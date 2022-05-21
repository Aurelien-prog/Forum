<?php
include('header.php');

$idArt = $_GET['idArt'];

$reqtitre = 'select titreArt, contenuArt from article where idArt='.$idArt;
$reqtitre = $cnn->query($reqtitre);
$titre = $reqtitre->fetch();

$reqreponse = 'select * from reponse where idArt='.$idArt;
$reponse = $cnn->query($reqreponse);

?>
<fieldset>
    <legend><?php echo $titre['titreArt']; ?></legend>
    <p><?php echo $titre['contenuArt']; ?></p>
</fieldset>

<fieldset>
    <legend>Réponses</legend>
        <br>
        <?php
        while($var = $reponse->fetch()){
            ?>
            <table class="cadre">
                <tr>
                    <td id="NomPrenom">
                        <?php
                        $reqmembre = 'select nomMemb, prenomMemb from membre where idMemb="'.$var['idMemb'].'"';
                        $req_membre = $cnn->query($reqmembre);
                        $membre = $req_membre->fetch();
                        echo $membre['nomMemb']." ".$membre['prenomMemb'];
                        ?>
                        <br>
                        <div id="date"><?php echo 'Posté le : '.strftime("%d/%m/%Y à %H:%M:%S", strtotime($var['dateRep'])); ?></div>
                    </td>
                    <td class="cadre">
                        <?php
                        echo $var['contenuRep'];
                        ?>
                    </td>
                </tr>
            </table>
            <br>
            <?php
        }
        ?>
</fieldset>
<?php
if(isset($_SESSION['id'])){
    ?>
    <form action="majmsg.php" method="POST" id="formrep">
        <center><textarea class="textareanewrep" maxlenght="1024" placeholder="Écrivez votre réponse !"></textarea></center>
        <a href="majmsg.php?idArt=<?php echo $idArt ?>"><button class="newmsg">Répondre</button></a>
    </form>
    <?php
}
include('footer.php');
?>