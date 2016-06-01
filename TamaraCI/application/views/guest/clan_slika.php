<div class="st-content-inner" id="gost_clan_opis">
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
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>">
                </div>
                <div class="name">
                    <h2><font color="#105DC1"><?php echo $naslov ?></font></h2>
                </div>
                <ul class="cover-nav">
                    <li >
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('guest/get_clan_profil')?>/<?php echo $clan['idClan']?>','<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('guest/get_clan_opis')?>/<?php echo $clan['idClan']?>','<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="tabbable">
            <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                <li class="">
                    <a href="javascript:void(0);"
                       onclick="getSummary('<?php echo site_url('guest/get_clan_opis')?>/<?php echo $clan['idClan']?>')" data-toggle="tab">
                        <i class="fa fa-fw fa-folder"></i> O korisniku</a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);"
                       onclick="getSummary('<?php echo site_url('guest/get_clan_slika')?>/<?php echo $clan['idClan']?>')" data-toggle="tab">
                        <i class="fa fa-fw fa-picture-o"></i> Slika</a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="slika">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>" height="200" width="200">
                </div>

                <div class="tab-pane fade " id="oKorisniku">

                </div>
            </div>
        </div>
 
    </div>

</div>

