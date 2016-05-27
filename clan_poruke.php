<div class="st-content-inner">
    <div class="container">
        <div class="cover profile">
            <div class="wrapper">
                <div class="image hidden-xs ">
                    <table><td width="600" height="60"/></table>
                </div>
            </div>
            <div class="cover-info">
                <div class="avatar">
                    <img src="<?php echo base_url(); ?>/img/woman-4.jpg" alt="people">
                </div>
                <div class="name"><h2><font color="#105DC1"><?php echo $naslov?></font></h2></div>
                <ul class="cover-nav">
                    <li >

                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_profil')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-user"></i> Profil
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_opis')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-info-circle"></i> Opis
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $clan['idClan']?>', '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            <i class="fa fa-fw fa-envelope"></i> Kontaktiraj
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    <div class="container">

        <div class="media messages-container media-clearfix-xs-min media-grid">
            <div class="media-left">
                <div class="messages-list">
                    <div class="panel panel-default" tabindex="1" style="overflow: hidden; outline: none;">
                        <ul class="list-group">
                            <li class="list-group-item active">

                                <div class="media">
                                    <div class="media-left">
                                        <img src="./img/woman-5.jpg" width="50" height="50" alt="" class="media-object">
                                    </div>
                                    <div class="media-body">
                                        <span class="date">Today</span>
                                        <span class="user">Mary D.</span>
                                        <div class="message">Are we ok to meet...</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/guy-3.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Adrian T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/woman-4.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">5 days</span>
                                            <span class="user">Michelle A.</span>
                                            <div class="message">Nice design.</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/woman-3.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Sue T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/guy-9.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Adrian T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/woman-9.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Adrian T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/guy-6.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Adrian T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://themekit-v4.themekit.io/dist/themes/social-3/user-private-messages.html#">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="./img/guy-2.jpg" width="50" height="50" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="date">Sat</span>
                                            <span class="user">Adrian T.</span>
                                            <div class="message">Looking forward to...</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="media-body">

                <!--/KRECE UNOS SEND+txtArea-->
                <div class="panel panel-default share">

                    <!-- /input-group -->
                </div>
                <!--/KRAJ UNOS SEND+txtArea-->
                <div class="media">
                    <div class="media-left">
                        <a>
                            <img src="./img/woman-5.jpg" width="60" alt="woman" class="media-object">
                        </a>
                    </div>
                    <div class="media-body message">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-white">
                                <div class="pull-right">
                                    <small class="text-muted">2 min ago</small>
                                </div>
                                <a>Mary D.</a>
                            </div>
                            <div class="panel-body">
                                Hi Bill,
                                <br> Is it ok if we schedule the meeting tomorrow?
                            </div>
                        </div>
                    </div>
                </div>

                <div class="media">
                    <div class="media-left">
                        <img src="./img/guy-5.jpg" width="60" alt="" class="media-object">
                    </div>
                    <div class="media-body message">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-white">
                                <div class="pull-right">
                                    <small class="text-muted">10 min ago</small>
                                </div>
                                <a href="Clan_MojProfil_Profil.html">Me</a>
                            </div>
                            <div class="panel-body">
                                Are we still on for Today?
                            </div>
                        </div>
                    </div>
                </div>

                <div class="media">
                    <div class="media-left">
                        <img src="./img/woman-5.jpg" width="60" alt="" class="media-object">
                    </div>
                    <div class="media-body message">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-white">
                                <div class="pull-right">
                                    <small class="text-muted">1 day ago</small>
                                </div>
                                <a href="Clan_Clan_Profil">Mary D.</a>
                            </div>
                            <div class="panel-body">
                                Cool. It's settled. Tomorrow will discuss the project.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <div class="media-right">
                        <img src="./img/guy-5.jpg" width="60" alt="" class="media-object">
                    </div>
                    <div class="media-body message">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-white">
                                <div class="pull-right">
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <a href="Clan_MojProfil_Profil.html">Me</a>
                            </div>
                            <div class="panel-body">
                                I suggest a meeting on Tuesday. What do you think?
                            </div>
                        </div>
                    </div>

                </div>
                <!--Ovde kopirati Unos+6txtArea za ispod   br/-->
                <div class="input-group">
                    <div class="input-group-btn">
                        <a class="btn btn-white" href="">
                            <i class="fa fa-envelope"></i> Send
                        </a>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" class="form-control share-text" placeholder="Write message...">
                </div>
            </div>
        </div>

    </div>
</div>
