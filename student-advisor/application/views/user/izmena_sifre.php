<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">Promena šifre
            </h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="password" placeholder="Stara šifra" id="old_password">
            <input class="form-control" type="password" placeholder="Nova šifra" id="password">
            <input class="form-control" type="password" placeholder="Ponovljena nova šifru" id="password_again">
            <div id="izmena_sifre_greska_tekst"></div>
        <div class="modal-footer">
            <a class="btn btn-white" onclick="sacuvaj_izmenu_sifre();">Sacuvaj</a>
            <a class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>
        </div>
    </div>
</div>

<script>
    function sacuvaj_izmenu_sifre() {
        var old_pass = document.getElementById("old_password").value;
        var new_pass = document.getElementById("password").value;
        var new_pass2 = document.getElementById("password_again").value;
        if(new_pass!=new_pass2){
            $('#izmena_sifre_greska_tekst').html("Sifra i ponovljena sifra nisu iste!");
            return;
        }

        var vr=$.ajax({
            type: 'POST',
            async:false,
            url: '<?php echo site_url()?>/user/provera_old_password',
            data:{old_pass:old_pass},
            success: function (returnData) {
            }
        }).responseText;
        if(vr=='ne') {
            $('#izmena_sifre_greska_tekst').html("Neispravna stara sifra!");
            return;
        }
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user/put_izmena_sifre',
            data: {new_pass:new_pass},
            success: function (returnData) {
                $('#toggle_modal').modal('hide');
            }
        });

    }

</script>