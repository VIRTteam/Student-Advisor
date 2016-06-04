<!-- isi vesic-->


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
                        <a href="javascript:void(0);" 
                           class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_poruke')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
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

                                <li class="list-group-item <?php if($poruka['procitana'] =='d') echo 'active';else echo ''?>">


                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/woman-5.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
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
                            <a>
                                <img src="./img/woman-5.jpg" width="60" alt="woman" class="media-object">
                            </a>
                        </div>
                        <div class="media-body message">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-white">
                                    <div class="pull-right">
                                        <small class="text-muted"><?php echo $por['datum']?></small>
                                    </div>
                                    <a href="javascript:void(0);"
                                          class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $por['idPosiljalac']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                                        <?php echo $por['idPosiljalac']?>
                                        </a>

                                </div>
                                <div class="panel-body">
                                    <?php echo $por['tekst']?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                    <!--Ovde kopirati Unos+6txtArea za ispod   br/-->
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a class="btn btn-white" href="">
                                <i class="fa fa-envelope"></i> Send
                            </a>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control share-text" placeholder="Write message...">
                    </div>
                </div>
            </div>

        </div>
    </div>
