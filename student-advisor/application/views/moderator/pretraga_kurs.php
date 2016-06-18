<!--ne poze vise puta ispit u listu polozenih, tp treba srediti, edit -->
<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media" style="height: 45px">
                        <div class="media-body">
                            <h5>Pretraga kurseva</h5>
                        </div>
                        <div class="media-right">
                            <a class="btn btn-white" data-tooltip="tooltip" title="Dodaj novi kurs"
                               style="margin-top: 6px; margin-right: 7px" onclick="kreiraj_kurs()">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="view-all-comments">
                            <span>
                                <?php if (count($kurs) == 1)
                                    echo '1 kurs';
                                else if (count($kurs) < 5 and count($kurs) > 1)
                                    echo count($kurs) . ' kursa';
                                else
                                    echo count($kurs) . ' kurseva'; ?>
                            </span>
                </div>
                <ul class="comments">
                    <?php foreach ($kurs as $cl): ?>
                        <li class="media" id="pretraga<?php echo $cl['idKurs']?>" >
                            <div class="media-left">
                                <a onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil') ?>/<?php echo $cl['idKurs'] ?>', '<?php echo $cl['ime'] ?>')">
                                    <?php
                                    $img = base_url() . 'img/kurs_default.jpg';
                                    if ($cl['slika'] == 'd') {
                                        $img = base_url() . '/img/kurs/kurs' . $cl['idKurs'] . '.jpg?'."<?php echo random_int(0,10000)?>";
                                    } ?>
                                    <img src="<?php echo $img ?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left"
                                   onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil') ?>/<?php echo $cl['idKurs'] ?>', '<?php echo $cl['ime'] ?>')">
                                    <?php echo $cl['ime'] ?>
                                </a>
                                <div class="pull-right dropdown">
                                    <a onclick="brisanje_Kurs('<?php echo $cl['idKurs']?>')"
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button"
                                        data-tooltip="tooltip" title="Obrisi kurs">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown">
                                    <a
                                        data-toggle="modal" class="toggle-button"
                                        data-tooltip="tooltip" title="Izmeni kurs"
										 onclick="izmeni_kurs(<?php echo $cl['idKurs'] ?>)">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown" >
                                    <a
                                        data-toggle="modal"  class="toggle-button" data-tooltip="tooltip" title="Dodaj predavace za kurs"
                                        onclick="dohvati_kurs_predaje(<?php echo $cl['idKurs'] ?>)">
                                        <i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <?php if ($cl['idClan']==NULL):?>
                                    <div class="pull-right dropdown" id="pretraga_kurs_dodaj<?php echo $cl['idKurs']?>">
                                        <a  class="toggle-button" data-tooltip="tooltip" title="Dodaj kurs u listu položenih kurseva" onclick="dodaj_kurs(<?php echo $cl['idKurs'] ?>)">
                                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php endif;?>
                            </div>

                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function kreiraj_kurs() {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_novi_kurs',
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }

    function izmeni_kurs(idKurs) {
        $.ajax(
            {
                type: 'POST',
                async: false,
                url: '<?php echo site_url()?>/moderator/dohvati_edit_kurs/'+idKurs,
                data: { tip:0},
                success: function (returnData) {
                    $('#toggle_modal').html(returnData);
                }
            }
        );
        $('#toggle_modal').modal('show');
    }
	
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

    function dohvati_kurs_predaje(idKurs) {
        var idKurs=idKurs;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_predaje_na_kurs',
            data: {
                idKurs:idKurs
            },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }
</script>
