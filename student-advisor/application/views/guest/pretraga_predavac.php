<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h4>Pretraga predavaca</h4>
                        </div>
                    </div>
                </div>
                <div class="view-all-comments">
                            <span>
                                <?php if(count ($predavac)==1)
                                    echo '1 predavac';
                                else
                                    echo count($predavac).' predavaca';?>
                            </span>
                </div>
                <ul class="comments"  >
                    <?php foreach ($predavac as $pr):?>
                        <li class="media" >
                            <div class="media-left">
                                <a onclick="getSummary('<?php echo site_url('guest/get_predavac_profil')?>/<?php echo $pr['idPred']?>', '<?php echo $pr['ime']?> <?php echo $pr['prezime']?>')">
                                    <?php
                                    $img =base_url().'img/predavac_default.jpg';
                                    if ($pr['slika']=='d') {
                                        $img =base_url().'/img/predavac/predavac'.$pr['idPred'].'.jpg';
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left" 
                                   onclick="getSummary('<?php echo site_url('guest/get_predavac_profil')?>/<?php echo $pr['idPred']?>', '<?php echo $pr['ime']?> <?php echo $pr['prezime']?>')">
                                    <?php echo $pr['ime']?> <?php echo $pr['prezime']?>
                                </a>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
