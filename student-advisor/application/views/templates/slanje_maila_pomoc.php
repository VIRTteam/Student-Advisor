<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Poruka koju saljete ce se automatski proslediti servisu za pomoc</h4>
        </div>
        <div class="modal-body" id="proba">
            <p>Unesite vasu poruku</p>
            <textarea class="form-control share-text" name="message" id="message" placeholder="Poruka. . ." style="height: 200px;"></textarea>
        </div>
        <div class="modal-footer">
            <a  class="btn btn-white" onclick="posalji_mail_pomoc()">Posalji</a>
            <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
        </div>
    </div>
</div>

<script>
    function posalji_mail_pomoc()
    {
        var message=document.getElementById("message").value;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user_toggle/posalji_mail_pomoc',
            data: {message:message},
            success: function(returnData ) {
                alert(returnData);
               // $('#proba').html(returnData);
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>