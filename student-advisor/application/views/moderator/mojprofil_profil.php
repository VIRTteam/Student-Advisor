
<div class="st-content-inner">
    <div class="container">
        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs ">
                    <table><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?'."<?php echo rand(0, 1000)?>";
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li class="active">
                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_mojprofil_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_mojprofil_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope">

            <div class="col-xs-12 col-md-4 item" >
                <div class="timeline-block">
                    <div class="panel panel-default profile-card clearfix-xs">
                        <div class="panel-body">
                            <div class="profile-card-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <h4 class="text-center">Student</h4>
                            <ul class="icon-list icon-list-block">
                                <li><i class="fa fa-map-marker"></i> Elektrotehnički fakultet, Beograd</li>
                                <li><i class="fa fa-trophy"></i> <?php echo $clan['godinaUpisa']?> godine upisao</li>
                                <li><i class="fa fa-calendar"></i> Prosek: <?php echo $clan['prosecnaOcena']?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Položeni kursevi</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            <?php if(count ($polozio) ==1)
                                echo '1 polozeni ispit';
                            else if(count ($polozio) ==0)
                                echo '0 polozenih ispita';
                            else
                                echo count ($polozio).' polozena ispita'; ?>
                        </div>
                        <ul class="comments">
                            <?php foreach ($polozio as $predmet): ?>
                                <li class="media" id="predmet<?php echo $predmet['idKurs']?>-<?php echo $predmet['idClan']?>">
                                    <div class="media-left"
                                         onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')">
                                        <?php
                                        $img =base_url().'img/kurs_default.jpg';
                                        if ($predmet['slika']=='d') {
                                            $img =base_url().'/img/kurs/kurs'.$predmet['idKurs'].'.jpg';
                                        }?>
                                        <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                    </div>
                                    <div class="media-body">
                                        <div class="pull-right dropdown" >
                                            <a  onclick="brisanje_polozenog_ispita('<?php echo $predmet['idKurs']?>','<?php echo $clan['idClan']?>')"
                                                data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <a onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $predmet['idKurs']?>', '<?php echo $predmet['ime']?>')"
                                           class="comment-author pull-left">
                                            <?php echo $predmet['ime'] ?></a>
                                        <br/>
                                        <div class="comment-date">Ocena: <?php echo $predmet['ocena'] ?></div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                            <li class="comment-form">
                                <div class="input-group">
                      <span title="Dodaj kurs" class="input-group-btn">
                        <a  class="btn btn-white" onclick="search_cours()"><i class="fa fa-plus"></i></a>
                      </span>
                                    <input type="text" class="form-control">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-8 item">
                <div class="timeline-block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-body">
                                    <a >Komentari člana</a>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-comments">
                            <span>
                                <?php if(count ($komentar) ==1)
                                    echo '1 komentar';
                                else
                                    echo count ($komentar).' komentara'; ?>
                            </span>
                        </div>
                        <ul class="comments">
                            <?php foreach ($komentar as $kom): ?>
                                <li class="media" id="komentar<?php echo $kom['idKom']?>">
                                    <div class="media-left">
                                        <a
                                            onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')">
                                            <?php
                                            $img =base_url().'img/kurs_default.jpg';
                                            if ($kom['slika']=='d') {
                                                $img =base_url().'/img/kurs/kurs'.$kom['idKurs'].'.jpg';
                                            }?>
                                            <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="pull-right dropdown" >
                                            <a  onclick="brisanje_komentara('<?php echo $kom['idKom']?>')"
                                                data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a  onclick="izmeni_komentar('<?php echo $kom['idKom']?>')"
                                                data-toggle="dropdown" class="toggle-button">
                                                <i class="fa fa-pencil" data-tooltip="tooltip" title="Uredi"></i>
                                            </a>
                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setUnlike('<?php echo $kom['idKom']?>', '<?php echo $kom['idClan']?>')">
                                                <i class="fa fa-minus <?php echo ($kom['tip']=='n')? 'active' : 'unactive';?>"
                                                   id="nepodrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brNepodrzavanja']?> </i>
                                            </a>

                                        </div>
                                        <div class="pull-right dropdown" >
                                            <a class="toggle-button"
                                               onclick="setLike('<?php echo $kom['idKom']?>', '<?php echo $kom['idClan']?>')">
                                                <i class="fa fa-plus <?php echo ($kom['tip']=='p')? 'active' : 'unactive'?>" id="podrzavanje<?php echo $kom['idKom']?>"> <?php echo $kom['brPodrzavanja']?> </i>
                                            </a>
                                        </div>


                                        <a onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $kom['idKurs']?>', '<?php echo $kom['ime']?>')"
                                           class="comment-author pull-left"><?php echo $kom['ime']?></a>
                                        <br/>
                                        <div class="comment-text" id="tekstkomentara<?php echo $kom['idKom']?>"><?php echo $kom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($kom['datum']))->format('d.m.Y.');?></div>

                                    </div>
                                    <div class="view-all-comments">
                                        <a  data-toggle="modal" data-target="#podkomentari" onclick="getPodkomentari('<?php echo site_url('moderator/get_podkomentar')?>/<?php echo $kom['idKom']?>')">
                                            <i class="fa fa-comments-o"></i> Prikaži sve
                                        </a>
                                        <span><?php if($kom['brPodkomentara'] ==1)
                                                echo '1 podkomentar';
                                            else
                                                echo  $kom['brPodkomentara'].' podkomentara'; ?></span>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--/container-->
</div><!-- /st-content-inner -->

<script>

    function readURL(input){
        var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
            /*      var reader = new FileReader();
             reader.onload = function (e) {
             // $('#img').attr('src', e.target.result);
             }

             reader.readAsDataURL(input.files[0]);*/

            var file_data = input.files[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            alert(form_data);
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url()?>/moderator/izmena_slike',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (returnData) {
                    alert(returnData);
                }
            });
        }else{
            $('#img').attr('src', '/assets/no_preview.png');
        }
    }

</script>











































