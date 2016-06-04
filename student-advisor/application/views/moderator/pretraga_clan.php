<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h5>Pretraga clanova</h5>
                        </div>
                    </div>
                </div>
                <div class="view-all-comments">
                            <span>
                                <?php if(count ($clan)==1)
                                    echo '1 clan';
                                else if(count($clan)<5 and count($clan)>1)
                                    echo count($clan).' clana';
                                else
                                    echo count ($clan).' clanova'; ?>
                                </span>
                </div>
                <ul class="comments"  >
                    <?php foreach ($clan as $cl):?>
                    <li class="media" >
                        <div class="media-left">
                            <a onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                <?php
                                $img =base_url().'img/clan_default.png';
                                if ($cl['slika']=='d') {
                                    $img =base_url().'/img/clan/clan'.$cl['idClan'].'.jpg';
                                }?>
                                <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                            </a>
                        </div>
                        
                        <div class="media-body">
                            <a class="comment-author pull-left" 
                               onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                <?php echo $cl['ime']?> <?php echo $cl['prezime']?>
                            </a>
                            <div class="pull-right dropdown" >
                                <a href"" class="toggle-button" data-tooltip="tooltip" title="Kontaktiraj">
                                    <i class="fa fa-comment fa-lg" aria-hidden="true"></i>
                                </a>
                            </div>
                            <?php if ($cl['tip'] =='c' or $cl['tip']=='m') {?>

                                <div class="pull-right dropdown" >
                                    <a onclick="banuj('<?php echo $cl['idClan']?>')"
                                         class="toggle-button" data-tooltip="tooltip" title="Banuj">
                                        <i class="fa fa-ban fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ($cl['tip'] =='m') {?>

                                <div class="pull-right dropdown" >
                                    <a derangiraj('<?php echo $cl['idClan']?>')"
                                    data-toggle="modal" data-target="#myModal4" class="toggle-button" data-tooltip="tooltip" title="Derangiraj">
                                    <i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ($cl['tip'] =='c' or $cl['tip']=='m') {?>
                                <div class="pull-right dropdown" >
                                    <a onclick="unapredi('<?php echo $cl['idClan']?>')"
                                        class="toggle-button" data-tooltip="tooltip" title="Unapredi">
                                        <i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>

                            <?php } ?>

                        </div>

            </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
