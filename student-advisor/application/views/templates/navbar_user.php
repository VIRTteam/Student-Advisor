<div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
    <form class="col-xs-10 col-md-6 item row" align="left"  style="margin-left: 0px" class="navbar-form margin-none navbar-left row">

        <div class="select2 col-xs-2 col-md-3" style="display: inline-block" >
            <select class="form-control" style="margin-top: 8px"  name="selectIndex" id="selectIndex">
                <option value="kursevi" selected>Kursevi</option>
                <option value="clanovi">Članovi</option>
                <option value="predavaci">Predavači</option>
            </select>
        </div>

        <div class="search-1 col-md-8 col-xs-8 "style="display: inline-block" style="padding: 0px">
            <!--  <span class="input-group-addon"><i class="icon-search"></i></span> -->
            <input type="text"  name="selectText"  id="selectText"class="form-control" onkeypress="if (event.keyCode==13) {event.preventDefault(); search_user() ;}">
        </div>
        <div class="col-xs-2 col-md-1 " style="margin-top: 8px " >
            <a  href="javascript:void(0);" type="submit" value="pretraga" class="btn btn-white" size="15px" height="10px"
                style="display: inline-block" onclick="search_user()">
                <i class="fa fa-fw fa-search"> </i>
            </a>
        </div>

    </form>

    <form class="col-xs-2 col-md-6 item" align="right"  style="margin-left: 0px" class="navbar-form margin-none navbar-right row">

        <ul align="right" class="nav navbar-nav  navbar-right ">
            <li class="dropdown" >
                <a class="dropdown-toggle user" data-toggle="dropdown">
                    <?php
                    $img =base_url().'img/clan_default.png';
                    if ($clan['slika']=='d') {
                        $img =base_url().'/img/clan/clan'.$clan['idClan'].'.jpg';
                    }?>
                    <img src="<?php echo $img?>" class="img-circle" style="width:40px; height:35px; margin-top: 3px;" /img>
                    <span class="hidden-sm hidden-xs"><?php echo $clan['ime']?> </span>
                    <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
<<<<<<< Updated upstream
                        <a onclick="getSummary('<?php echo site_url('user/get_mojprofil_profil')?>/<?php echo $clan['idClan']?>',  '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
=======
                        <a href="javascript:void(0);"
                           onclick="getSummary('<?php echo site_url('user/get_mojprofil_profil')?>/<?php echo $clan['idClan']?>',  '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
>>>>>>> Stashed changes
                            Profil
                        </a>
                    </li>
                    <li class="active">
                        <a  class="movie" onclick="getSummary('<?php echo site_url('user/get_clan_poruke')?>/<?php echo $clan['idClan']?>',  '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
                            Poruke
                        </a>
                    </li>
                    <li>
<<<<<<< Updated upstream
                        <a onclick="getSummary('<?php echo site_url('user/get_mojprofil_opis')?>/<?php echo $clan['idClan']?>',  '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
=======
                        <a href="javascript:void(0);"
                           onclick="getSummary('<?php echo site_url('user/get_mojprofil_opis')?>/<?php echo $clan['idClan']?>',  '<?php echo $clan['ime']?> <?php echo $clan['prezime']?>')">
>>>>>>> Stashed changes
                            Izmeni profil
                        </a>
                    </li>
                    <li><a href="" data-toggle="modal" data-target="#myModal15">Pomoć</a></li>
                    <li><a href="<?php echo site_url('guest/registracija')?>">Izloguj se</a></li>
                </ul>
            </li>
        </ul>
    </form>
</div>


<script >
    function search_user()
    {
        var bool = "<?php echo isset($_SESSION['username']) ?>";
        if(bool=="1") {
            var rez = $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url()?>/user/proveri_banovanje',
                data: {},
                success: function (returnData) {
                }
            }).responseText;
            if (rez != "NAN") {
                $('#greska_textB').html(rez);
                $('#Banovanje').modal('show');
                return;
            }
        }
        var selectText = document.getElementById("selectText").value;
        var sel = document.getElementById("selectIndex").value;
        document['title']=sel;
        if(sel=='clanovi') {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('user/get_pretraga_clan')?>/' + selectText,
                success: function (returnData) {
                    $('#nesto').html(returnData);
                }
            });
        }
        else if(sel=='kursevi') {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('user/get_pretraga_kurs')?>/' + selectText,
                success: function (returnData) {
                    $('#nesto').html(returnData);
                }
            });
        }
        else if(sel=='predavaci') {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('user/get_pretraga_predavac')?>/' + selectText,
                success: function (returnData) {
                    $('#nesto').html(returnData);
                }
            });
        }
    }

</script>

<div class="modal fade <?php if ($clan['tip']=='c') if(strcmp($banovanje,"NAN")) echo "in"?>"
     id="BanovanjeLogin" role="dialog"  style="position: fixed;left: 50%; transform: translate(-50%, 35%);">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Banovani ste. Razlog:</h4>
            </div>
            <div class="modal-body"><h5 id="greska_textB"><?php echo $banovanje?> </h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" href="<?php echo site_url()?>/guest/registracija">Uredu</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Banovanje" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Banovani ste. Razlog:</h4>
            </div>
            <div class="modal-body"><h5 id="greska_textB"> </h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" href="<?php echo site_url()?>/guest/registracija">Uredu</a>
            </div>
        </div>
    </div>
</div>

<div id="nesto">