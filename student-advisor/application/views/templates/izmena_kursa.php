<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Izmeni kurs
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" id="ime" name="ime" value="<?php echo $kurs['ime'] ?>">
            <textarea class="form-control share-text" id="opis" value="<?php echo $kurs['opis'] ?>" style="height: 200px"><?php echo $kurs['opis'] ?></textarea>

        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="sacuvaj_izmenu_kursa(<?php echo $kurs['idKurs'] ?>,<?php echo $tip?>)">Sacuvaj</a>
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_izmenu_kursa(idKurs,tip) {
        var ime = document.getElementById("ime").value;
        var opis = document.getElementById("opis").value;
        var idKurs = idKurs;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/edit_kurs',
            data: {ime: ime, opis: opis, idKurs: idKurs },
            success: function (returnData) {
                if(tip==1)
                    $('#nesto').html(returnData);
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>