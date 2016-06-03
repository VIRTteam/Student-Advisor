<div class="st-content-inner">
    <div class="container">
        <div class="timeline-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-body">
                            <h4>Pretraga clanova</h4>
                        </div>
                    </div>
                </div>
                <div class="view-all-comments">
                            <span>
                                <?php if(count ($clan)==1)
                                    echo '1 clan';
                                else if(count($clan)<5 and count($clan)>1)
                                    echo count($clan).' clana';
                                else
                                    echo count ($clan).' clanova'; ?>
                                </span>
                </div>
                <ul class="comments"  >
                    <?php foreach ($clan as $cl):?>
<<<<<<< Updated upstream
                        <li class="media" >
                            <div class="media-left">
                                <a href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                    <?php
                                    $img =base_url().'img/clan_default.png';
                                    if ($cl['slika']=='d') {
                                        $img =base_url().'/img/clan/clan'.$cl['idClan'].'.jpg';
                                    }?>
                                    <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                                </a>
                            </div>

                            <div class="media-body">
                                <a class="comment-author pull-left" href="javascript:void(0);"
                                   onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                    <?php echo $cl['ime']?> <?php echo $cl['prezime']?>
=======
                    <li class="media" >
                        <div class="media-left">
                            <a href="javascript:void(0);"
                               onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                <?php
                                $img =base_url().'img/clan_default.png';
                                if ($cl['slika']=='d') {
                                    $img =base_url().'/img/clan/clan'.$cl['idClan'].'.jpg';
                                }?>
                                <img src="<?php echo $img?>" class="media-object" width="60" height="60"/>
                            </a>
                        </div>
                        
                        <div class="media-body">
                            <a class="comment-author pull-left" href="javascript:void(0);"
                               onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')">
                                <?php echo $cl['ime']?> <?php echo $cl['prezime']?>
                            </a>
              


                            <div class="pull-right dropdown" >
                                <a href="javascript:void(0);"
                                      onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $cl['idClan']?>', '<?php echo $cl['ime']?> <?php echo $cl['prezime']?>')"
                                    class="toggle-button" data-tooltip="tooltip" title="Posalji poruku">
                                    <i class="fa fa-comment fa-lg" aria-hidden="true"></i>
>>>>>>> Stashed changes
                                </a>
                                <div class="pull-right dropdown" >
                                    <a href="Clan_Clan_Poruke.html"  class="toggle-button" data-tooltip="tooltip" title="Pošalji poruku">
                                        <i class="fa fa-comment fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div onclick="banuj('<?php echo $cl['idClan']?>')"  class="pull-right dropdown" >
                                    <a href=""  class="toggle-button" data-toggle="modal" data-target="#myModal3" data-tooltip="tooltip" title="Banuj korisnika">
                                        <i class="fa fa-ban fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown">
                                    <a onclick="unapredi('<?php echo $cl['idClan']?>')"  class="toggle-button" data-toggle="modal" data-target="#myModal1" data-tooltip="tooltip" title="Unapredi korisnika">
                                        <i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="pull-right dropdown" >
                                    <a onclick="derangiraj('<?php echo $cl['idClan']?>')"   class="toggle-button" data-toggle="modal" data-target="#myModal2" data-tooltip="tooltip" title="Derangiraj korisnika">
                                        <i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
<<<<<<< Updated upstream

                        </li>
=======
                        </div>
                        
                    </li>
>>>>>>> Stashed changes
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php  $this->load->view('templates/toggle'); ?>
