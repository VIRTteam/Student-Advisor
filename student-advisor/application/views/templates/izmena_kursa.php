<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Dodajte kurs
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" id="ime" name="ime" value="<?php echo $kurs['ime'] ?>">
            <input class="form-control" type="text" id="slika" value="<?php echo $kurs['slika'] ?>">
            <textarea class="form-control share-text" id="opis" value="<?php echo $kurs['opis'] ?>"></textarea>

        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
            <a class="btn btn-white" onclick="sacuvaj_izmenu_kursa(<?php echo $kurs['idkurs'] ?>)">Sacuvaj</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_izmenu_kursa(idKurs) {
        var ime = document.getElementById("ime").value;
        var slika = document.getElementById("slika").value;
        var opis = document.getElementById("opis").value;
        var idKurs = idKurs;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/edit_kurs',
            data: {ime: ime, opis: opis, slika: slika, idKurs: idKurs },
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>