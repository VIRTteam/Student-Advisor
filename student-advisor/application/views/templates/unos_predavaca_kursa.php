<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Dodajte predavace na kursu
            </h4>
        </div>
        <div class="modal-body">
            <select multiple="multiple" id="izabraniKursevi">
                <?php foreach ($idPred as $pred): ?>
                    <option value="<?php echo $pred['idPred'] ?>"><?php echo $pred['ime']?> <?php echo $pred['prezime']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="sacuvaj_predaje_na('<?php echo $kursevi ?>') ">Sacuvaj</a>
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
        </div>
    </div>
</div>

<script>

    function sacuvaj_predaje_na(kursevi)
    {
        var niz =$('#izabraniKursevi').val();
        for (var i=0, n=niz.length;i<n; i++)
        {
            sacuvaj_predaje_na_n(niz[i],kursevi);
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