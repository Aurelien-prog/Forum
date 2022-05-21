<center>
    <table class="stat">
        <th colspan="2">STATISTIQUES DU FORUM</th>
        <tr class="stat2">
            <td class="stat2">
                <?php
                $totalarticle = $cnn->query('select count(*) as nb from article');
                $totalarticle = $totalarticle->fetch();
                if($totalarticle [ 'nb'] > 1){
                    echo $totalarticle [ 'nb']. "<br>articles";
                }
                else{
                    echo $totalarticle [ 'nb']. "<br>article";
                }?>
            </td>
            <td class="stat2">
                <?php
                    $totalreponse = $cnn->query('select count(*) as nb from reponse');
                    $totalreponse=$totalreponse->fetch();
                    $nbmes = $totalreponse['nb']+$totalarticle [ 'nb'];
                    if($nbmes > 1){
                        echo $nbmes. "<br>messages";
                    }
                    else{
                        echo $nbmes. "<br>message";
                    }?>
            </td>
        </tr> 
    </table>
    <br>
    <table class="stat">
        <th colspan="2">STATISTIQUES DES MEMBRES</th>
        <tr class="stat2">
            <td class="stat2">
                <?php
                    $totalmembre = $cnn->query('select count(*) as nb from membre');
                    $totalmembre=$totalmembre->fetch();
                    $nbmemb = $totalmembre['nb'];
                    if($nbmemb >1){
                        echo $nbmemb. "<br>membres";
                    }
                    else{
                        echo $nbmemb. "<br>membre";
                    }?>
            </td>
            <td class="stat2"></td>
        </tr>
    </table>
        <a href="CharteInformatique.pdf" style="color:#649baf">Charte informatique</a>
    <?php
        $cnn=null;
    ?>
</center>
</body>
</html>