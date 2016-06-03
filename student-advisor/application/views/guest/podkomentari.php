
<div class="modal-dialog">
    <div class="modal-content">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Komentar predmeta
                        <a onclick="getSummaryPodKom('<?php echo site_url('guest/get_kurs_profil')?>/<?php echo $komentarKurs['idKurs']?>', '<?php echo $komentarClan['ime']?>')" >
                            <span style="color: black; "><?php echo $komentarKurs['ime']?></span>
                        </a>
                    </h4>
                    <ul class="comments">
                        <li class="media">
                            <div class="media-left">
                                <?php
                                $img =base_url().'img/clan_default.png';
                                if ($komentarClan['slika']=='d') { $img =base_url().'/img/clan/clan'.$komentarClan['idClan'].'.jpg';}
                                ?>

                                <a onclick="getSummaryPodKom('<?php echo site_url('geust/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                   data-toggle="tooltip" title="" >
                                    <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                </a>
                            </div>
                            <div class="media-body">
                                <?php if ($komentarClan['tekst']) {?>
                                    <div class="pull-right dropdown" >
                                        <a class="toggle-button"
                                           onclick="setUnlike('<?php echo $komentarClan['idKom']?>', '<?php echo $komentarClan['idClan']?>')">
                                            <i class="fa fa-minus disabled"
                                               id="nepodrzavanje<?php echo $komentarClan['idKom']?>"> <?php echo $komentarClan['brNepodrzavanja']?> </i>
                                        </a>

                                    </div>
                                    <div class="pull-right dropdown" >
                                        <a class="toggle-button"
                                           onclick="setLike('<?php echo $komentarClan['idKom']?>', '<?php echo $komentarClan['idClan']?>')">
                                            <i class="fa fa-plus disabled"
                                               id="podrzavanje<?php echo $komentarClan['idKom']?>"> <?php echo $komentarClan['brPodrzavanja']?> </i>
                                        </a>
                                    </div>

                                    <a onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>
                                    </a>
                                    <br/>
                                    <div class="comment-text">
                                        <?php echo $komentarClan['tekst']?>
                                    </div>
                                <?php }?>
                                <br/>
                                <div class="comment-date"><?php echo $komentarClan['datum']?></div>
                                <div class="comment-text">
                                    <?php if (($komentarOcena['ocena'])) echo 'Polozio sa ocenom: ' . $komentarOcena['ocena']?>
                                </div>
                                <div class="comment-date">
                                    <?php if (($komentarOcena['zanimljivost'])) echo 'zanimljivost: ' . $komentarOcena['zanimljivost']?>
                                    <?php if (($komentarOcena['korisnost'])) echo 'korisnost: ' . $komentarOcena['korisnost']?>
                                    <?php if (($komentarOcena['tezina'])) echo 'tezina: ' . $komentarOcena['tezina']?>
                                    <?php if (($komentarOcena['preporuka'])) echo 'preporuka: ' . $komentarOcena['preporuka']?>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <ul class="comments">
                        <?php foreach ($podkomentar as $podkom): ?>
                            <li class="media">
                                <div class="media-left">
                                    <?php
                                    $img =base_url().'img/clan_default.png';
                                    if ($podkom['slika']=='d') { $img =base_url().'/img/clan/clan'.$podkom['idClan'].'.jpg';}
                                    ?>
                                    <a onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')">

                                        <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $podkom['ime']?> <?php echo $podkom['prezime']?></a>
                                    <br/>
                                    <div class="comment-text"><?php echo $podkom['tekst']?></div>
                                    <br/>
                                    <div class="comment-date"><?php echo $podkom['datum']?></div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>

        function getSummaryPodKom(id, naslov)
        {
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
    </script>