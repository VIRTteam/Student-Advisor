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
<<<<<<< HEAD
                            <a class="btn btn-white" data-tooltip="tooltip" title="Dodaj novi kurs"
                               onclick="kreiraj_kurs()">
=======
                            <a  class="btn btn-white" data-tooltip="tooltip" title="Dodaj novog predavaca"
                                style="margin-top: 6px; margin-right: 7px">
>>>>>>> origin/master
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
                        <li class="media">
                            <div class="media-left">
                                <a href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil') ?>/<?php echo $cl['idkurs'] ?>', '<?php echo $cl['ime'] ?>')">
                                    <?php
                                    $img = base_url() . 'img/kurs_default.jpg';
                                    if ($cl['slika'] == 'd') {
                                        $img = base_url() . '/img/kurs/kurs' . $cl['idkurs'] . '.jpg';
                                    } ?>
                                    <img src="<?php echo $img ?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left" href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil') ?>/<?php echo $cl['idkurs'] ?>', '<?php echo $cl['ime'] ?>')">
                                    <?php echo $cl['ime'] ?>
                                </a>
<<<<<<< HEAD
                                <div class="pull-right dropdown">
                                    <a href="" class="toggle-button" data-tooltip="tooltip"
                                       title="Dodaj kurs u listu položenih kurseva">
=======
                                <div class="pull-right dropdown" >
                                    <a href=""  class="toggle-button" data-tooltip="tooltip" title="Dodaj kurs u listu položenih kurseva">
>>>>>>> origin/master
                                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown">
                                    <a
<<<<<<< HEAD
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button"
                                        data-tooltip="tooltip" title="Obrisi kurs">
=======
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button" data-tooltip="tooltip" title="Obrisi kurs">
>>>>>>> origin/master
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown">
                                    <a
<<<<<<< HEAD
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button"
                                        data-tooltip="tooltip" title="Izmeni kurs">
=======
                                        data-toggle="modal" data-target="#myModal4" class="toggle-button" data-tooltip="tooltip" title="Izmeni kurs">
>>>>>>> origin/master
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
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
</script>
