<div class="st-content-inner">

    <div class="container">
        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs">
                    <table ><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <img src="<?php echo base_url(); ?>/img/woman-4.jpg" alt="people">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">


                    <li>
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('moderator/get_mojprofil_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('moderator/get_mojprofil_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tabbable">
            <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                <li class="active">
                    <a href="http://themekit-v4.themekit.io/dist/themes/social-3/moderator-private-profile.html#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> O meni</a>
                </li>
                <li class="">
                    <a href="http://themekit-v4.themekit.io/dist/themes/social-3/moderator-private-profile.html#slike" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Slika</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active in" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-gray">
                                    <button onclick="" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                    <i class="fa fa-fw fa-info-circle"></i> O meni
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
                                                <div class="col-sm-4"><span class="text-muted">Datum rođenja</span></div>
                                                <div class="col-sm-8"><?php echo $clan['datumRodjenja']?></div>
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
                                                <div class="col-sm-4"><span class="text-muted">Opis</span></div>
                                                <div class="col-sm-8"><?echo $clan['opis']?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade " id="slike">
                    <img src="./img/food1.jpg" alt="image">
                </div>

            </div>
        </div>
    </div>
</div>
