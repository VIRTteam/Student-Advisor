
<div class="st-content">
    <div class="st-content-inner">
        <div class="container">
            <div class="timeline row" data-toggle="isotope">
                <div class="col-xs-12 col-md-6 item" >
                    <div class="timeline-block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-body">
                                        <a >Lista zahteva za unapredjivanje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="view-all-comments">
                                <span>
                                    <?php if(count ($unapredjivanje) ==1)
                                        echo '1 unapredjenje';
                                    else
                                        echo count ($unapredjivanje).' unapedjenja'; ?>
                                </span>
                            </div>
                            <ul class="comments">
                                <?php foreach ($unapredjivanje as $kom): ?>
                                    <li class="media" id="unapredjivanje<?php echo $kom['idClan']?>">
                                        <div class="media-left">
                                            <a
                                                onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')">
                                                <?php
                                                $img =base_url().'img/clan_default.png';
                                                if ($kom['slika']=='d') {
                                                    $img =base_url().'/img/clan/clan'.$kom['idClan'].'.jpg';
                                                }?>
                                                <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="pull-right dropdown" >
                                                <a  onclick="brisanje_unapredjivanja('<?php echo $kom['idClan']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="prihvatanje_unapredjivanja('<?php echo $kom['idClan']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Prihvati">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>


                                            <a onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')"
                                               class="comment-author pull-left"><?php echo $kom['ime']?> <?php echo $kom['prezime']?></a>
                                            <br/>
                                            <div class="comment-text"><?php echo $kom['opis']?></div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 item" >
                    <div class="timeline-block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-body">
                                        <a >Lista zahteva za derangiranje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="view-all-comments">
                            <span>
                                <?php if(count ($derangiranje) ==1)
                                    echo '1 derangiranje';
                                else
                                    echo count ($derangiranje).' derangiranja'; ?>
                            </span>
                            </div>
                            <ul class="comments">
                                <?php foreach ($derangiranje as $kom): ?>
                                    <li class="media" id="derangiranje<?php echo $kom['idClan']?>">
                                        <div class="media-left">
                                            <a
                                                onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')">
                                                <?php
                                                $img =base_url().'img/clan_default.png';
                                                if ($kom['slika']=='d') {
                                                    $img =base_url().'/img/clan/clan'.$kom['idClan'].'.jpg';
                                                }?>
                                                <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="pull-right dropdown" >
                                                <a  onclick="brisanje_derangiranja('<?php echo $kom['idClan']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                            <div class="pull-right dropdown" >
                                                <a  onclick="prihvatanje_derangiranja('<?php echo $kom['idClan']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Prihvati">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>


                                            <a onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $kom['idClan']?>', '<?php echo $kom['ime']?> <?php echo $kom['prezime']?>')"
                                               class="comment-author pull-left"><?php echo $kom['ime']?> <?php echo $kom['prezime']?></a>
                                            <br/>
                                            <div class="comment-text"><?php echo $kom['opis']?></div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function prihvatanje_derangiranja(idClan)
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/prihvati_UD',
            data: {idClan: idClan },
            success: function (returnData) {
                $('#derangiranje'+idClan).remove();
            }
        });
    }
    function brisanje_derangiranja(idClan)
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/brisi_UD',
            data: {idClan: idClan },
            success: function (returnData) {
                $('#derangiranje'+idClan).remove();
            }
        });
    }
    function prihvatanje_unapredjivanja(idClan)
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/prihvati_UD',
            data: {idClan: idClan },
            success: function (returnData) {
                $('#unapredjivanje'+idClan).remove();
            }
        });
    }
    function brisanje_unapredjivanja(idClan)
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/brisi_UD',
            data: {idClan: idClan },
            success: function (returnData) {
                $('#unapredjivanje'+idClan).remove();
            }
        });
    }
    brisanje_unapredjivanja
</script>