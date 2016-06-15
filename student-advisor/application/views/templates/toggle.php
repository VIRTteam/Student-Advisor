<!-- slika i edit-->


<script>
function setLike(id,myID)
{
    var tip='p';
    if(document.getElementById('podrzavanje' + id).className=="fa fa-plus active") {
        document.getElementById('podrzavanje' + id).className = "fa fa-plus unactive";
        tip = 'u';

    }else if(document.getElementById('nepodrzavanje' + id).className=="fa fa-minus active") {
        document.getElementById('podrzavanje' + id).className = "fa fa-plus active";
        document.getElementById('nepodrzavanje' + id).className = "fa fa-minus unactive";

    }
    else
        document.getElementById('podrzavanje' + id).className = "fa fa-plus active";


    var rez=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obradi_podrzavanje',
        data: {idKom: id, tip:tip},
        success: function (returnData) {
        }
    }).responseText;
    var arr= rez.split(" ");
    $('#podrzavanje'+ id).html(" "+arr[0]);
    $('#nepodrzavanje'+ id).html(" "+arr[1]);

}

function setUnlike(id,myID)
{
    var tip='n';
    if(document.getElementById('nepodrzavanje' + id).className=="fa fa-minus active") {
        document.getElementById('nepodrzavanje' + id).className = "fa fa-minus unactive";
        tip = 'u';
    }else if(document.getElementById('podrzavanje' + id).className=="fa fa-plus active") {
        document.getElementById('nepodrzavanje' + id).className = "fa fa-minus active";
        document.getElementById('podrzavanje' + id).className = "fa fa-plus unactive";

    }
    else
        document.getElementById('nepodrzavanje' + id).className = "fa fa-minus active";


    var rez=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obradi_podrzavanje',
        data: {idKom: id, tip:tip},
        success: function (returnData) {
        }
    }).responseText;
    var arr= rez.split(" ");
    $('#podrzavanje'+ id).html(" "+arr[0]);
    $('#nepodrzavanje'+ id).html(" "+arr[1]);

}

 function brisanje_podkomentara(idPodKom, idKom)
 {

     $('#podkomentar'+ idPodKom).remove();
     $.ajax({
         type: 'POST',
         async: false,
         url: '<?php echo site_url()?>/user_toggle/obrisi_podkomentar',
         data: {idPodKom: idPodKom, idKom:idKom},
         success: function (returnData) {
         }
     });
 }
function brisanje_komentara(idKom)
{

    $('#komentar'+ idKom).remove();
    $.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obrisi_komentar',
        data: {idKom: idKom},
        success: function (returnData) {
        }
    });
}


function brisanje_polozenog_ispita(idKom, idClan)
{
    $('#predmet'+ idKom +'-'+idClan).remove();
    var la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obrisi_polozeni_ispit',
        data: {idKurs: idKom, idClan:idClan},
        success: function (returnData) {
        }
    }).responseText;
}
function brisanje_predaje(idKurs, idPred)
{
    $('#predaje'+ idKurs+'-'+idPred).remove();
    var la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obrisi_predaje',
        data: {idKurs: idKurs, idPred:idPred},
        success: function (returnData) {
        }
    }).responseText;
}
function brisanje_Kurs(idKurs)
{
    $('#pretraga'+ idKurs).remove();
    $la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obrisi_kurs',
        data: {idKurs: idKurs},
        success: function (returnData) {
        }
    }).responseText;
}
function brisanje_Predavac(idPred)
{
    $('#pretraga'+ idPred).remove();
    $la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/obrisi_predavac',
        data: {idPred:idPred},
        success: function (returnData) {
        }
    }).responseText;
}

</script>

<script>

    function loadNewMessages(id)
    {
        var tekst=document.getElementById("tekst").value;

        $.ajax({
            type: 'POST',
            url: id,
            async: false,
            data: {
                tekst :tekst
            },
            success: function (returnData) {
                $('#nesto').html(returnData);
            }
        });

    }


    function search_cours(){
    $.ajax({
        type: 'GET',
        url: '<?php echo site_url('user/get_pretraga_kurs')?>/',
        success: function (returnData) {
            $('#nesto').html(returnData);
        }
    });
    }

</script>







<div class="modal fade" id="toggle_modal" role="dialog">
</div>

<script>
function izmeni_komentar(idKom)
{
    $.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/dohvati_komentar',
        data: {idKom: idKom },
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    });
    
    $('#toggle_modal').modal('show');

}

function unapredi(idClan)
{
    $.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/dohvati_unapredjivanje',
        data: {idClan: idClan },
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    });
    $('#toggle_modal').modal('show');

}

function derangiraj(idClan)
{
    $.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/dohvati_derangiranje',
        data: {idClan: idClan },
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    });
    $('#toggle_modal').modal('show');

}

function banuj(idClan)
{
    $.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/dohvati_banovanje',
        data: {idClan: idClan },
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    });
    $('#toggle_modal').modal('show');

}

function slanje_maila(idPred)
{
    $la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/slanje_maila',
        data: {idPred:idPred},
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    }).responseText;
    $('#toggle_modal').modal('show');
}

function slanje_maila_pomoc()
{
    $la=$.ajax({
        type: 'POST',
        async: false,
        url: '<?php echo site_url()?>/user_toggle/slanje_maila_pomoc',
        success: function (returnData) {
            $('#toggle_modal').html(returnData);
        }
    }).responseText;
    $('#toggle_modal').modal('show');
}
</script>