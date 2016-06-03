<div class="st-content-inner">
    <div class="container">

        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs ">
                    <table><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li class="active">

                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-envelope"></i>  Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope">

            <div class="col-xs-12 col-md-4 item" >
                <div class="timeline-block">
                    <div class="panel panel-default profile-card clearfix-xs">
                        <div class="panel-body">
                            <div class="profile-card-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <h4 class="text-center">Student</h4>
                            <ul class="icon-list icon-list-block">
                                <li><i class="fa fa-map-marker"></i> Elektrotehnički fakultet, Beograd</li>
                                <li><i class="fa fa-trophy"></i> <?php echo $clan['godinaUpisa']?> godine upisao</li>
                                <li><i class="fa fa-calendar"></i> Prosek: <?php echo $clan['prosecnaOcena']?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a href="">Položeni kursevi</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            <span>
                                <?php if(count ($polozio) ==1)
                                    echo '1 polozeni ispit';
                                else if(count ($polozio) ==0)
                                    echo '0 polozenih ispita';
                                else
                                    echo count ($polozio).' polozena ispita'; ?>
                        </div>
                        <ul class="comments">
                            <?php foreach ($polozio as $predmet): ?>
                                <li class="media">
                                    <div class="media-left"
                                         onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')">
                                        <?php
                                        $img =base_url().'img/kurs_default.jpg';
                                        if ($predmet['slika']=='d') {
                                            $img =base_url().'/img/kurs/kurs'.$predmet['idkurs'].'.jpg';
                                        }?>
                                        <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                    </div>
                                    <div class="media-body">
                                        <a href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')"
                                           class="comment-author pull-left">
                                            <?php echo $predmet['ime'] ?></a>
                                        <br/>
                                        <div class="comment-date">Ocena: <?php echo $predmet['ocena'] ?></div>
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
                                    <a href="">Komentari člana</a>
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
                            <?php foreach ($komentar as $kom): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')"
                                        >
                                            <?php
                                            $img =base_url().'img/kurs_default.jpg';
                                            if ($kom['slika']=='d') {
                                                $img =base_url().'/img/kurs/kurs'.$kom['idkurs'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                        </a>
                                    </div>
                                    <div class="media-body">

                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button" href="javascript:void(0);"
                                               onclick="setUnlike('<?php echo $kom['idKom']?>', '<?php echo $myID?>','<?php echo $kom['tip']?>')">
                                                <i class="fa fa-minus <?php echo ($kom['tip']=='n')? 'active' : 'unactive';?>" id="nepodrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brPodrzavanja']?> </i>
                                            </a>

                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button" href="javascript:void(0);"
                                               onclick="setLike('<?php echo $kom['idKom']?>', '<?php echo $myID?>','<?php echo $kom['tip']?>')">
                                                <i class="fa fa-plus <?php echo ($kom['tip']=='p')? 'active' : 'unactive'?>" id="podrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brPodrzavanja']?> </i>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')"
                                           class="comment-author pull-left"><?php echo $kom['ime']?></a>
                                        <br/>
                                        <div class="comment-date"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php echo $kom['datum']?></div>
                                    </div>
                                    <div class="view-all-comments">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('user/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                        <span><?php if($kom['brPodkomentara'] ==1)
                                                echo '1 podkomentar';
                                            else
                                                echo  $kom['brPodkomentara'].' podkomentara'; ?></span>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--/container-->
</div><!-- /st-content-inner -->

<div class="modal fade" id="podkomentari" role="dialog">

</div>


<script>

    function setLike(id,myID,stariTip)
    {
        if(stariTip=='p') {
            document.getElementById('podrzavanje' + id).className = "fa fa-plus unactive";

            return;
        }else if(stariTip=='n') {
            document.getElementById('podrzavanje' + id).className = "fa fa-plus active";
            document.getElementById('nepodrzavanje' + id).className = "fa fa-minus unactive";
            return;
        }
        else
            document.getElementById('podrzavanje' + id).className = "fa fa-plus active";
        var rez=$.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_obrada/obradi_odrzavanje/p',
            data: {idKom: id},
            success: function (returnData) {
                return returnData.responseText;
            }
        });
    }
    function setUnlike(id,myID,stariTip)
    {
        for(var i=1;i<=5;i++){
            if(i<=id)
                document.getElementById('star'+i).className="star filled";
            else
                document.getElementById('star'+i).className="star";
        }
    }
</script>

