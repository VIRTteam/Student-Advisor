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
                    <img src="./img/unknown.jpg" alt="people">
                </div>
                <div class="name">
                    <h2><font color="#105DC1"><?php echo $kurs['ime']?></font></h2>
                </div>
                <ul class="cover-nav">
                    <li >
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('guest/get_kurs_profil')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('guest/get_kurs_opis')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope" style="position: relative; height: 2774.86px;">

            <div class="col-xs-12 col-md-4 item">
                <div class="timeline-block">
                    <div class="panel panel-default relative">
                        <ul class="icon-list icon-list-block">
                            <li>Zanimljivost
                                <div class="media" align="right" ><?php echo $kurs['zanimljivost']?></div>
                            </li>
                            <li>Korisnost
                                <div class="media" align="right" ><?php echo $kurs['korisnost']?></div>
                            </li>
                            <li>Tezina
                                <div class="media" align="right" ><?php echo $kurs['tezina']?></div>
                            </li>
                            <li>Preporuka
                                <div class="media" align="right" ><?php echo $kurs['preporuka']?></div>
                            </li>
                        </ul>
                        <div class="panel-body panel-boxed text-center">
                            <div class="rating">
                                <span class="star"></span>
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
            </div>

            <div class="col-xs-12 col-md-8 item">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-gray">
                        <i class="fa fa-fw fa-info-circle"></i> O kursu
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled profile-about margin-none">
                            <?php foreach ($predavac as $p): ?>
                            <li class="padding-v-5">
                                <div class="row">
                                    <div class="col-sm-4"><span class="text-muted"><?php echo ucfirst($p['zvanje'])?></span></div>
                                    <div class="col-sm-8"><?php echo $p['ime']?> <?php echo $p['prezime']?></div>
                                </div>
                            </li>
                            <?php endforeach;?>
                            <li class="padding-v-5">
                                <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">Opis</span></div>
                                    <div class="col-sm-8"><?php echo $kurs['opis']?></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
      