<!-- sve ok-->

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
                    $img =base_url().'img/predavac_default.jpg';
                    if ($predavac['slika']=='d') {
                        $img =base_url().'/img/predavac/predavac'.$predavac['idPred'].'.jpg?dummy='."<?php echo random_int(0,10000)?>";
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li class="active">
                        <a class="movie" onclick="getSummary('<?php echo site_url('user/get_predavac_profil')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('user/get_predavac_opis')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li>
                        <a  class="movie"  onclick="slanje_maila('<?php echo $predavac['idPred']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope" >

            <div class="col-xs-12 col-md-4 item">
                <div class="timeline-block">
                    <div class="panel panel-default profile-card clearfix-xs">
                        <div class="panel-body">
                            <div class="profile-card-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <h4 class="text-center"><?php echo $predavac['zvanje']?></h4>
                            <ul class="icon-list icon-list-block">
                                <li><i class="fa fa-map-marker"></i>Fakultet: Elektrotehnički fakultet, Beograd</li>
                                <li><i class="fa fa-trophy"></i>E-mail: <?php echo $predavac['email']?></li>
                                <li><i class="fa fa-calendar"></i>Katedra: <?php echo $predavac['katedra']?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Predaje na kursevima</a>
                                </div>
                            </div>
                        </div>

                        <div class="view-all-comments">
                            <span>
                                <?php if(count ($predaje) ==1)
                                    echo '1 kurs';
                                else if(count ($predaje)<5 && count ($predaje)>1)
                                    echo count ($predaje).' kursa';
                                else
                                    echo count ($predaje).' kurseva'; ?>
                            </span>
                        </div>
                        <ul class="comments">
                            <?php foreach ($predaje as $predmet): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a  onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')"
                                        >
                                            <?php
                                            $img =base_url().'img/kurs_default.jpg';
                                            if ($predmet['slika']=='d') {
                                                $img =base_url().'/img/kurs/kurs'.$predmet['idKurs'].'.jpg?dummy='."<?php echo random_int(0,10000)?>";
                                            }?>
                                            <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')"
                                           class="comment-author pull-left">
                                            <?php echo $predmet['ime'] ?></a>

                                    </div>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-md-8 item" >
                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Komentari sa kurseva na kojima predaje</a>
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
                                <li class="media" id="komentar<?php echo $kom['idKom']?>">
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

                                        <a onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')"
                                           class="comment-author pull-left"><?php echo $kom['ime']?></a>
                                        <br/>
                                        <div class="comment-text" id="tekstkomentara<?php echo $kom['idKom']?>"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($kom['datum']))->format('d.m.Y.');?></div>
                                    </div>
                                    <div class="view-all-comments">
                                        <a  onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                        <span><?php if($kom['brPodkomentara'] ==1)
                                                echo '1 komentar';
                                            else
                                                echo  $kom['brPodkomentara'].' komentara'; ?></span>
                                    </div>
                                </li>
                            <?php else:?>
                                <li class="media" id="komentar<?php echo $kom['idKom']?>">
                                    <div class="media-left">
                                        <a onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?>')"
                                        >
                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($kom['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$kom['idClan'].'.jpg?dummy='."<?php echo random_int(0,10000)?>";
                                            }?>
                                            <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
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
                                        <a onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')"
                                           class="comment-author pull-left"><?php echo $kom['ime']?></a>
                                        <br/>
                                        <div class="comment-text" id="tekstkomentara<?php echo $kom['idKom']?>"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($kom['datum']))->format('d.m.Y.');?></div>
                                    </div>
                                    <div class="view-all-comments">
                                        <a  onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                        <span><?php if($kom['brPodkomentara'] ==1)
                                                echo '1 komentar';
                                            else
                                                echo  $kom['brPodkomentara'].' komentara'; ?></span>
                                    </div>
                                </li>
                            <?php endif; endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>