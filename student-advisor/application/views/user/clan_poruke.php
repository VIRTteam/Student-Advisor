<!-- isi i vesic-->

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
                    if ($clan['slika']=='d') { $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';}
                    ?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li>
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div class="media messages-container media-clearfix-xs-min media-grid">
            <div class="media-left">
                <div class="messages-list">
                    <div class="panel panel-default" tabindex="1" style="overflow: hidden; outline: none;">
                        <ul class="list-group">

                            <?php foreach ($poslednjePoruke as $poruka): ?>

                                <li class="list-group-item <?php if($poruka['procitana'] =='n' and $poruka['idPrimalac']==$clan['idClan']) echo 'active';else echo ''?>" href="" onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $poruka['idClan']?>', '<?php echo "Poruke"?>')">


                                    <div class="media" >
                                        <div class="media-left">
                                            <?php
                                            $img =base_url().'img/clan_default.png';
                                            if ($poruka['slika']=='d') {
                                                $img =base_url().'/img/clan/clan'.$poruka['idClan'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body" >
                                            <span class="date"><?php echo $poruka['datum']?></span>
                                            <?php echo $poruka['tekst']?>
                                        </div>
                                    </div>

                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="media-body">

                <!--/KRECE UNOS SEND+txtArea-->
                <div class="panel panel-default share">

                    <!-- /input-group -->
                </div>
                <!--/KRAJ UNOS SEND+txtArea-->

                <?php foreach ($poruke as $por): ?>
                    <div class="media">
                        <div class="media-left">
                            <?php
                            $img =base_url().'img/clan_default.png';
                            if ($por['slika']=='d') {
                                $img =base_url().'/img/clan/clan'.$por['idClan'].'.jpg';
                            }?>
                            <a>
                                <img src="<?php echo $img?>"  width="60" height="60" alt="" class="media-object">
                            </a>
                        </div>
                        <div class="media-body message">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-white">
                                    <div class="pull-right">
                                        <small class="text-muted"><?php echo $por['datum']?></small>
                                    </div>
                                    <a href="javascript:void(0);"
                                       class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $por['idPosiljalac']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                                        <?php echo $por['ime']?> <?php echo $por['prezime'] ?>
                                    </a>

                                </div>
                                <div class="media-body" >
                                    <span class="comment-date" style="width: calc(100vw - 16px); word-wrap: break-word;"><?php echo $por['tekst']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <!--Ovde kopirati Unos+6txtArea za ispod   br/-->
                <div class="input-group">
                    <div class="input-group-btn">
                        <a class="btn btn-white" onclick="loadNewMessages('<?php echo site_url('user/get_clan_poruke_posalji');?>/<?php echo $saKim['idClan'] ?>')">
                            <i class="fa fa-envelope"></i> Send
                        </a>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" id="tekst" class="form-control share-text" placeholder="Write message...">
                </div>
            </div>
        </div>

    </div>
</div>


