<div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">

    <form method="post" class="col-xs-10 col-md-6 item row" align="left"  style="margin-left: 0px" class="navbar-form margin-none navbar-left row">

        <div class="select2 col-xs-2 col-md-3" style="display: inline-block" >
            <select class="form-control" name="selectIndex" id="selectIndex" style="margin-top: 8px">
                <option value="kursevi" selected> Kursevi</option>
                <option value="clanovi">Članovi</option>
                <option value="predavaci">Predavači</option>
            </select>
        </div>

        <div class="search-1 col-md-8 col-xs-8 "style="display: inline-block" style="padding: 0px">
            <!--  <span class="input-group-addon"><i class="icon-search"></i></span> -->
            <input type="text"  name="selectText"  id="selectText"class="form-control" onkeypress="if (event.keyCode==13) {event.preventDefault(); search_guest() ;}">
        </div>

        <div class="col-xs-2 col-md-1 " style="margin-top: 8px " >
            <a  href="javascript:void(0);" type="submit" value="pretraga" class="btn btn-white" size="15px" height="10px"
                style="display: inline-block" onclick="search_guest()">
                <i class="fa fa-fw fa-search"> </i>
            </a>
        </div>
    </form>

    <form class="col-xs-2 col-md-6 item" align="right"  style="margin-left: 0px" class="navbar-form margin-none navbar-right row">

        <div class="containerdiv hidden-sm hidden-xs visible-md-block visible-lg-block">
            <div class="search-1" style="display: inline-block">
                <input type="text" class="form-control" placeholder="Korisnicko ime" size="15px">
            </div>
            <div class="search-1"style="display: inline-block" >
                <input type="password" class="form-control" placeholder="Sifra" size="10px" >
            </div>
            <a href="Clan_MojProfil_Profil.html " data-toggle="modal" data-target="#myModal3" class="btn btn-white" size="15px" style="display: inline-block">Uloguj se <i class="fa fa-fw fa-sign-in"></i></a>
        </div>

        <div class="containerdiv hidden-md hidden-lg visible-xs-block visible-sm-block"  style="margin-top: 8px">
            <a href="Gost_Login.html " data-toggle="modal" data-target="#myModal3" class="btn btn-white" size="15px" height="10px" style="display: inline-block"><i class="fa fa-fw fa-sign-in"></i></a>
        </div>

    </form>
</div>

<script >
    function search_guest()
    {
        var selectText = document.getElementById("selectText").value;
        var sel = document.getElementById("selectIndex").value;
        document['title']=sel;
        if(sel=='clanovi') {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('guest/get_pretraga_clan')?>/' + selectText,
                success: function (returnData) {
                    $('#nesto').html(returnData);
                }
            });
        }
        else if(sel=='kursevi') {
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('guest/get_pretraga_kurs')?>/' + selectText,
                success: function (returnData) {
                    $('#nesto').html(returnData);
                }
            });
        }
        else if(sel=='predavaci') {
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url('guest/get_pretraga_predavac')?>/' + selectText,
            success: function (returnData) {
                $('#nesto').html(returnData);
            }
        });
    }
    }

</script>




<div id="nesto">