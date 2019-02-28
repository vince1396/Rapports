<footer>

    <!-- ========== Call JQuery Library ========== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- ========== Call Materialize JS =========== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <!-- ========== Call navbar JS ========== -->
    <script src="assets/js/navbar.js"></script>
    
    <?php
        // Call page dedicated JS file
        if (isset($page)) {
            echo "<script src='assets/js/".$page.".js'></script>";
        }
    ?>

</footer>