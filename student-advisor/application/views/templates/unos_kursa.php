<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Dodajte kurs
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" placeholder="Ime" id="ime" name="ime">
            <input class="form-control" type="text" placeholder="Slika" id="slika">
            <textarea class="form-control share-text" placeholder="Opis" id="opis"></textarea>

        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
            <a class="btn btn-white" onclick="sacuvaj_kurs()">Sacuvaj</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_kurs() {
        var ime = document.getElementById("ime").value;
        var slika = document.getElementById("slika").value;
        var opis = document.getElementById("opis").value;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/put_novi_kurs',
            data: {ime:ime, slika:slika, opis:opis},
            success: function (returnData) {
                $('#toggle_modal').html(returnData);
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>