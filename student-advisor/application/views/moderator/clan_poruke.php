<div class="st-content-inner">
    <div class="container">
        <?php if($saKim!='FALSE'):?>
        <div class="media messages-container media-clearfix-xs-min media-grid" >
            <div class="media-left">
                <div class="messages-list">
                    <div class="panel panel-default" tabindex="1" style="overflow: hidden; outline: none;">
                        <ul class="list-group" style="max-height: calc(100vh - 10rem); overflow-y: auto">
                            <?php foreach ($poslednjePoruke as $poruka): ?>
                                <li class="list-group-item <?php if($poruka['procitana'] =='n' and $poruka['idPrimalac']==$clan['idClan']) echo 'active';else echo ''?>"
                                    onclick="getSummary('<?php echo site_url('moderator/get_clan_poruke')?>/<?php echo $poruka['idClan']?>', '<?php echo "Poruke"?>')">
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
                                        <span class="date">
                                            <?php
                                            date_default_timezone_set("Europe/Belgrade");
                                            $sad=date("Y-m-d H:i:s");
                                            $tekT=strtotime('+1 day', strtotime($poruka['datum']));
                                            if($tekT<strtotime($sad))
                                                echo DateTime::createFromFormat('Y-m-d H:i:s',date($poruka['datum']))->format('d.m.Y.');
                                            else
                                                echo DateTime::createFromFormat('Y-m-d H:i:s',date($poruka['datum']))->format('H:i');
                                            ?>
                                        </span>
                                            <a style="color: #104fc1"><?php echo $poruka['ime']?> <?php echo $poruka['prezime']?></a>
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
                
                <a onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $saKim['idClan']?>', '<?php echo $saKim['ime']?> <?php echo $saKim['prezime']?>')">
                    <h4 style="margin-top: 3px"><?php echo $saKim['ime']?> <?php echo $saKim['prezime'] ?></h4>
                </a>
                <div style="max-height: calc(100vh - 20rem); overflow-y: auto">
                    <?php foreach ($poruke as $por): ?>
                        <div class="media" >
                            <div class="media-left"
                                 onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $por['idPosiljalac']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                                <?php
                                $img =base_url().'img/clan_default.png';
                                if ($poruka['slika']=='d') {
                                    $img =base_url().'/img/clan/clan'.$poruka['idClan'].'.jpg';
                                }?>
                                <img src="<?php echo $img?>" width="50" height="50" alt="" class="media-object">
                            </div>
                            <div class="media-body message">
                                <div class="content panel panel-default" >
                                    <div class="content panel-heading panel-heading-white">
                                        <div class="pull-right">
                                            <small class="text-muted">
                                                <?php
                                                date_default_timezone_set("Europe/Belgrade");
                                                $sad=date("Y-m-d H:i:s");
                                                $tekT=strtotime('+1 day', strtotime($por['datum']));
                                                if($tekT<strtotime($sad))
                                                    echo DateTime::createFromFormat('Y-m-d H:i:s',date($por['datum']))->format('d.m.Y.');
                                                else
                                                    echo DateTime::createFromFormat('Y-m-d H:i:s',date($por['datum']))->format('H:i');
                                                ?>
                                            </small>
                                        </div>

                                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $por['idPosiljalac']?>', '<?php echo $por['ime']?> <?php echo $por['prezime']?>')">
                                            <?php echo $por['ime']?> <?php echo $por['prezime'] ?>
                                        </a>
                                    </div>
                                    <div class="panel-body" style="width:  word-wrap: break-word;">
                                        <?php echo $por['tekst']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="input-group" style="margin-top: 10px">
                    <textarea class="form-control share-text"  placeholder="Napisi poruku..." style="height: 90px"
                              id="tekst"></textarea>
                    <div class="input-group-btn"  >
                        <a class="btn btn-white"a style="height: 90px; vertical-align: center; padding-top:30px"
                           onclick="loadNewMessages('<?php echo site_url('moderator/get_clan_poruke_posalji');?>/<?php echo $saKim['idClan'] ?>')">
                            <i class="fa fa-envelope" ></i> Send
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <?php else: ?>
            <h4 >Poruke ne postoje!!!</h4>
        <?php endif; ?>
    </div>
</div>

