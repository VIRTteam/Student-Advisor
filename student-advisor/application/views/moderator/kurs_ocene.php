<div class="modal-dialog">
    <div class="modal-content">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ocene predmeta</h4>
                    <h4>
                        <a onclick="getSummaryPodKom('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $kurs['idKurs']?>')" >
                            <span style="color: black; "><?php echo $kurs['ime']?></span>
                        </a>
                    </h4>
                </div>
                <div class="modal-body">
                    <ul class="comments">
                        <?php foreach ($ocenio as $oc): ?>
                            <li class="media">
                                <div class="media-left">
                                    <?php $img =base_url().'img/clan_default.png';
                                    if ($oc['slika']=='d') { $img =base_url().'/img/clan/clan'.$oc['idClan'].'.jpg?dummy='.'<?php echo random_int(0,10000)?>';} ?>
                                    <a onclick="getSummaryOcene('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $oc['idClan']?>', '<?php echo $oc['ime']?> <?php echo $oc['prezime']?>')"
                                       data-toggle="tooltip" title="" >
                                        <img src="<?php echo $img?>" height="60" width="60" class="media-object">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a onclick="getSummaryOcene('<?php echo site_url('moderator/get_clan_profil')?>/<?php echo $oc['idClan']?>', '<?php echo $oc['ime']?> <?php echo $oc['prezime']?>')"
                                       class="comment-author pull-left">
                                        <?php echo $oc['ime']?> <?php echo $oc['prezime']?>
                                    </a>
                                    </br>
                                    <div class="comment-text">
                                        <?php if (($oc['ocena'])) echo 'Polozio sa ocenom: ' . $oc['ocena']?>
                                    </div>
                                    <div class="comment-date">
                                        <?php if (($oc['zanimljivost'])) echo 'zanimljivost: ' . $oc['zanimljivost']?>
                                        <?php if (($oc['korisnost'])) echo 'korisnost: ' . $oc['korisnost']?>
                                        <?php if (($oc['tezina'])) echo 'tezina: ' . $oc['tezina']?>
                                        <?php if (($oc['preporuka'])) echo 'preporuka: ' . $oc['preporuka']?>
                                    </div>
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
    function getSummaryOcene(id, naslov)
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
</script>