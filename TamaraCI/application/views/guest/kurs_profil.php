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
                        $img =base_url().'/img/kurs/kurs'.$kurs['idkurs'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $kurs['ime']?></font></h2></div>
                <ul class="cover-nav">
                    <li class="active">
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('guest/get_kurs_profil')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('guest/get_kurs_opis')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope">

            <div class="col-xs-12 col-md-4 item">
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
                            <div class="rating ">
                                <span class="star disable"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                                <span class="star filled"></span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <img src="./img/guy-2(1).jpg" alt="people" class="img-circle">
                            <img src="./img/woman-2.jpg" alt="people" class="img-circle">
                            <img src="./img/guy-3(1).jpg" alt="people" class="img-circle">
                            <img src="./img/woman-3(1).jpg" alt="people" class="img-circle">
                            <a href="" class="user-count-circle">12+</a>
                        </div>
                    </div>
                </div>

                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Korisnici koji su položili</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            <span>
                                <?php if(count ($polozio) <=1)
                                    echo count($polozio).' osoba';
                                else if($polozi<5)
                                    echo count($polozio).' osobe';
                                else
                                    echo count ($polozio).' osoba'; ?>
                        </div>

                        <ul class="comments">
                            <?php foreach ($polozio as $po): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $po['idClan']?>', '<?php echo $po['ime']?> <?php echo $po['prezime']?>')">
                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($po['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$po['idClan'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a class="comment-author pull-left" href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $po['idClan']?>', '<?php echo $po['ime']?> <?php echo $po['prezime']?>')">

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
                                    <a>Komentari članova</a>
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
                                           onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')">

                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($kom['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$kom['idClan'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="pull-right dropdown" >
                                            <a href="" class="toggle-button">
                                                <i class="fa fa-minus disabled"> <?php echo $kom['brNepodrzavanja']?></i>
                                            </a>
                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a  class="toggle-button disabled">
                                                <i class="fa fa-plus "> <?php echo $kom['brPodrzavanja']?></i>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0);"
                                           onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')"
                                           class="comment-author pull-left" >
                                            <?php echo $kom['ime']?> <?php echo $kom['prezime']?>
                                        </a>
                                        <br/>
                                        <div class="comment-date"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php echo $kom['datum']?></div>

                                    </div>
                                    <div class="view-all-comments">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('guest/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                  <span> <?php if($kom['brPodkomentara'] ==1)
                                          echo '1 komentar';
                                      else
                                          echo $kom['brPodkomentara'].' komentara'; ?></span>
                                    </div>
                                </li>
                            <?php  endforeach?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div> <!--/container-->
</div>