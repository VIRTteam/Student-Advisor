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
                    <img src="./img/unknown.jpg" alt="people">
                </div>
                <div class="name">
                    <h2><font color="#105DC1">Objektno Orjentisano Programiranje 1</font></h2>
                </div>
                <ul class="cover-nav">
                    <li>
                        <a href="javascript:void(0);"
                           class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_profil')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_opis')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a  href="javascript:void(0);"
                            class="movie" onclick="getSummary('<?php echo site_url('moderator/get_kurs_komentarisi')?>/<?php echo $kurs['idkurs']?>', '<?php echo $kurs['ime']?>')">
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
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star "></span>
                                    <span class="star"></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                </div>
                            </li>

                            <li>Korisnost
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                </div>
                         
                            </li>

                            <li>Tezina
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                </div>
                            </li>

                            <li>Preporuka
                                <div class="rating" align="right">
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star"></span>
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
                                <a href="Clan_Clan_Profil">
                                    <img src="./img/guy-5(1).jpg" class="media-object">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right dropdown"  >
                                    <input type="checkbox" name="Anonimno" value="false">
                                    <span title="Anonimni rezim"><i class="fa fa-moderator-secret"> </i></span>
                                    </input>
                                </div>
                                <p>Ostavi svoj komentar</p>
                            </div>
                        </div>
                        <textarea name="status" class="form-control share-text" rows="5" placeholder="Share your status..."></textarea>
                    </div>
                    <div class="panel-footer share-buttons">
                        <a href="" class="btn btn-white"><span title="Postavi komentar"><i class="fa fa-send"></i></span></a>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/container-->
</div>
</div><!-- /st-content-inner -->
