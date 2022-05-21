<?php
    include('header.php');

    $idRub = $_GET['idRub'];
    $rubrique = 'select * from rubrique where idRub='.$idRub;
    $rubrique = $cnn->query($rubrique);
    $rubrique = $rubrique->fetch();

    ?><fieldset><legend><?php echo $rubrique['nomRub']; ?></legend><?php
        $article = 'select * from article where idRub='.$idRub;
        $article = $cnn->query($article);
        while($var = $article->fetch()){
            ?>
            <table>
                <tr>
                    <td width="30"><img src="img/logo bulle.png" class="imgbulle"></td>
                    <td style="color:#323c46"><b><?php echo '<a href="article.php?idArt='.$var['idArt'].'">'.$var['titreArt'].'</a>' ?></b></td>
                    <td width="40" style="text-align:center"><?php
                        $reponse = 'select count(*) as nb from reponse where idArt='.$var['idArt'];
                        $reponse = $cnn->query($reponse);
                        $reponse = $reponse->fetch();
                        if($reponse['nb'] > 1){
                            echo $reponse['nb']."<br>réponses";
                        }
                        else{
                            echo $reponse['nb']."<br>réponse";
                        }?>
                    </td>
                </tr>
            </table>
            <br>
            <?php
        }
    ?></fieldset><?php

    if(isset($_SESSION['id'])){
        echo '<a href="newarticle.php?idRub='.$idRub.'"><button class="newmsg">Ajouter un article</button></a>';
    }

    include('footer.php');
?>