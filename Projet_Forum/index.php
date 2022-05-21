<?php
    include('header.php');
        $requete = 'select * from categorie';
        $resultat = $cnn->query($requete);
        
        while ($var = $resultat->fetch()){
            ?><fieldset><legend><?php echo $var['nomCat']; ?></legend><?php
            $requete2 = 'select * from  rubrique where idCat='.$var['idCat'];
            $resultat2 = $cnn->query($requete2);
            while ($var2 = $resultat2->fetch()){
                ?>
                <table>
                    <tr>
                        <td rowspan="2" width="30"><img src="img/logo bulle.png" class="imgbulle"></td>
                        <td style="color:#323c46"><b><?php echo '<a href="rubrique.php?idRub='.$var2['idRub'].'">'.$var2['nomRub'].'</a>' ?></b></td>
                        <td rowspan="2" width="40" style="text-align:center"><?php
                            $requete3 = 'select count(*) as Nb from article where idRub='.$var2['idRub'];
                            $resultat3 = $cnn->query($requete3);
                            $var3 = $resultat3->fetch();
                            $Nb = $var3['Nb'];
                            $requete3 = 'select count(*) as Nb from reponse inner join article on article.idArt = reponse.idArt where idRub='.$var2['idRub'];
                            $resultat3 = $cnn->query($requete3);
                            $var3 = $resultat3->fetch();
                            $Nb += $var3['Nb'];
                            echo $Nb;
                            if($Nb > 1){
                                echo "<br>messages";
                            }
                            else{
                                echo "<br>message";
                            }?>
                        </td>
                        <td rowspan="2" width="150"><?php
                            $requeteArticle = 'select max(dateArt) as art from article where idRub='.$var2['idRub'];
                            $resultatArticle = $cnn->query($requeteArticle);
                            $varArticle = $resultatArticle->fetch();
                            $art = $varArticle['art'];
                            $requeteReponse = 'select max(dateRep) as rep from reponse inner join article on reponse.idArt=article.idArt where idRub ='.$var2['idRub'];
                            $resultatReponse = $cnn->query($requeteReponse);
                            $varReponse = $resultatReponse->fetch();
                            $rep = $varReponse['rep'];
                            if($art > $rep){
                                $last = $art;
                                $requeteLastNom = 'select * from membre inner join article on article.idMemb = membre.idMemb where dateArt="'.$last.'"';
                            }
                            else{
                                $last = $rep;
                                $requeteLastNom = 'select * from membre inner join reponse on reponse.idMemb = membre.idMemb inner join article on reponse.idArt = article.idArt where dateRep="'.$last.'"';
                            }
                            ?><span id="last"><?php
                            $resultatLastNom = $cnn->query($requeteLastNom);
                            $varLast = $resultatLastNom->fetch();
                            if($varLast){
                                $titre = $varLast['titreArt'];
                                $LastNom = $varLast['nomMemb'];
                                $LastPrenom = $varLast['prenomMemb'];
                                $typeMemb = $varLast['typeMemb'];
                                if(strlen($titre) > 25){
                                    echo '<font color="blue">'.substr($titre, 0, 24).'...</font>';
                                }
                                else{
                                        echo '<font color="blue">'.$titre.'</font>';
                                }
                                echo '<br>Par <font color="';
                                if($typeMemb==0){ echo 'red'; } else if ($typeMemb==1) { echo 'blue'; } else  { echo 'black'; }
                                    echo '">'.$LastNom." ".$LastPrenom.'</font>';
                                    echo '<br>Le '.strftime("%d/%m/%Y à %H:%M:%S", strtotime($last));
                                }
                                ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $var2['descRub'] ?></td>
                        </tr>
                </table>
                <br>
                <?php
            }
            ?></fieldset><?php
        }
    include('footer.php');
    ?>