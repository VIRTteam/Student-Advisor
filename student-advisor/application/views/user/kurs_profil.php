<!-- fali na plusic sta se desava-->


<div class="st-content-inner">
    <div class="container">

        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs">
                    <table><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <?php
                    $img =base_url().'img/kurs_default.jpg';
                    if ($kurs['slika']=='d') {
                        $img =base_url().'/img/kurs/kurs'.$kurs['idKurs'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $kurs['ime']?></font></h2></div>
                <ul class="cover-nav">
                    <li class="active">
                        <a class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_opis')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <?php if($sme_da_komentarise=='d'):?>
                        <li>
                            <a  class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_komentarisi')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                                <i class="fa fa-fw fa-envelope"></i> Komentariši
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>

        <div class="timeline row" >

            <div class="col-xs-12 col-md-4 item" >
                <div class="timeline-block">
                    <div class=" profile-card  ">
                        <div class="panel-body">
                            <div class="profile-card-icon">
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <h3 class="text-center">Ocena</h3>
                        </div>
                    </div>
                    <div class="panel panel-default relative">
                        <div class="panel-body panel-boxed text-center">
                            <div class="rating">
                                <div class="rating ">
                                    <?php for($i = $kurs['prosecnaOcena']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star disabled" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled disabled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php $t=0;?>
                            <?php foreach ($ocenio as $po): ?>
                           
                                    <?php
                                        $img =base_url().'img/clan_default.png';   
                                        if ($po['slika']=='d') { $img =base_url().'/img/clan/clan'.$po['idClan'].'.jpg';}
                                    ?>
                                    <a  data-toggle="modal"
                                       data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar_bez_komentara')?>/<?php echo $po['idKurs']?>/<?php echo $po['idClan']?>')">
                                        <img class="img-circle" src="<?php echo $img?>" width="50" height="50">
                                    </a>


                                <?php $t=$t+1; if ($t>=5) {$t=-1; break;}?>

                            <?php endforeach ?>
                            <?php if (sizeof($ocenio)>5): ?>
                                <a  class="user-count-circle"> +<?php echo sizeof($ocenio)-5 ?></a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>

                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a>Korisnici koji su položili</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            <?php if(count ($polozio) <=1)
                                echo count($polozio).' osoba';
                            else if(count($polozio)<5)
                                echo count($polozio).' osobe';
                            else
                                echo count ($polozio).' osoba'; ?>
                        </div>
                        <ul class="comments">
                            <?php foreach ($polozio as $po): ?>
                                <li class="media" id="predmet<?php echo $po['idKurs']?>-<?php echo $po['idClan']?>">
                                    <div class="media-left">
                                        <a  onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $po['idClan']?>', '<?php echo $po['ime']?> <?php echo $po['prezime']?>')">
                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($po['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$po['idClan'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php if($po['idClan']==$myID){?>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="brisanje_polozenog_ispita('<?php echo $po['idKurs']?>','<?php echo $myID?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        <?php }?>
                                        <a class="comment-author pull-left"
                                           onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $po['idClan']?>', '<?php echo $po['ime']?> <?php echo $po['prezime']?>')">

                                            <?php echo $po['ime']?> <?php echo $po['prezime']?>
                                        </a>
                                        <br/>
                                        <div class="comment-date">Ocena: <?php echo $po['ocena'] ?></div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-md-8 item">
                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Komentari članova</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            
                                 <span>
                                <?php if(count ($komentar) ==1)
                                    echo '1 komentar';
                                else
                                    echo count ($komentar).' komentara'; ?>
                            </span>
                        </div>
                        <ul class="comments">
                            <?php foreach ($komentar as $kom): if($kom['anonimno']=='1' and $kom['idClan']!=$myID):?>
                                <li class="media">
                                    <div class="media-left">
                                        <img src='<?php echo base_url()?>/img/unknown.jpg' height="60" width="60" class="media-object">
                                    </div>
                                    <div class="media-body">
                                        <?php if ($kom['idClan'] ==$myID) {?>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="brisanje_komentara('<?php echo $kom['idKom']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="izmeni_komentar('<?php echo $kom['idKom']?>')"
                                                    data-toggle="dropdown" class="toggle-button">
                                                    <i class="fa fa-pencil" data-tooltip="tooltip" title="Uredi"></i>
                                                </a>
                                            </div>
                                        <?php }?>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setUnlike('<?php echo $kom['idKom']?>', '<?php echo $myID?>')">
                                                <i class="fa fa-minus <?php echo ($kom['tip']=='n')? 'active' : 'unactive';?>"
                                                   id="nepodrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brNepodrzavanja']?> </i>
                                            </a>

                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setLike('<?php echo $kom['idKom']?>', '<?php echo $myID?>')">
                                                <i class="fa fa-plus <?php echo ($kom['tip']=='p')? 'active' : 'unactive'?>" id="podrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brPodrzavanja']?> </i>
                                            </a>
                                        </div>
                                        <a class="comment-author pull-left" >Anonimno</a>
                                        <br/>
                                        <div class="comment-text" id="tekstkomentara<?php echo $kom['idKom']?>"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($kom['datum']))->format('d.m.Y.');?></div>

                                    </div>
                                    <div class="view-all-comments">
                                        <a data-toggle="modal" data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                    <span> <?php if($kom['brPodkomentara'] ==1)
                                          echo '1 podkomentar';
                                      else
                                          echo $kom['brPodkomentara'].' podkomentara'; ?></span>
                                    </div>
                                </li>
                            <?php else:?>
                                <li class="media" id="komentar<?php echo $kom['idKom']?>">
                                    <div class="media-left">
                                        <a onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')">

                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($kom['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$kom['idClan'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php if ($kom['idClan'] ==$myID) {?>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="brisanje_komentara('<?php echo $kom['idKom']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="izmeni_komentar('<?php echo $kom['idKom']?>')"
                                                    data-toggle="dropdown" class="toggle-button">
                                                    <i class="fa fa-pencil" data-tooltip="tooltip" title="Uredi"></i>
                                                </a>
                                            </div>
                                        <?php }?>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setUnlike('<?php echo $kom['idKom']?>', '<?php echo $myID?>')">
                                                <i class="fa fa-minus <?php echo ($kom['tip']=='n')? 'active' : 'unactive';?>"
                                                   id="nepodrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brNepodrzavanja']?> </i>
                                            </a>

                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setLike('<?php echo $kom['idKom']?>', '<?php echo $myID?>')">
                                                <i class="fa fa-plus <?php echo ($kom['tip']=='p')? 'active' : 'unactive'?>" id="podrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brPodrzavanja']?> </i>
                                            </a>
                                        </div>

                                        <a
                                           onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')"
                                           class="comment-author pull-left" >
                                            <?php echo $kom['ime']?> <?php echo $kom['prezime']?>
                                        </a>
                                        <br/>
                                        <div class="comment-text" id="tekstkomentara<?php echo $kom['idKom']?>"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($kom['datum']))->format('d.m.Y.');?></div>

                                    </div>
                                    <div class="view-all-comments">
                                        <a data-toggle="modal" data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                  <span> <?php if($kom['brPodkomentara'] ==1)
                                          echo '1 podkomentar';
                                      else
                                          echo $kom['brPodkomentara'].' podkomentara'; ?></span>
                                    </div>
                                </li>
                            <?php endif; endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /st-content-inner -->