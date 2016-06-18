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
                        $img =base_url().'/img/kurs/kurs'.$kurs['idKurs'].'.jpg?dummy='.'<?php echo random_int(0,10000)?>';
                    }?>
                    <img src="<?php echo $img?>">
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
                    <li >
                        <a  class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_opis')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_komentarisi')?>/<?php echo $kurs['idKurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Komentariši
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="timeline row" data-toggle="isotope" >

            <div class="col-xs-12 col-md-4 item" >
                <div class="timeline-block">
                    <div class="panel panel-default relative">
                        <ul class="icon-list icon-list-block">
                            <li>Zanimljivost
                                <div class="rating ">
                                    <?php for($i = $polozio['zanimljivost']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','1')" id="star<?php echo $j?>-1"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','1')" id="star<?php echo $j?>-1"></span>
                                    <?php endfor;?>
                                </div>
                            </li>

                            <li>Korisnost
                                <div class="rating ">
                                    <?php for($i = $polozio['korisnost']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','2')" id="star<?php echo $j?>-2"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','2')" id="star<?php echo $j?>-2"></span>
                                    <?php endfor;?>
                                </div>

                            </li>

                            <li>Tezina
                                <div class="rating ">
                                    <?php for($i = $polozio['tezina']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','3')" id="star<?php echo $j?>-3"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar('<?php echo $polozio['idKurs']?>','<?php echo $j ?>','3')" id="star<?php echo $j?>-3"></span>
                                    <?php endfor;?>
                                </div>
                            </li>

                            <li>Preporuka
                                <div class="rating ">
                                    <?php for($i = $polozio['preporuka']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar(<?php echo $polozio['idKurs']?>,<?php echo $j ?>,'4')" id="star<?php echo $j?>-4"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar(<?php echo $polozio['idKurs']?>,<?php echo $j ?>,'4')" id="star<?php echo $j?>-4"></span>
                                    <?php endfor;?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-md-8 item">
                <div class="timeline-block">
                    <div class="panel panel-default share clearfix-xs">
                        <div class="panel-heading panel-heading-gray title">
                            <div class="media-left">
                                <a href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                                    <?php
                                    $img =base_url().'img/clan_default.png';
                                    if ($clan['slika']=='d') {
                                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg?dummy='.'<?php echo random_int(0,10000)?>';
                                    }?>
                                    <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right dropdown"  >
                                    <input type="checkbox" name="Anonimno" id="Anonimni"
                                        <?php if($vec_je_komentarisao!=NULL) if ($vec_je_komentarisao['anonimno']=='1') echo 'checked'?>>
                                    <span title="Anonimni rezim" ><i class="fa fa-user-secret"> </i></span>
                                    </input>
                                </div>
                                <p id="ostavi_izmeni"><?php if($vec_je_komentarisao==NULL): ?>Ostavi<?php else:?>Izmeni<?php endif?> svoj komentar</p>
                            </div>
                        </div>
                        <textarea name="comment" id="comment" class="form-control share-text" rows="5" placeholder="Share your status..."><?php
                            if($vec_je_komentarisao!=NULL): echo $vec_je_komentarisao['tekst']; endif?></textarea>
                    </div>
                    <div class="panel-footer share-buttons">
                        <a class="btn btn-white">
                            <span title="Postavi komentar">
                                <i class="fa fa-send" onclick="putSummary('<?php echo site_url('moderator/put_komentar');?>/<?php echo $kurs['idKurs']?>')"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/container-->
</div>



<script>

    function setStar(id,kol,rb)
    {
        for(var i=1;i<=5;i++){
            if(i<=kol)
                document.getElementById('star'+i+'-'+rb).className="star filled";
            else
                document.getElementById('star'+i+'-'+rb).className="star";
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('user_toggle/set_star')?>',
            async: false,
            data: {
                id:id ,
                kol:kol,
                rb:rb
            },
            success: function (returnData) {
            }
        });
    }
</script>

<script>

    function putSummary(id)
    {
        var comment;
        comment = document.getElementById("comment").value;
        var anon;
        anon = document.getElementById("Anonimni").checked;

        $.ajax({
            type: 'POST',
            url: id,
            async: false,
            data: {
                comment: comment ,
                anonim: anon
            },
            success: function (returnData) {
            }
        });
        $('#ostavi_izmeni').html("Izmeni svoj komentar");

    }
</script>