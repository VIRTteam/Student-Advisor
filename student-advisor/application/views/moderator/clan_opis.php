<div class="st-content-inner" id="gost_clan_opis">
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
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?dummy='.'<?php echo random_int(0,10000)?>';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li >
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li class="active">
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_poruke')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-envelope"></i>  Kontaktiraj
                        </a>
                    </li>
                    <?php if ($clan['tip'] =='c' or $clan['tip']=='m') {?>
                    <li><a onclick="unapredi('<?php echo $clan['idClan']?>')"><i class="fa fa-arrow-up"></i> Unapredi</a></li>
                    <?php } ?>
                    <?php if ($clan['tip'] =='m' or $clan['tip']=='a') {?>
                    <li><a onclick="derangiraj('<?php echo $clan['idClan']?>')"><i class="fa fa-arrow-down"></i> Derangiraj</a></li>
                    <?php } ?>
                    <?php if ($clan['tip'] =='c' or $clan['tip']=='m') {?>
                    <li><a onclick="banuj('<?php echo $clan['idClan']?>')"><i class="fa fa-ban"></i> Banuj</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="tabbable">
            <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                <li  class="active">
                    <a href="#oKorisniku" data-toggle="tab">
                        <i class="fa fa-fw fa-folder"></i> O korisniku</a>
                </li>
                <li  class="">
                    <a href="#slika" data-toggle="tab">
                        <i class="fa fa-fw fa-picture-o"></i> Slika</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="slika">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?dummy='.'<?php echo random_int(0,10000)?>';
                    }?>
                    <img src="<?php echo $img?>" height="200" width="200">
                </div>

                <div class="tab-pane fade active in" id="oKorisniku">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-gray">
                                <i class="fa fa-fw fa-info-circle"></i> O korisniku
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled profile-about margin-none">
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Ime</span></div>
                                            <div class="col-sm-8"><?php echo $clan['ime']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Prezime</span></div>
                                            <div class="col-sm-8"><?php echo $clan['prezime']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">E-Mail</span></div>
                                            <div class="col-sm-8"><?php echo $clan['email']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Pol</span></div>
                                            <div class="col-sm-8">
                                                <?php
                                                if ($clan['pol'][0]=='z')
                                                    echo "ženski";
                                                else
                                                    echo "muški";
                                                ?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Datum rođenja</span></div>
                                            <div class="col-sm-8"><?php   date_default_timezone_set("Europe/Belgrade");
                                                echo DateTime::createFromFormat('Y-m-d',date($clan['datumRodjenja']))->format('d.m.Y.');?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Smer</span></div>
                                            <div class="col-sm-8"><?php echo $clan['smer']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Godina upisa</span></div>
                                            <div class="col-sm-8"><?php echo $clan['godinaUpisa']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Prosecna ocena</span></div>
                                            <div class="col-sm-8"><?php echo $clan['prosecnaOcena']?></div>
                                        </div>
                                    </li>

                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Opis</span></div>
                                            <div class="col-sm-8"><?php echo $clan['opis']?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

