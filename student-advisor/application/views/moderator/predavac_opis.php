<!-- edit i slika-->
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
                    $img =base_url().'img/predavac_default.jpg';
                    if ($predavac['slika']=='d') {
                        $img =base_url().'/img/predavac/predavac'.$predavac['idPred'].'.jpg?'."<?php echo random_int(0,10000)?>";
                    }?>
                    <img src="<?php echo $img?>" id="slika_predavac">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li >
                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_profil')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_predavac_opis')?>/<?php echo $predavac['idPred']?>', '<?php echo $predavac['ime']?> <?php echo $predavac['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li>
                        <a  class="movie"  onclick="slanje_maila('<?php echo $predavac['idPred']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading panel-heading-gray">
                <button onclick="izmeni_predavaca('<?php echo $predavac['idPred'] ?>')" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                <i class="fa fa-fw fa-info-circle"></i> O Predavacu
            </div>
            <div class="panel-body">
                <ul class="list-unstyled profile-about margin-none">
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Ime</span></div>
                            <div class="col-sm-8"><?php echo $predavac['ime']?> </div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Prezime</span></div>
                            <div class="col-sm-8"><?php echo $predavac['prezime']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Zvanje</span></div>
                            <div class="col-sm-8"><?php echo $predavac['zvanje']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">E-mail</span></div>
                            <div class="col-sm-8"><?php echo $predavac['email']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Katedra</span></div>
                            <div class="col-sm-8"><?php echo $predavac['katedra']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Godina Zaposljenja</span></div>
                            <div class="col-sm-8"><?php echo $predavac['godinaZaposlenja']?></div>
                        </div>
                    </li>
                    <li class="padding-v-5">
                        <div class="row">
                            <div class="col-sm-4"><span class="text-muted">O predavacu</span></div>
                            <div class="col-sm-8"><?php echo $predavac['opis']?></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-gray">
                <button class="btn btn-white btn-xs pull-right" onclick="obrisi_sliku(<?php echo $predavac['idPred']?>);">
                    <i class="fa fa-trash"></i>
                </button>
                <button class="btn btn-white btn-xs pull-right" style="margin-right: 10px" onclick="document.getElementById('upload').click();">
                    <i class="fa fa-pencil"></i>
                </button>
                <input type='file' id="upload" name="upload" onChange="izmeni_sliku(this, <?php echo $predavac['idPred']?>);" style="display:none"/>
                <i class="fa fa-fw fa-picture-o"></i> Slika
            </div>
            <div class="panel-body">
                <?php
                $img =base_url().'/img/predavac_default.jpg';
                if ($predavac['slika']=='d') {
                    $img =base_url().'/img/predavac/predavac'.$predavac['idPred'].'.jpg?'."<?php echo random_int(0,10000)?>";
                }?>
                <img id="slika_predavac2" src="<?php echo $img?>" height="200" width="200">
            </div>
        </div>
    </div>
</div>

<script>
    function izmeni_predavaca(idPre) {
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/dohvati_edit_predavac',
            data: {
                idPred: idPre, tip:1
            },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');

    }
    function obrisi_sliku(idPred)
    {
        $.ajax({
            type: 'POST',
            url:'<?php echo site_url()?>/moderator/brisanje_slike_predavac',
            async: false,
            data: {idPred:idPred},
            success: function (returnData) {
                $('#slika_predavac').attr('src', '<?php echo base_url()?>/img/predavac_default.jpg');
                $('#slika_predavac2').attr('src', '<?php echo base_url()?>/img/predavac_default.jpg');

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
                url: '<?php echo site_url()?>/moderator/izmena_slike_predavac/'+id,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (returnData) {
                    $('#slika_predavac').attr('src', '<?php echo base_url()?>/img/predavac/predavac'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                    $('#slika_predavac2').attr('src', '<?php echo base_url()?>/img/predavac/predavac'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                }
            });


        }
    }
</script>