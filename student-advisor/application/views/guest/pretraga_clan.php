<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h4>Pretraga clanova</h4>
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
                            <a onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
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
                               onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                <?php echo $cl['ime']?> <?php echo $cl['prezime']?>
                            </a>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
