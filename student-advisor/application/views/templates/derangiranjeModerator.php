
<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Derangiranje člana:
                <span style="color: black; "><?php echo $derangiranje['ime']?> <?php echo $derangiranje['prezime']?></span>
            </h4>
        </div>
        <?php if($derangiranje['tip']=='c'): ?>
            <div class="modal-body"><h5 >Član ne može da se derangira.</h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Uredu</a>
            </div>
        <?php elseif (!$derangiranje['tipUD']): ?>
            <div class="modal-body">

                <textarea class="form-control share-text" id="tekstIzmene" placeholder="Napisite razlog unapredjivanja..."></textarea>
                <div id="greska_derangiranje"></div>
            </div>
            <div class="modal-footer" style="border: 0px">
                <a class="btn btn-white" onclick="sacuvaj_derangiranje('<?php echo $derangiranje['idClan']?>')">
                    <i class="fa fa-save"></i> Sačuvaj
                </a>
                <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">
                    <i class="fa fa-ban"></i> Odustani
                </a>

            </div>
        <?php else: ?>
            <div class="modal-body"><h5 >Zahtev je već poslat.</h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Uredu</a>
            </div>

        <?php endif ?>
    </div>

</div>

<script>
    function sacuvaj_derangiranje(idClan)
    {
        var tekst =$('#tekstIzmene').val();
        if (tekst=="") {
            $('#greska_derangiranje').html("Morate uneti razlog banovanja!!!");
            return;
        }
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/izmeni_derangiranje',
            data: {idClan: idClan, tekst:tekst},
            success: function(returnData ) {
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>