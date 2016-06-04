
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Dodajte predmet
                    <span style="color: black; "><?php echo $predmet['ime']?> </span>
                </h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td> <h5>Unesite svoju ocenu:   </h5></td>
                        <td>
                            <select class="form-control" style="margin-left: 8px" id="ocena">
                                <option selected>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>

                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a  class="btn btn-white" onclick="sacuvaj_ocenu(<?php echo $predmet['idkurs'] ?>)">Sacuvaj</a>
                <a  class="btn btn-white" onclick="$('#toggle_modal').modal('hide');">Odustani</a>

            </div>
            
        </div>

    </div>

<script>
    function sacuvaj_ocenu(idkurs)
    {
        var e = document.getElementById("ocena");
        var ocena = e.options[e.selectedIndex].text;
        var idKurs=idkurs;
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url()?>/user/put_kurs_polozen',
            data: {ocena: ocena, idKurs: idKurs},
            success: function(returnData ) {
            }
        });
        $('#toggle_modal').modal('hide');
    }
</script>