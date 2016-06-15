<div class="st-content-inner" style="height: 800px">
    <div class="lock-container" style="height: 740px">
        <h1>Registruj Se</h1>
        <div class="panel panel-default text-center">
            <img src="<?php echo base_url()?>/img/clan_default.png" class="img-circle">
            <form method="post" class="panel-body">
                <input class="form-control" type="text" placeholder="Ime" id="ime" name="ime">
                <input class="form-control" type="text" placeholder="Prezime" id="prezime">
                <input class="form-control" type="text" placeholder="E-Mail" id="email">
                <input class="form-control" type="text" placeholder="Korisničko Ime" id="username">
                <input class="form-control" type="password" placeholder="Šifra" id="password">
                <input class="form-control" type="password" placeholder="Ponovite Šifru" id="password_again">
                <input class="form-control" type="text" placeholder="Datum Rođenja" id="datum_rodjenja">
                <input class="form-control" type="text" placeholder="Smer" id="smer">
                <input class="form-control" type="text" placeholder="Godina Upisa" id="godina_upisa">
                <select class="form-control"   id="pol">
                    <option value="zenski" selected> ženski</option>
                    <option value="muski">muški</option>
                </select>
                <a  class="btn btn-white"  onclick="registracija()">Registruj se <i class="fa fa-fw fa-sign-in"></i></a>
            </form>
        </div>
    </div>
</div>



<script >
    function isDate(s)
    {
        // make sure it is in the expected format
        if (s.search(/^\d{1,2}[\/|\-|\.|_]\d{1,2}[\/|\-|\.|_]\d{4}\.?/g) != 0)
            return false;

        // remove other separators that are not valid with the Date class
        s = s.replace(/[\-|\.|_]/g, "/");
        var arr= s.split("/");
        s=arr[1]+'/'+arr[0]+'/'+arr[2];
        // convert it into a date instance
        var dt = new Date(Date.parse(s));
        // check the components of the date
        // since Date instance automatically rolls over each component
        if(!dt.getMonth() == arr[1]-1 || !dt.getDate() == arr[0] || !dt.getFullYear() == arr[2])
            return false;
        return arr[2]+'-'+arr[1]+'-'+arr[0]
    }
    function registracija()
    {
        var ime = document.getElementById("ime").value;
        var prezime = document.getElementById("prezime").value;
        var username= document.getElementById("username").value;
        var password=document.getElementById("password").value;
        var password_again=document.getElementById("password_again").value;
        var email = document.getElementById("email").value;
        var datum_rodjenja = document.getElementById("datum_rodjenja").value;
        var godina_upisa = document.getElementById("godina_upisa").value;
        var smer = document.getElementById("smer").value;
        var pol = document.getElementById("pol").value;
        if(ime=="" || prezime=="" || username=="" || password=="" || password_again=="" || email=="" || datum_rodjenja==""
        ||smer=="" ||godina_upisa=="") {
            $('#greska_text').html("Nisu uneti svi podaci!");
            $('#Greska').modal('show');
            return;
        }
        if(password!=password_again){
            $('#greska_text').html("Sifra i ponovljena sifra nisu iste!");
            $('#Greska').modal('show');
            return;
        }
        var reg = new RegExp("^[1-2][0-9][0-9][0-9]$");
        if(!reg.test(godina_upisa)) {
            $('#greska_text').html("Godina upisa mora biti broj!");
            $('#Greska').modal('show');
            return;
        }
        if ((datum_rodjenja=isDate(datum_rodjenja))==false) {
            $('#greska_text').html("Neispravan datum rodjenja!");
            $('#Greska').modal('show');
            return;
        }
        var vr=$.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/guest/provera_username',
            data:{username:username},
            success: function (returnData) {
            }
        }).responseText;
        if(vr=='postoji') {
            $('#greska_text').html("greska_text=Korisnik sa datim korisnickim imenom vec postoji, unesite nesto drugo!");
            $('#Greska').modal('show');
            return;
        }
        $.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/guest/registracija_obrada',
            data:{username:username, password:password, email:email, ime:ime,prezime:prezime,
            smer:smer,godina_upisa:godina_upisa,datum_rodjenja:datum_rodjenja,pol:pol},
            success: function (returnData) {
                document.open();
                document.write( returnData);
                document.close();
            }
        });
        
    }
</script>