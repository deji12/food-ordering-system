<?php

if (isset($_GET["reset_from_profile"])) {

    header("location: ../controllers/logout_controller.php?reset_from_profile=1");
    die();  

} else {
    header("location: ../controllers/logout_controller.php");
    die();
}

