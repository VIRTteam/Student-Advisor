<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Dodajte clana
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" placeholder="Ime" id="ime" name="ime" value="<?php echo $clan['ime'] ?>">
            <input class="form-control" type="text" placeholder="Prezime" id="prezime" value="<?php echo $clan['prezime'] ?>" >
            <input class="form-control" type="text" placeholder="E-Mail" id="email" value="<?php echo $clan['email'] ?>" >
            <input type="radio" name="pol"  value="Muski" id="m"       <?php if ($clan['pol']=='m') echo 'checked' ?>          > Muski<br/>
            <input type="radio" name="pol" value="Zenski" id="z"     <?php if ($clan['pol']=='z') echo 'checked' ?>       > Zenski<br/>
            <input class="form-control" type="text" placeholder="pol" id="pol" value="<?php echo $clan['pol'] ?>" >
            <input class="form-control" type="text" placeholder="Datum rodjenja" id="datumRodjenja" value="<?php echo $clan['datumRodjenja'] ?>" >
            <input class="form-control" type="text" placeholder="smer" id="smer" value="<?php echo $clan['smer'] ?>" >
            <input class="form-control" type="text" placeholder="godinaUpisa" id="godinaUpisa" value="<?php echo $clan['godinaUpisa'] ?>" >
            <input class="form-control" type="text" placeholder="sifra" id="sifra" value="<?php echo $clan['password'] ?>" >
            <textarea class="form-control share-text" placeholder="Opis" id="opis" value="<?php echo $clan['opis'] ?>" ><?php echo $clan['opis'] ?></textarea>

        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
            <a class="btn btn-white" onclick="sacuvaj_izmenu_clana();">Sacuvaj</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_izmenu_clana() {
        var ime = document.getElementById("ime").value;
        var prezime = document.getElementById("prezime").value;
        var email = document.getElementById("email").value;
        var pol;
        if(document.getElementById("m").checked){pol='m';} else
        if (document.getElementById("z").checked){
            pol='z';
        }
        var datumRodj = document.getElementById("datumRodjenja").value;
        var smer = document.getElementById("smer").value;
        var godUpis = document.getElementById("godinaUpisa").value;
        var sifra = document.getElementById("sifra").value;
        var opis = document.getElementById("opis").value;

        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/put_izmena_profila',
            data: {ime:ime, prezime:prezime, email:email, pol:pol, smer:smer, godUpis :godUpis, sifra:sifra, opis:opis, datumRodj:datumRodj},
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });
        $('#toggle_modal').modal('hide');
    }

</script>