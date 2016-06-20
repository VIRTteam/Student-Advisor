
<div class="st-content-inner" style="height: 530px">
    <div class="lock-container" style="height: 470px">
        <h1>Povratak šifre</h1>
        <div class="panel panel-default text-center" >
            <img src="<?php echo base_url()?>/img/clan_default.png" class="img-circle">
            <div class="panel-body">
                <input class="form-control" type="text" placeholder="Korisničko Ime" id="username">
                <input class="form-control" type="text" placeholder="E-mail" id="email">
                Šifra će vam biti poslata na e-mail
                <a onclick="povratak_sifre()" class="btn btn-white">Pošalji! <i class="fa fa-fw fa-sign-in"></i></a>
                <a onclick="getSummary('<?php echo site_url('guest/logovanje')?>', 'Logovanje')" class="forgot-password">Log in</a>
                <a onclick="getSummary('<?php echo site_url('guest/registrovanje')?>', 'Registracija')" class="forgot-password">Registruj se</a>
            </div>
        </div>
    </div>
</div>

<script >
    function povratak_sifre()
    {
        var username= document.getElementById("username").value;
        var email=document.getElementById("email").value;
        if(username=="" || email=="") {
            $('#greska_text').html("Nisu uneti svi podaci!");
            $('#Greska').modal('show');
            return;
        }
        var vr=$.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/guest/povratak_sifre_obradi',
            data:{username:username, email:email},
            success: function (returnData) {
              //  alert(returnData);
            }
        }).responseText;
        if(vr=='0') {
            $('#greska_text').html("Uneli ste pogresno korisnicko ime ili e-mail!");
            $('#Greska').modal('show');
            return;
        }
        $('#nesto').html(vr);
    }
</script>