<!-- fali na plusic sta se desava i edit-->


<div class="st-content-inner">
    <div class="container">

        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs">
                    <table><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <?php
                    $img =base_url().'img/kurs_default.jpg';
                    if ($kurs['slika']=='d') {
                        $img =base_url().'/img/kurs/kurs'.$kurs['idKurs'].'.jpg?'."<?php echo rand(0, 1000)?>";
                    }?>
                    <img src="<?php echo $img?>" id="slika_kurs">
                </div>
                <div class="name">
                    <h2><font color="#105DC1"><?php echo $kurs['ime']?></font></h2>
                </div>
                <ul class="cover-nav">
                    <li>
                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_opis')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <?php if($sme_da_komentarise=='d'):?>
                        <li>
                            <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_komentarisi')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                                <i class="fa fa-fw fa-envelope"></i> Komentariši
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope" >

            <div class="col-xs-12 col-md-4 item">
                <div class="timeline-block">
                    <div class="panel panel-default relative">
                        <ul class="icon-list icon-list-block">
                            <li>Zanimljivost
                                <div class="media" align="right" ><?php printf("%.02lf\n", $kurs['zanimljivost'])?></div>
                            </li>
                            <li>Korisnost
                                <div class="media" align="right" ><?php printf("%.02lf\n", $kurs['korisnost'])?></div>
                            </li>
                            <li>Tezina
                                <div class="media" align="right" ><?php printf("%.02lf\n", $kurs['tezina'])?></div>
                            </li>
                            <li>Preporuka
                                <div class="media" align="right" ><?php printf("%.02lf\n", $kurs['preporuka'])?></div>
                            </li>
                        </ul>
                        <div class="panel-body panel-boxed text-center">
                            <div class="rating">
                                <div class="rating ">
                                    <?php for($i = $kurs['prosecnaOcena']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star disabled" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled disabled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php $t=0;?>
                            <?php foreach ($ocenio as $po): ?>

                                <?php
                                $img =base_url().'img/clan_default.png';
                                if ($po['slika']=='d') { $img =base_url().'/img/clan/clan'.$po['idClan'].'.jpg';}
                                ?>
                                <a  data-toggle="modal"
                                   data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('moderator/get_podkomentar_bez_komentara')?>/<?php echo $po['idKurs']?>/<?php echo $po['idClan']?>')">
                                    <img class="img-circle" src="<?php echo $img?>" width="50" height="50">
                                </a>


                                <?php $t=$t+1; if ($t>=5) {$t=-1; break;}?>

                            <?php endforeach ?>
                            <?php if (sizeof($ocenio)>5): ?>
                                <a  class="user-count-circle"> +<?php echo sizeof($ocenio)-5 ?></a>
                            <?php endif;?>
                        </div>
                    
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-md-8 item">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-gray">
                        <button onclick="izmeni_kurs('<?php echo $kurs['idKurs']?>')" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></button>

                        <i class="fa fa-fw fa-info-circle"></i> O kursu
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled profile-about margin-none">
                            <?php foreach ($predavac as $p): ?>
                                <li class="padding-v-5">
                                    <div class="row">
                                        <div class="col-sm-4"><span class="text-muted"><?php echo ucfirst($p['zvanje'])?></span></div>
                                        <div class="col-sm-8">
                                            <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_profil')?>/<?php echo $p['idPred']?>', '<?php echo $p['ime']?> <?php echo $p['prezime']?>')">
                                                <?php echo $p['ime']?> <?php echo $p['prezime']?>
                                            </a>



                                        </div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                            <li class="padding-v-5">
                                <div class="row">
                                    <div class="col-sm-4"><span class="text-muted">Opis</span></div>
                                    <div class="col-sm-8"><?php echo $kurs['opis']?></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-gray">
                        <button class="btn btn-white btn-xs pull-right" onclick="obrisi_sliku(<?php echo $kurs['idKurs']?>);">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button class="btn btn-white btn-xs pull-right" style="margin-right: 10px" onclick="document.getElementById('upload').click();">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <input type='file' id="upload" name="upload" onChange="izmeni_sliku(this, <?php echo $kurs['idKurs']?>);" style="display:none"/>
                        <i class="fa fa-fw fa-picture-o"></i> Slika
                    </div>
                    <div class="panel-body">
                        <?php
                        $img =base_url().'img/kurs_default.jpg';
                        if ($kurs['slika']=='d') {
                            $img =base_url().'/img/kurs/kurs'.$kurs['idKurs'].'.jpg?'."<?php echo rand(0, 1000)?>";
                        }?>
                        <img id="slika_kurs2" src="<?php echo $img?>" height="200" width="200">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function obrisi_sliku(idKurs)
    {
        $.ajax({
            type: 'POST',
            url:'<?php echo site_url()?>/moderator/brisanje_slike_kurs',
            async: false,
            data: {idKurs:idKurs},
            success: function (returnData) {
                $('#slika_kurs').attr('src', '<?php echo base_url()?>/img/kurs_default.jpg');
                $('#slika_kurs2').attr('src', '<?php echo base_url()?>/img/kurs_default.jpg');

            }
        });
    }

    function izmeni_sliku(input, id){
        var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
            var file_data = input.files[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url()?>/moderator/izmena_slike_kurs/'+id,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (returnData) {
                    $('#slika_kurs').attr('src', '<?php echo base_url()?>/img/kurs/kurs'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                    $('#slika_kurs2').attr('src', '<?php echo base_url()?>/img/kurs/kurs'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                }
            });


        }
    }

    function izmeni_kurs(idKurs) {
        $.ajax(
            {
                type: 'POST',
                async: false,
                url: '<?php echo site_url()?>/moderator/dohvati_edit_kurs/'+idKurs,
                data: { tip:1},
                success: function (returnData) {
                    $('#toggle_modal').html(returnData);
                }
            }
        );
        $('#toggle_modal').modal('show');
    }

</script>