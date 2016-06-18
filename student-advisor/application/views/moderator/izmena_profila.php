<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Izmena ličnih podataka
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" placeholder="Ime" id="ime" name="ime" value="<?php echo $clan['ime'] ?>">
            <input class="form-control" type="text" placeholder="Prezime" id="prezime" value="<?php echo $clan['prezime'] ?>" >
            <input class="form-control" type="text" placeholder="E-Mail" id="email" value="<?php echo $clan['email'] ?>" >
            <select class="form-control"   id="pol">
                <option value="z" <?php if ($clan['pol']=='z') echo 'selected' ?>> ženski</option>
                <option value="m"  <?php if ($clan['pol']=='m') echo 'selected' ?>>muški</option>
            </select>
            <div id="izmena_clana_greska_tekst1"></div>
            <input class="form-control" type="text" placeholder="Datum rodjenja" id="datumRodjenja" value="<?php   date_default_timezone_set("Europe/Belgrade");
            echo DateTime::createFromFormat('Y-m-d',date($clan['datumRodjenja']))->format('d.m.Y.');?>" >
            <input class="form-control" type="text" placeholder="smer" id="smer" value="<?php echo $clan['smer'] ?>" >
            <div id="izmena_clana_greska_tekst2"></div>
            <input class="form-control" type="text" placeholder="godinaUpisa" id="godinaUpisa" value="<?php echo $clan['godinaUpisa'] ?>" >
            <textarea class="form-control share-text" placeholder="Opis" id="opis" value="<?php echo $clan['opis']?> " style="height: 100px"><?php echo $clan['opis'] ?></textarea>
        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="sacuvaj_izmenu_clana();">Sacuvaj</a>
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
        </div>
    </div>
</div>

<script>
    function isDate(s)
    {
        // make sure it is in the expected format
        s = s.replace(" ", "");
        if (s.search(/^\d{1,2}\.\d{1,2}\.\d{4}\.?/g) != 0)
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
            alert("2");
        return arr[2]+'-'+arr[1]+'-'+arr[0]
    }
    function sacuvaj_izmenu_clana() {
        var ime = document.getElementById("ime").value;
        var prezime = document.getElementById("prezime").value;
        var email = document.getElementById("email").value;
        var pol = document.getElementById("pol").value;
        var datumRodj = document.getElementById("datumRodjenja").value;
        var smer = document.getElementById("smer").value;
        var godUpis = document.getElementById("godinaUpisa").value;
        var opis = document.getElementById("opis").value;
        var reg = new RegExp("^[1-2][0-9][0-9][0-9]$");
        if ((datumRodj=isDate(datumRodj))==false) {
            $('#izmena_clana_greska_tekst1').html("Neispravan datum rodjenja!");
            $('#izmena_clana_greska_tekst2').html("");
            return;
        }
        if(!reg.test(godUpis)) {
            $('#izmena_clana_greska_tekst2').html("Godina upisa mora biti broj!");
            $('#izmena_clana_greska_tekst1').html("");
            return;
        }
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/put_izmena_profila',
            data: {ime:ime, prezime:prezime, email:email, pol:pol, smer:smer, godUpis :godUpis, opis:opis, datumRodj:datumRodj},
            success: function (returnData) {
                $('#toggle_modal').modal('hide');
                $('#nesto').html(returnData);
            }
        });

    }

</script>