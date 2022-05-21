<td><?php
                        $last = 'select max(daterep) as date from reponse where idArt='.$idArt;
                        $last = $cnn->query($last);
                        $last = $last->fetch();
                        $lastnom = 'select * from membre inner join reponse on reponse.idMemb = membre.idMemb where dateRep="'.$last['date'].'"';
                        $reponse2 = $cnn->query($lastnom);
                        $var2 = $reponse2->fetch();
                        echo $var2['nomMemb'];
                    ?></td>