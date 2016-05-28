
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="timeline-block">
                <div class="panel panel-default">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Komentar predmeta
                            <a href="javascript:void(0);"
                                onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $komentarKurs['idKurs']?>', '<?php echo $komentarClan['ime']?>')" >
                                <font color="black"><?php echo $komentarKurs['ime']?></font>
                            </a>
                        :</h4>
                        <ul class="comments">
                            <li class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);"
                                       onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                       data-toggle="tooltip" title="" >
                                        <?php
                                        $img =base_url().'img/clan_default.png';
                                        if ($komentarClan['slika']=='d') {
                                            $img =base_url().'/img/clan/clan'.$komentarClan['idClan'].'.jpg';
                                        }?>
                                        <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="pull-right dropdown" >
                                        <a href=""  class="toggle-button disabled" data-tooltip="tooltip" title="Podržavam!">
                                            <i class="fa fa-minus"> <?php echo $komentarClan['brNepodrzavanja']?></i>
                                        </a>
                                    </div>
                                    <div class="pull-right dropdown" >
                                        <a href=""  class="toggle-button disabled" data-tooltip="tool tip" title="Ne podržavam!">
                                            <i class="fa fa-plus"> <?php echo $komentarClan['brPodrzavanja']?></i>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);"
                                       onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $komentarClan['idClan']?>', '<?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $komentarClan['ime']?> <?php echo $komentarClan['prezime']?>
                                    </a>
                                    <br/>
                                    <div class="comment-date"><?php echo $komentarClan['tekst']?>.</div>
                                    <br/>
                                    <div class="comment-date"><?php echo $komentarClan['datum']?></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <ul class="comments">
                            <?php foreach ($podkomentar as $podkom): ?>
                            <li class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);"
                                        onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')">

                                        <?php
                                        $img =base_url().'img/clan_default.png';
                                        if ($podkom['slika']=='d') {
                                            $img =base_url().'/img/clan/clan'.$podkom['idClan'].'.jpg';
                                        }?>
                                        <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="javascript:void(0);"
                                       onclick="getSummaryPodKom('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $podkom['idClan']?>', '<?php echo $podkom['ime']?> <?php echo $podkom['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $podkom['ime']?> <?php echo $podkom['prezime']?></a>
                                    <br/>
                                    <div class="comment-date"><?php echo $podkom['tekst']?></div>
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