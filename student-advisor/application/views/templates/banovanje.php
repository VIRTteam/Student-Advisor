
<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Banovanje člana:
                <span style="color: black; "><?php echo $banovanje['ime']?> <?php echo $banovanje['prezime']?></span>
            </h4>
        </div>
        <?php if($banovanje['tip']=='a'): ?>
            <div class="modal-body"><h5 >Član ne može da se banuje.</h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Uredu</a>
            </div>
        <?php elseif (!$banovanje['datumBanovanja']): ?>
            <div class="modal-body">
                <textarea class="form-control share-text" id="tekstIzmene" placeholder="Napisite razlog banovanja..."></textarea>
                <div id="greska_banovanje"></div>
            </div>
            <div class="modal-footer" style="border: 0px">
                <a class="btn btn-white" onclick="sacuvaj_banovanje('<?php echo $banovanje['idClan']?>')">
                    Banuj
                </a>
                <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">
                    Odustani
                </a>

            </div>
        <?php else: ?>
            <div class="modal-body"><h5 >Član je već banovan.</h5></div>
            <div class="modal-footer">
                <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Uredu</a>
            </div>

        <?php endif ?>
    </div>

</div>

<script>
    function sacuvaj_banovanje(idClan)
    {
        var tekst =$('#tekstIzmene').val();
        if (tekst=="") {
            $('#greska_banovanje').html("Morate uneti razlog banovanja!!!");
            return;
        }
        
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/izmeni_banovanje',
            data: {idClan: idClan, tekst:tekst},
            success: function(returnData ) {
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>