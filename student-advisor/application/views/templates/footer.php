</div>
<div class="modal fade" id="podkomentari" role="dialog">

</div>



<script>

    function getSummary(id, naslov)
    {
        document['title']=naslov;
       
        $.ajax({
            type: 'GET',
            url: id,
            success: function(returnData ) {
                $('#nesto').html( returnData );
            }
        });
    }
</script>

<script >
    function getPodkomentari(id)
    {
        $.ajax({
            type: 'GET',
            url: id,
            success: function(returnData ) {
                $('#podkomentari').html( returnData );
            }
        });

    }
</script>

<footer class="footer">
    <img src="<?php echo base_url(); ?>/img/logo.jpg" height="25px"/>  v1.0.0 © Copyright 2016
</footer>
<!-- // Footer -->

</div>
<!-- /st-container -->



<!-- jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.12.4.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>