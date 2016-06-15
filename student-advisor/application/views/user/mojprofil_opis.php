<!--edit clana i dodavanje slike-->

<div class="st-content-inner">

    <div class="container">
        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs">
                    <table ><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?'."<?php echo rand(0, 1000)?>";
                    }?>
                    <img id="slika_clan1" src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">


                    <li>
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('user/get_mojprofil_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('user/get_mojprofil_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tabbable">
            <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                <li  class="active">
                    <a href="#oKorisniku" data-toggle="tab">
                        <i class="fa fa-fw fa-folder"></i> O korisniku</a>
                </li>
                <li  class="">
                    <a href="#slika" data-toggle="tab">
                        <i class="fa fa-fw fa-picture-o"></i> Slika</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="slika">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?'."<?php echo rand(0, 1000)?>";
                    }?>
                    <img id="slika_clan2" src="<?php echo $img?>" height="200" width="200">
                    <button class="btn btn-white btn-xs pull-right" onclick="obrisi_sliku();">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="btn btn-white btn-xs pull-right" style="margin-right: 10px" onclick="document.getElementById('upload').click();">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <input type='file' id="upload" name="upload" onChange="izmeni_sliku(this, <?php echo $clan['idClan']?>);" style="display:none"/>

                </div>

                <div class="tab-pane fade active in" id="oKorisniku">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-gray">
                                <button onclick="izmeni_profil()" class="btn btn-white btn-xs pull-right" style="margin-left: 10px"><i class="fa fa-pencil"></i></button>
                                <button onclick="izmeni_sifru()" class="btn btn-white btn-xs pull-right">Izmeni sifru</i></button>
                                <i class="fa fa-fw fa-info-circle"></i> O meni
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled profile-about margin-none">
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Ime</span></div>
                                            <div class="col-sm-8"><?php echo $clan['ime']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Prezime</span></div>
                                            <div class="col-sm-8"><?php echo $clan['prezime']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">E-Mail</span></div>
                                            <div class="col-sm-8"><?php echo $clan['email']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Pol</span></div>
                                            <div class="col-sm-8">
                                                <?php
                                                if ($clan['pol'][0]=='z')
                                                    echo "ženski";
                                                else
                                                    echo "muški";
                                                ?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Datum rođenja</span></div>
                                            <div class="col-sm-8"><?php   date_default_timezone_set("Europe/Belgrade");
                                                echo DateTime::createFromFormat('Y-m-d',date($clan['datumRodjenja']))->format('d.m.Y.');?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Smer</span></div>
                                            <div class="col-sm-8"><?php echo $clan['smer']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Godina upisa</span></div>
                                            <div class="col-sm-8"><?php echo $clan['godinaUpisa']?></div>
                                        </div>
                                    </li>
                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Prosecna ocena</span></div>
                                            <div class="col-sm-8"><?php echo $clan['prosecnaOcena']?></div>
                                        </div>
                                    </li>

                                    <li class="padding-v-5">
                                        <div class="row">
                                            <div class="col-sm-4"><span class="text-muted">Opis</span></div>
                                            <div class="col-sm-8"><?php echo $clan['opis']?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function izmeni_profil()
    {
        $.ajax({
            type: 'POST',
            url:'<?php echo site_url()?>/user/dohvati_izmenu_profila',
            async: false,
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');
    }
    function izmeni_sifru()
    {
        $.ajax({
            type: 'POST',
            url:'<?php echo site_url()?>/user/dohvati_izmenu_sifre',
            async: false,
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });

        $('#toggle_modal').modal('show');
    }
    function obrisi_sliku()
    {
        $.ajax({
            type: 'POST',
            url:'<?php echo site_url()?>/user/brisanje_slike',
            async: false,
            success: function (returnData) {
                document.getElementById('slika_clan').src='<?php echo base_url()?>/img/clan_default.png';
                $('#slika_clan').attr('src', '<?php echo base_url()?>/img/clan_default.png');
                $('#slika_clan1').attr('src', '<?php echo base_url()?>/img/clan_default.png');
                $('#slika_clan2').attr('src', '<?php echo base_url()?>/img/clan_default.png');

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
                url: '<?php echo site_url()?>/user/izmena_slike',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (returnData) {
                    document.getElementById('slika_clan').src='<?php echo base_url()?>/img/clan/clan'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1));
                    $('#slika_clan1').attr('src', '<?php echo base_url()?>/img/clan/clan'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                    $('#slika_clan2').attr('src', '<?php echo base_url()?>/img/clan/clan'+id+'.jpg?'+(Math.floor((Math.random() * 1000) + 1)));
                }
            });


        }
    }
</script>