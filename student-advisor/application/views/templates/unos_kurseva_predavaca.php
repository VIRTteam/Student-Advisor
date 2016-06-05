<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Dodajte kurseve predavaca
            </h4>
        </div>
        <div class="modal-body">
            <select multiple="multiple" id="izabraniKursevi">
                <?php foreach ($kursevi as $kurs): ?>
                    <option value="<?php echo $kurs['idkurs'] ?>"><?php echo $kurs['ime']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
            <a class="btn btn-white" onclick="sacuvaj_predaje_na('<?php echo $idPred ?>') ">Sacuvaj</a>
        </div>
    </div>
</div>

<script>

    function sacuvaj_predaje_na(idPred)
    {
        var niz =$('#izabraniKursevi').val();
        for (var i=0, n=niz.length;i<n; i++)
        {
            sacuvaj_predaje_na_n(idPred,niz[i]);
        }
    }
    function sacuvaj_predaje_na_n(idPre, kursev) {

        var ur='<?php echo site_url()?>/moderator/put_predaje_na/'+kursev+"/"+idPre;
        $.ajax({
            type: 'GET',
            async: false,
            url: ur,
            success: function (returnData) {

            }
        });
        $('#toggle_modal').modal('hide');
    }

</script>