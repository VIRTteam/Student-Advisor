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
                        $img =base_url().'/img/kurs/kurs'.$kurs['idkurs'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name">
                    <h2><font color="#105DC1">Objektno Orjentisano Programiranje 1</font></h2>
                </div>
                <ul class="cover-nav">
                    <li>
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_opis')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('user/get_kurs_komentarisi')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
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
                                    <?php for($i = $kurs['zanimljivost']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                </div>
                            </li>

                            <li>Korisnost
                                <div class="rating ">
                                    <?php for($i = $kurs['korisnost']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                </div>

                            </li>

                            <li>Tezina
                                <div class="rating ">
                                    <?php for($i = $kurs['tezina']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                </div>
                            </li>

                            <li>Preporuka
                                <div class="rating ">
                                    <?php for($i = $kurs['preporuka']+0.5, $j=5; $i <5; $i++, $j--):?>
                                        <span class="star" onclick="setStar(<?php echo $j?>)" id="star<?php echo $j?>"></span>
                                    <?php endfor;?>
                                    <?php for(; $j >=1; $j--):?>
                                        <span class="star filled" onclick="setStar(<?php echo $j ?>)" id="star<?php echo $j?>"></span>
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
                                   onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                                    <?php
                                    $img =base_url().'img/clan_default.png';
                                    if ($clan['slika']=='d') {
                                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';
                                    }?>
                                    <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right dropdown"  >
                                    <input type="checkbox" name="Anonimno" id="Anonimni" value="false">
                                    <span title="Anonimni rezim" ><i class="fa fa-user-secret"> </i></span>
                                    </input>
                                </div>
                                <p>Ostavi svoj komentar</p>
                            </div>
                        </div>
                        <textarea name="comment" id="comment" class="form-control share-text" rows="5" placeholder="Share your status..."></textarea>
                    </div>
                    <div class="panel-footer share-buttons">
                        <a href="" class="btn btn-white"><span title="Postavi komentar">
                                <i class="fa fa-send" onclick="putSummary('<?php echo site_url('user/put_komentar');?>/<?php echo $kurs['idkurs']?>')"></i>

                                <!-- <i class="fa fa-send" onclick="putSummary('<?php// echo site_url('user/put_komentar');?>/<?php //echo $kurs['idkurs']?>?comment=<?php //echo $comment?>?anonim=true')"</i> -->
                            </span></a>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/container-->
</div><!-- /st-content-inner -->

<script>

    function setStar(id)
    {
        for(var i=1;i<=5;i++){
            if(i<=id)
                document.getElementById('star'+i).className="star filled";
            else
                document.getElementById('star'+i).className="star";
        }
    }
<<<<<<< Updated upstream
</script>
=======
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
                document.open();
                document.write( returnData);
                document.close();
            }
        });

    }
</script>
>>>>>>> Stashed changes
