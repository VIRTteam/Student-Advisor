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
                        $img =base_url().'/img/predavac/predavac'.$predavac['idPred'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li >
                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_profil')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_opis')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_opis')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading panel-heading-gray">
                <button onclick="" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></button>

                <i class="fa fa-fw fa-info-circle"></i> O Predavacu
            </div>
            <div class="panel-body">
                <ul class="list-unstyled profile-about margin-none">
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Ime</span></div>
                            <div class="col-sm-8"><?php echo $predavac['ime']?> </div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Prezime</span></div>
                            <div class="col-sm-8"><?php echo $predavac['prezime']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Zvanje</span></div>
                            <div class="col-sm-8"><?php echo $predavac['zvanje']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">E-mail</span></div>
                            <div class="col-sm-8"><?php echo $predavac['email']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Katedra</span></div>
                            <div class="col-sm-8"><?php echo $predavac['katedra']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Godina Zaposljenja</span></div>
                            <div class="col-sm-8"><?php echo $predavac['godinaZaposlenja']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">O predavacu</span></div>
                            <div class="col-sm-8"><?php echo $predavac['opis']?></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>