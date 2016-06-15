<!-- slanje maila, dodavanje kursa na kojima predaje-->

<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media" style="height: 45px">
                        <div class="media-body">
                            <h5>Pretraga predavaca</h5>
                        </div>
                        <div class="media-right">
                            <a class="btn btn-white" data-tooltip="tooltip" title="Dodaj novog predavaca"
                               style="margin-top: 6px; margin-right: 7px" onclick="kreiraj_predavaca()">
                                <i class="fa fa-plus"></i>
                            </a>
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
                        <li class="media" id="pretraga<?php echo $pr['idPred']?>" >
                            <div class="media-left">
                                <a
                                   onclick="getSummary('<?php echo site_url('moderator/get_predavac_profil')?>/<?php echo $pr['idPred']?>', '<?php echo $pr['ime']?> <?php echo $pr['prezime']?>')">
                                    <?php
                                    $img =base_url().'img/predavac_default.jpg';
                                    if ($pr['slika']=='d') {
                                        $img =base_url().'/img/predavac/predavac'.$pr['idPred'].'.jpg?'."<?php echo rand(0, 1000)?>";
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left"
                                   onclick="getSummary('<?php echo site_url('moderator/get_predavac_profil')?>/<?php echo $pr['idPred']?>', '<?php echo $pr['ime']?> <?php echo $pr['prezime']?>')">
                                    <?php echo $pr['ime']?> <?php echo $pr['prezime']?>
                                </a>
                                <div class="pull-right dropdown" >
                                    <a onclick="slanje_maila('<?php echo $pr['idPred']?>')"
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button" data-tooltip="tooltip" title="Kontaktiraj">
                                        <i class="fa fa-comment fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown" >
                                    <a onclick="brisanje_Predavac('<?php echo $pr['idPred']?>')"
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button" data-tooltip="tooltip" title="Obrisi predavaca">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown" >
                                    <a
                                        data-toggle="modal" class="toggle-button" data-tooltip="tooltip" title="Izmeni predavaca"
										onclick="izmeni_predavaca('<?php echo $pr['idPred'] ?>')">
								
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown" >

                                    <a
                                        data-toggle="modal"  class="toggle-button" data-tooltip="tooltip" title="Dodaj kurseve na kojima predaje"
                                                onclick="dohvati_predaje(<?php echo $pr['idPred'] ?>)">
                                        <i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i>
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

<script>
    function kreiraj_predavaca() {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_novi_predavac',
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }

	 function izmeni_predavaca(idPre) {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_edit_predavac',
            data: {
                idPred: idPre, tip:0
            },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }
	
    function dohvati_predaje(idPre) {
        var idPred=idPre;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_predaje_na',
            data: {
                idPred:idPred
            },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }
</script>
