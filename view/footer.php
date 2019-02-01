<footer>

    <!-- ========== Appel du JS Bootstrap =========== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>

    <!-- ========== Appel du Framework JQuery ========== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- Chosen plugin JS -->
    <script src="assets/js/chosen.jquery.js"></script>

    <!-- iCheck plugin JS -->
    <script src="assets/icheck/icheck.js"></script>
    
    <!-- Validate plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <?php
        //Appel du fichier JS propre à la page
        if (isset($page)) {
            echo "<script src='assets/js/".$page.".js'></script>";
        }
    ?>

</footer>