<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h5>Pretraga kurseva</h5>
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
                                <a onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $cl['idKurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php
                                    $img =base_url().'img/kurs_default.jpg';
                                    if ($cl['slika']=='d') {
                                        $img =base_url().'/img/kurs/kurs'.$cl['idKurs'].'.jpg?'."<?php echo random_int(0,10000)?>";
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left"
                                   onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $cl['idKurs']?>', '<?php echo $cl['ime']?>')">
                                    <?php echo $cl['ime']?>
                                </a>
                                <?php if ($cl['idClan']==NULL):?>
                                    <div class="pull-right dropdown" id="pretraga_kurs_dodaj<?php echo $cl['idKurs']?>">
                                        <a  class="toggle-button" data-tooltip="tooltip" title="Dodaj kurs u listu položenih kurseva" onclick="dodaj_kurs(<?php echo $cl['idKurs'] ?>)">
                                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php endif;?>
                            </div>
    
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function dodaj_kurs(idKurs)
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user/dohvati_unos_ocene',
            data: {idKurs: idKurs },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });
        $('#toggle_modal').modal('show');

    }
</script>