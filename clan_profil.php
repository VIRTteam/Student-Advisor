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
                    <img src="<?php echo base_url(); ?>/img/woman-4.jpg" alt="people">
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
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope" style="position: relative; height: 2774.86px;">

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
                                    <div class="media-left">
                                        <a href="Clan_Clan_Profil.html">
                                            <img src="./img/guy-5(1).jpg" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="Clan_Kurs_Profil" class="comment-author pull-left">
                                            <?php echo $predmet['ime'] ?></a>
                                        <br/>
                                        <div class="comment-date"><?php echo $predmet['ocena'] ?></div>
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
                                    <a href="Clan_Clan_Profil">
                                        <img src="./img/guy-5(1).jpg" class="media-object">
                                    </a>
                                </div>
                                <div class="media-body">

                                    <div class="pull-right dropdown" >
                                        <a href="" class="toggle-button">
                                            <span title="Ne podrzavam"><i  class="fa fa-minus"> <?php echo $kom['brNepodrzavanja']?> </i></span>
                                        </a>
                                    </div>
                                    <div class="pull-right dropdown" >
                                        <a href=""  class="toggle-button">
                                            <span title="Podrzavam"> <i class="fa fa-plus"> <?php echo $kom['brPodrzavanja']?></i></span>
                                        </a>
                                    </div>
                                    <a href="Clan_Kurs_Profil.html" class="comment-author pull-left"><?php echo $kom['ime']?></a>
                                    <br/>
                                    <div class="comment-date"><?php echo $kom['tekst']?></div>
                                    <br/>
                                    <div class="comment-date"><?php echo $kom['datum']?></div>
                                </div>
                                <div class="view-all-comments">
                                    <a href="" data-toggle="modal" data-target="#myModal3">
                                        <i class="fa fa-comments-o"></i> Prikaži sve
                                    </a>
                                    <span>10 komentara</span>
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

<script >
    function getPodkomentari()
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('user/get_clan_podkomentari')?>',
            success: function(returnData ) {
                $('#podkomentari').html( returnData );
            }
        });

    }
</script>