
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Izmena komentara predmeta
                <span style="color: black; "><?php echo $komentarIzmena['ime']?></span>
            </h4>
        </div>
        <div class="modal-body">
            <textarea class="form-control share-text" id="tekstIzmene" placeholder="Izmeni komentar"><?php echo $komentarIzmena['tekst']?></textarea>
        </div>
        <div class="modal-footer" style="border: 0px">
            <a class="btn btn-white" onclick="sacuvaj_izmenu_komentara(<?php echo $komentarIzmena['idKom']?>)">
                Sačuvaj
            </a>
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">
                 Odustani
            </a>

        </div>
    </div>

</div>



<script>
    function sacuvaj_izmenu_komentara(idKom)
    {

        var tekst = $('#tekstIzmene').val();

        $('#tekstkomentara'+idKom).html(tekst);
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url()?>/user_toggle/izmeni_komentar',
            data: {idKom: idKom, tekst:tekst},
            success: function(returnData ) {
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>
