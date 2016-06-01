<div class="st-content-inner" style="height: 530px">
    <div class="lock-container" style="height: 470px">
        <h1>Ulogujte Se</h1>
        <div class="panel panel-default text-center" >
            <img src="<?php echo base_url()?>/img/clan_default.png" class="img-circle">
            <div class="panel-body">
                <input class="form-control" type="text" placeholder="Korisničko Ime" id="username">
                <input class="form-control" type="password" placeholder="Šifra" id="password">
                <a onclick="logovanje()" class="btn btn-white">Ulogujte se! <i class="fa fa-fw fa-sign-in"></i></a>
                <a onclick="getSummary('<?php echo site_url('guest/povratak_sifre')?>', 'Povratak sifre')" class="forgot-password">Zaboravili ste šifru?</a>
                <a onclick="getSummary('<?php echo site_url('guest/registracija')?>', 'Registracija')"
                class="forgot-password">Registruj se</a>
            </div>
        </div>
    </div>
</div>


<script >
    function logovanje()
    {
        var username= document.getElementById("username").value;
        var password=document.getElementById("password").value;
        if(username=="" || password=="") {
            $('#greska_text').html("Nisu uneti svi podaci!");
            $('#Greska').modal('show');
            return;
        }
        var vr=$.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/guest/provera_username_password',
            data:{username:username, password:password},
            success: function (returnData) {
            }
        }).responseText;
        if(vr=='ne_postoji') {
            $('#greska_text').html("Uneli ste pogresno korisnicko ime ili sifru!");
            $('#Greska').modal('show');
            return;
        }
        var tip=$.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/guest/logovanje_obrada',
            data:{username:username, password:password},
            success: function (returnData) {
                
            }
        }).responseText;
        if(tip=='c')
            var href = '<?php echo site_url()?>/user/get_mojprofil_profil_start';
        else
            var href = '<?php echo site_url()?>/moderator/get_mojprofil_profil_start';
        window.location = href;
    }
</script>