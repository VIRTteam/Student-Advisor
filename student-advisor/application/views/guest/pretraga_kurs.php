<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h4>Pretraga kurseva</h4>
                        </div>
                    </div>
                </div>
                <div class="view-all-comments">
                            <span>
                                <?php if(count ($kurs)==1)
                                    echo '1 kurs';
                                else if(count($kurs)<5 and count($kurs)>1)
                                    echo count($kurs).' kursa';
                                else
                                    echo count ($kurs).' kurseva'; ?>
                            </span>
                </div>
                <ul class="comments"  >
                    <?php foreach ($kurs as $cl):?>
                        <li class="media" >
                            <div class="media-left">
                                <a onclick="getSummary('<?php echo site_url('guest/get_kurs_profil')?>/<?php echo $cl['idkurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php
                                    $img =base_url().'img/kurs_default.jpg';
                                    if ($cl['slika']=='d') {
                                        $img =base_url().'/img/kurs/kurs'.$cl['idkurs'].'.jpg';
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left" 
                                   onclick="getSummary('<?php echo site_url('guest/get_kurs_profil')?>/<?php echo $cl['idkurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php echo $cl['ime']?>
                                </a>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
