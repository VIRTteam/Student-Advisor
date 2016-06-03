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
                                <a href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('udser/get_kurs_profil')?>/<?php echo $cl['idkurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php
                                    $img =base_url().'img/kurs_default.jpg';
                                    if ($cl['slika']=='d') {
                                        $img =base_url().'/img/kurs/kurs'.$cl['idkurs'].'.jpg';
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left" href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $cl['idkurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php echo $cl['ime']?>
                                </a>
                                <!--<?php //if ($cl['idkurs'] in $kursevi) {?>
                                <div class="pull-right dropdown" data-show-hover="li" >
                                    <a  data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši" href=""
                                        onclick="getSummary('<?php echo site_url('user/del_kurs_polozen')?>/<?php echo $cl['idkurs']?>', '<?php echo $mi['ime']?> <?php echo $mi['prezime']?>')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <?php// }?> -->
                                <div class="pull-right dropdown" >
                                    <a href=""  class="toggle-button" data-tooltip="tooltip" title="Dodaj kurs u listu položenih kurseva"
                                       data-toggle="modal" data-target="#myModal10" onclick="getSummary('<?php echo site_url('user/get_modal_10')?>/<?php echo $cl['idkurs']?>', '<?php echo $mi['ime']?> <?php echo $mi['prezime']?>')">
                                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
    
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/unos_ocene') ?>

