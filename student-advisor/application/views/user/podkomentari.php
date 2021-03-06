<div class="modal-dialog">
    <div class="modal-content">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ocene i komentar predmeta</h4>
                    <h4>
                        <a onclick="getSummaryPodKom('<?php echo site_url('user/get_kurs_profil')?>/<?php echo $komentarKurs['idKurs']?>')" >
                            <span style="color: black; "><?php echo $komentarKurs['ime']?></span>
                        </a>
                    </h4>
                    <ul class="comments">
                        <li class="media">
                            <div class="media-left">
                                <?php if($komentar['anonimno']=='0' or $tip=='o' or $komentarClan['idClan']==$myID):?>
                                    <?php $img =base_url().'img/clan_default.png';
                                    if ($komentarClan['slika']=='d') { $img =base_url().'/img/clan/clan'.$komentarClan['idClan'].'.jpg?dummy='."<?php echo random_int(0,10000)?>";} ?>
                                    <a onclick="getSummaryPodKom('<?php echo site_url('user/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                       data-toggle="tooltip" title="" >
                                        <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                    </a>
                                <?php else:?>
                                    <img src="<?php echo base_url()?>/img/unknown.jpg" height="60" width="60" class="media-object">
                                <?php endif ?>
                            </div>
                            <div class="media-body">
                                <?php if($komentar['anonimno']=='0' or $tip=='o' or $komentarClan['idClan']==$myID):?>
                                    <a onclick="getSummaryPodKom('<?php echo site_url('user/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>
                                    </a>
                                <?php else:?>
                                    <a class="comment-author pull-left">Anonimno</a>
                                <?php endif ?>
                                <?php if($postoji=='d' and ($komentar['anonimno']=='0' or $tip=='k') and $komentar['tekst']){?>
                                    <div class="pull-right dropdown" >
                                        <a class="toggle-button"
                                           onclick="setUnlikeee('<?php echo $komentar['idKom']?>', '<?php echo $komentar['idClan']?>')">
                                            <i class="fa fa-minus <?php echo ($komentar['tip']=='n')? 'active' : 'unactive';?>"
                                               id="nepodrzavanjeee<?php echo $komentar['idKom']?>"> <?php echo $komentar['brNepodrzavanja']?> </i>
                                        </a>

                                    </div>
                                    <div class="pull-right dropdown" >
                                        <a class="toggle-button"
                                           onclick="setLikeee('<?php echo $komentar['idKom']?>', '<?php echo $komentar['idClan']?>')">
                                            <i class="fa fa-plus <?php echo ($komentar['tip']=='p')? 'active' : 'unactive'?>"
                                               id="podrzavanjeee<?php echo $komentar['idKom']?>"> <?php echo $komentar['brPodrzavanja']?> </i>
                                        </a>
                                    </div>
                                    </br>
                                    <div class="comment-text">
                                        <?php echo $komentar['tekst']?>
                                    </div>
                                    <br/>
                                    <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                        echo DateTime::createFromFormat('Y-m-d',date($komentar['datum']))->format('d.m.Y.');?></div>
                                <?php }?>
                                </br>
                                <?php if($komentar['anonimno']=='0' or $tip=='o'):?>
                                    <div class="comment-text">
                                        <?php if (($komentarOcena['ocena'])) echo 'Polozio sa ocenom: ' . $komentarOcena['ocena']?>
                                    </div>
                                    <div class="comment-date">
                                        <?php if (($komentarOcena['zanimljivost'])) echo 'zanimljivost: ' . $komentarOcena['zanimljivost']?>
                                        <?php if (($komentarOcena['korisnost'])) echo 'korisnost: ' . $komentarOcena['korisnost']?>
                                        <?php if (($komentarOcena['tezina'])) echo 'tezina: ' . $komentarOcena['tezina']?>
                                        <?php if (($komentarOcena['preporuka'])) echo 'preporuka: ' . $komentarOcena['preporuka']?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php if($postoji=='d'and ($komentar['anonimno']=='0' or $tip=='k') ){?>
                    <div class="modal-body">

                        <ul class="comments">
                            <?php foreach ($podkomentar as $podkom): ?>
                                <li class="media" id="podkomentar<?php echo $podkom['redniBroj']?>">
                                    <div class="media-left">
                                        <?php
                                        $img =base_url().'img/clan_default.png';
                                        if ($podkom['slika']=='d') { $img =base_url().'/img/clan/clan'.$podkom['idClan'].'.jpg?dummy='."<?php echo random_int(0,10000)?>";}
                                        ?>

                                        <a onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')">

                                            <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <?php if($podkom['idClan']==$myID){ ?>
                                            <div class="pull-right dropdown" >

                                                <a  onclick="brisanje_podkomentara('<?php echo $podkom['redniBroj']?>','<?php echo $podkom['idKom']?>')"
                                                    data-toggle="dropdown" class="toggle-button" data-tooltip="tooltip" title="Obriši">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <a onclick="getSummaryPodKom('<?php echo site_url('user/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')"
                                           class="comment-author pull-left">
                                            <?php echo $podkom['ime']?> <?php echo $podkom['prezime']?></a>
                                        <br/>
                                        <div class="comment-text"><?php echo $podkom['tekst']?></div>
                                        <br/>
                                        <div class="comment-date"><?php   date_default_timezone_set("Europe/Belgrade");
                                            echo DateTime::createFromFormat('Y-m-d',date($podkom['datum']))->format('d.m.Y.');?></div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                <?php }?>
                <?php if($komentar['anonimno']=='0' or $tip=='k' ){?>
                    <div class="modal-footer" style="border: 0px">

                        <div class="panel panel-default share">
                            <div class="input-group">
                                <textarea class="form-control share-text"  placeholder="Napisi komentar..." style="height: 90px"
                                    id="text_podkometar"></textarea>
                                <div class="input-group-btn"  >
                                    <a class="btn btn-white" style="height: 90px; vertical-align: center; padding-top:30px"
                                       onclick="dodaj_podkomentar('<?php echo $komentar['idKom']?>')">
                                        <i class="fa fa-send" ></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>



<script>

    function getSummaryPodKom(id, naslov)
    {
        $('#podkomentari').html("");
        document['title']=naslov;

        $.ajax({
            type: 'GET',
            url: id,
            success: function(returnData ) {
                $('#nesto').html( returnData );
            }
        });

        $('#podkomentari').modal("hide");
    }



    function dodaj_podkomentar(idKom)
    {
        var comment = document.getElementById("text_podkometar").value;
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('user/dodaj_podkomentar')?>',
            async: false,
            data: {
                comment: comment,
                idKom:idKom
            },
            success: function (returnData) {
                $('#podkomentari').html(returnData);
            }
        });

    }

</script>