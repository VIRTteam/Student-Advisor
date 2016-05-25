</div>

<script>

    function getSummary(id)
    {
        $.ajax({
            type: 'GET',
            url: id,
            success: function(returnData ) {
                $('#nesto').html( returnData );
            }
        });

    }
</script>

<footer class="footer">
    <img src="<?php echo base_url(); ?>/img/logo.jpg" height="25px"></img>  v1.0.0 © Copyright 2016
</footer>
<!-- // Footer -->

</div>
<!-- /st-container -->



</body>
</html>