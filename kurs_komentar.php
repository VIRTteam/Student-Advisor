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
                    <h2><span style="color: #105DC1; "><?php echo $kurs?></span></h2>
                </div>
                <ul class="cover-nav">
                    <li>
                        <a href="Clan_Kurs_Profil.html">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li  >
                        <a href="Clan_Kurs_Opis.html">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a href="Clan_Kurs_Komentar.html">
                            <i class="fa fa-fw fa-envelope"></i> Komentariši
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="timeline row" data-toggle="isotope" style="position: relative; height: 2774.86px;">

            <div class="col-xs-12 col-md-4 item" style="position: absolute; left: 477px; top: 0px;">
                <div class="timeline-block">
                    <div class="panel panel-default relative">
                        <ul class="icon-list icon-list-block">
                            <li>Zanimljivost
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                </div>
                            </li>

                            <li>Korisnost
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                </div>
                            </li>

                            <li>Tezina
                                <div class="rating"align="right">
                                    <span class="star"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                </div>
                            </li>

                            <li>Preporuka
                                <div class="rating" align="right">
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                    <span class="star filled"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-8 item" style="position: absolute; left: 0px; top: 182px;">
                <div class="timeline-block">
                    <div class="panel panel-default share clearfix-xs">
                        <div class="panel-heading panel-heading-gray title">
                            <div class="media-left">
                                <a href="Clan_Clan_Profil">
                                    <img src="<?php echo base_url(); ?>./img/guy-5(1).jpg" class="media-object">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right dropdown"  >
                                    <input type="checkbox" name="Anonimno" value="false">
                                    <span title="Anonimni rezim"><i class="fa fa-user-secret"> </i></span>
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
</div><!-- /st-content-inner -->
