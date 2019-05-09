<footer>

    <!-- ========== Call JQuery Library ========== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- ========== Call Materialize JS =========== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <!-- ========== Call navbar JS ========== -->
    <script src="assets/js/navbar.js"></script>

    <script src="assets/js/general.js"></script>
    
    <?php
        // Call page dedicated JS file
        if (file_exists("assets/js/".$page.".js")) {
            echo "<script src='assets/js/".$page.".js'></script>";
        }
    ?>
    
    <?php
        
        if(isset($_GET["p"]))
        {
            if($_GET["p"] == "rapportType" OR $_GET["p"] == "createCri")
            { ?>
                <script>
                    $(function () {
                        $(".rapportType").addClass("active");
                    });
                </script>
            <?php
                }
        
                if($_GET["p"] == "myrapports" OR $_GET["p"] == "editRapport")
                {
            ?>
                <script>
                    $(function () {
                        $(".myrapports").addClass("active");
                    });
                </script>
            <?php
                }
        
                if($_GET["p"] == "profil")
                {
            ?>
                <script>
                    $(function () {
                        $(".profil").addClass("active");
                    });
                </script>
            <?php
                }
        
                if($_GET["p"] == "admin" AND $session["lvl"] == 1)
                {
            ?>
                <script>
                    $(function () {
                        $(".admin").addClass("active");
                    });
                </script>
                <?php
            }
    
        }

    ?>

</footer>