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
            <a class="btn btn-white" onclick="sacuvaj_predaje_na(<?php echo $idPred ?>); ">Sacuvaj</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_predaje_na(idPred) {
        var idPred=idPred;
        var kursevi = document.getElementById("izabraniKursevi");
        kursevi=textArrayOfSltns(kursevi);
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/moderator/put_novi_predavac',
            data: {
                kursevi: kursevi,
                idPred:idPred
            },
            success: function (returnData) {

            }
        });
        $('#toggle_modal').modal('hide');
    }


    function textArrayOfSltns(selectElmnt){
        var textSelected = new Array() ;
        for (var i = 0 ; i < selectElmnt.length ; i++){
            if (selectElmnt.options[i].selected){
                textSelected[textSelected.length]  =  selectElmnt.options[i].value ;
            }
        }
        return textSelected ;
    }
</script>